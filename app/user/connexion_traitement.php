<?php
session_start();
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
    if (is_object($bdd)) //Pour vérifier si la connexion a la base de donné s'est bien passé la base de donné doit nous retourner une instance de type objet donc la connexion est bien faite et si elle nous envoie un string ca prouve que la connexion n'a pas reussi
    {
        $req = $bdd->prepare('SELECT * FROM user WHERE email = :email AND mdp=:mdp');
        $resultat = $req->execute(
                array(
                    'email' => $email,
                    'mdp' => sha1($mot_de_passe)
                )
        );

        if ($resultat) //resultat contient un booléen vrai ou faux pour dire si la requete a été bien effectuer ou pas
         {
            $user = $req->fetchAll(PDO::FETCH_CLASS);// pour affiché dans un tableau associatif ou il y a l'enregistrement concernant l'utilisateur qui s'est connecter elle peut etre un tableau vide ou un tableau contenant les infos de l'utilisateur connecter
            if (isset($user) && !empty($user)) {
                $success = "Braco!!! Vous etes connecté!";
                $_SESSION['dernier_signe_de_vie'];
                $_SESSION["autoriser"]="oui";
                header("location: index.php?page=index");
        
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

header("location: index.php?page=connexion&erreurs=" . json_encode($erreurs) . "&success=" . $success);//ca nous redirige sur la page connexion en la passant en parzmetre suivie du tableau $erreurs crypté et de la variable string $success
