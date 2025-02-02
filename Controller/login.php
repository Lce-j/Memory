<?php
/**
 * @var PDO $pdo
 */
require 'Model/login.php';

if(!empty ($_SERVER['CONTENT_TYPE'])){
    $errors =[];
    $username = $_POST['username'] ?? null;
    $pass = $_POST['password'] ?? null;

    if(null === $username || null === $pass){
        $errors[] = "identifiant ou mot de passe vide";
    } else {
        $connexion = connect($pdo, $username, $pass);

        if(empty($connxion) || !password_verify($pass, $connexion['password'])){
            $errors[] = "Erreur d'identification, veuillez essayer à nouveau";
        } elseif(0 === $connexion['enabled']){
            $errors[] = "Ce compte est désactivé";
        } else {
            $_SESSION['auth'] = true;
            $_SESSION['username'] = $connexion['username'];
        }
    }

    if(!empty($errors)) {
        
    }
}

require 'View/login.php';