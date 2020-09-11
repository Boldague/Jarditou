<?php
    function connexionBase()
    {
        // Paramètre de connexion serveur
        echo "DOCUMENT_ROOT = ".$_SERVER["DOCUMENT_ROOT"]."<br>";
        echo "SERVER_NAME = ".$_SERVER["SERVER_NAME"]."<br>";
        if($_SERVER["SERVER_NAME"] == "dev.amorce.org")
        {
            $host = "localhost";
            $login= "gottist";  // Votre loggin d'accès au serveur de BDD 
            $password="tg20103";    // Le Password pour vous identifier auprès du serveur
            $base = "gottist";  // La bdd avec laquelle vous voulez travailler 
        }
        else
        {
            $host = "localhost";
            $login= "root";  // Votre loggin d'accès au serveur de BDD 
            $password="";    // Le Password pour vous identifier auprès du serveur
            $base = "jarditou";  // La bdd avec laquelle vous voulez travailler 
        }

        try 
        {
            $db = new PDO('mysql:host=' .$host. ';charset=utf8;dbname=' .$base, $login, $password);
            return $db;
        } 
        catch (Exception $e) 
        {
            echo 'Erreur : ' . $e->getMessage() . '<br>';
            echo 'N° : ' . $e->getCode() . '<br>';
            die('Connexion au serveur impossible.');
        } 
    }
?>