<?php
    require_once('../model/Categorie.php');
    require_once('../config/Connexion.php');

    function getCategories(){
        try 
        {
            global $conn;
            $sqlQueryCategories = 'SELECT * FROM Categorie';
            $categorieStatement = $conn->prepare($sqlQueryCategories);
            $categorieStatement->execute();

            return $categorieStatement->fetchAll(PDO::FETCH_OBJ);
            
        } 
        catch (Exception $e) 
        {
            die("Erreur ".$e->getMessage());
        }
    }

    function getLibelleCategorieById($id)
    {
        try 
        {
            global $conn;
            $sqlQueryCategories = 'SELECT * FROM Categorie where id = :id';
            $categorieStatement = $conn->prepare($sqlQueryCategories);
            $categorieStatement->bindParam(':id', $id);
            $categorieStatement->execute();

            return $categorieStatement->fetch(PDO::FETCH_OBJ);
            
        } 
        catch (Exception $e) 
        {
            die("Erreur ".$e->getMessage());
        }
    }
?>