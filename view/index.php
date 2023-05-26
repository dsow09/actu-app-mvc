<?php
    require_once('../controller/ArticleController.php');
    require_once('../controller/CategorieController.php');

    $categories = getCategories();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site d'actualité</title>
    <link rel="stylesheet" href="./styles/style.css" />
</head>
<body>
    <div class="wrapper">
        <div class="content">
            <h1 class="header">ACTUALITÉS POLYTECHNICIENNES</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <?php 
                        foreach($categories as $categorie){?>
                            <li>
                                <a href="index.php?categorie=<?php echo $categorie->id; ?>"><?php echo $categorie->libelle ?></a>
                                </li>
                    <?php } ?>
                </ul>
            </nav>
            <h2 class="header">Les dernières actualités</h2>
            <?php 
                if(isset($_GET['categorie']))
                {
                    $categorie = $_GET['categorie'];
                    $categorie = filter_input(INPUT_GET, 'categorie', FILTER_VALIDATE_INT );
                    $libelleCategorie = getLibelleCategorieById($categorie);

                    $articles = getArticlesByCategorie($categorie);
                    $message = "Liste des articles de la catégorie ".$libelleCategorie->libelle;
                }
                else 
                {
                    $articles = getArticles();
                    $message = "Liste des articles";
                }

                if(!empty($articles) && is_array($articles))
                {?>
                    <h3 class="header"><?php echo $message ?></h1><?php
                    foreach($articles as $article)
                    {?>
                        <div class="card">
                            <h3 class="card-title"><?php echo $article->titre ?></h3>
                            <p class="card-description"><?php echo $article->contenu ?></p>
                        </div><?php 
                    }
                }
                else 
                {?>
                    <div class="card">
                        <h3 class="header">Pas d'articles trouvés !</h3>
                    </div><?php
                }?> 
        </div>

        <footer>
            <h3>Copyright @ DGI 2023</h3>
        </footer>
    </div>

</body>
</html>