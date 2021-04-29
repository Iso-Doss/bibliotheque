<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Cette fonction permet de rediriget l'utilisateur vers le bon fichier en fonction du parametre page.
 */
function get_page() {
    if (isset($_REQUEST["page"]) && !empty($_REQUEST["page"])) {
        //echo $_REQUEST["page"];
        switch ($_REQUEST["page"]) {
            case "connexion":
                include_once './app/user/connexion.php';
                break;
            case "connexion-traitement":
                include_once './app/user/connexion_traitement.php';
                break;
            default :
                include_once './app/user/connexion.php';
        }
    } else {
        include_once './app/user/connexion.php';
    }
}

/**
 * Cette fonction permet de me connecter la base de donnée.
 * 
 * @return type $bdd Une instance PDO de ma base de donnée ou un message d'erreur.
 */
function connect_db() {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=bibliotheque;charset=utf8', 'root', '');
    } catch (Exception $e) {
        $bdd = $e->getMessage();
    }
    return $bdd;
}
