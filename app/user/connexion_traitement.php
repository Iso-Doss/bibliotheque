<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$email = $_POST["email"];
$mot_de_passe = $_POST["mot-de-passe"];

$erreurs = array();

$success = "";

if (!isset($email) || empty($email)) {
    $erreurs[] = "Le champ email est vide. Veuillez le remplir!";
}

if (!isset($mot_de_passe) || empty($mot_de_passe)) {
    $erreurs[] = "Le champ mot de passe est vide. Veuillez le remplir!";
}

if (empty($erreurs)) {
    $bdd = connect_db();
    if (is_object($bdd)) {
        $req = $bdd->prepare('SELECT * FROM user WHERE email = :email AND mdp=:mdp');
        $resultat = $req->execute(
                array(
                    'email' => $email,
                    'mdp' => sha1($mot_de_passe)
                )
        );

        if ($resultat) {
            $user = $req->fetchAll(PDO::FETCH_CLASS);
            if (isset($user) && !empty($user)) {
                $success = "Braco!!! Vous etes connecté!";
            } else {
                $erreurs [] = "Identifiants incorrect.  Veuillez réesayer.";
            }
        } else {
            $erreurs[] = "Un probleme est survenue lors de la requete. Veuillez réesayer.";
        }
    } else {
        $erreurs [] = $bdd;
    }
}

header("location: index.php?page=connexion&erreurs=" . json_encode($erreurs) . "&success=" . $success);
