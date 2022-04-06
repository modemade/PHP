<?php
    //a modifier avec vos paramètres perso (base, login et mdp BDD)
    $bdd = new PDO('mysql:host=localhost;dbname=utilisateurs', 'root','', 
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>
