<?php
    try
    {
        $conn = new PDO("mysql:host=localhost;dbname=mglsi_news", 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }  
    catch(PDOException $e)
    {
        die("Erreur : " . $e->getMessage());
    }
?>