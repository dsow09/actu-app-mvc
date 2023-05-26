<?php

require_once('../model/Article.php');
require_once('../config/Connexion.php');

function getArticles()
{
  try 
  {
    global $conn;
    $sqlQueryArticles = "SELECT * FROM Article ";
    $articlestatement = $conn->prepare($sqlQueryArticles);
    $articlestatement->execute();

    return $articlestatement->fetchAll(PDO::FETCH_OBJ);
  } 
  catch (Exception $e) 
  {
    die('Erreur '.$e->getMessage());
  }
}


function getArticlesByCategorie($categorie)
{
    try 
    {
      $categorie = htmlspecialchars($categorie);
      global $conn;
      $sqlQueryArticles = "SELECT * FROM Article WHERE categorie = :categorie";
      $articlestatement = $conn->prepare($sqlQueryArticles);
      $articlestatement->bindParam(':categorie', $categorie);
      $articlestatement->execute();
  
      return $articlestatement->fetchAll(PDO::FETCH_OBJ);
    } 
    catch (Exception $e) 
    {
      die('Erreur '.$e->getMessage());
    }
}

?>