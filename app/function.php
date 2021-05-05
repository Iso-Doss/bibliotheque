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
            case "dashboard":
                    include_once './app/dashboard/index.php';
                    break;
            case "liste_auteur":
                        include_once './app/dashboard/auteur/liste_auteur.php';
                        break;
                        case "mdp":
                            include_once './app/user/mdp.php';
                            break;
            
            default :
                include_once './app/user/connexion.php';
        }
    } else {
        include_once './app/user/connexion.php';
    }
}

function get_dashbord_page(){
    if (isset($_REQUEST["page"]) && !empty($_REQUEST["page"] && "dashboard" === $_REQUEST["page"] )) {
        if (isset($_REQUEST["section"]) && !empty($_REQUEST["section"] )) {
            switch ($_REQUEST["section"]) {
                case "auteur":
                    include_once './app/dashboard/auteur/liste_auteur.php';
                    break; 
                case "ajout_auteur":
                        include_once './app/dashboard/auteur/ajout_auteur.php';
                        break;
                 case "ajout_auteur_traitement":
                        include_once './app/dashboard/auteur/ajout_auteur_traitement.php';
                        break;
                case "modifier_auteur":
                         include_once './app/dashboard/auteur/modifier_auteur.php';
                         break; 
                case "ouvrage":
                        include_once './app/dashboard/ouvrage/liste_ouvrage.php';
                        break; 
                
                 case "ajouter_ouvrage":
                            include_once './app/dashboard/ouvrage/ajout_auteur.php';
                            break;
                case "ajouter_ouvrage_traitement":
                            include_once './app/dashboard/ouvrage/ajout_auteur_traitement.php';
                            break;    
                
                default :
                    include_once './app/dashboard/auteur/liste_auteur.php';
            }
        }else{
            include_once './app/dashboard/auteur/liste_auteur.php';
        }
    }else{
        include_once './app/dashboard/auteur/liste_auteur.php';
    }
}
/**
 * Cette fonction permet de me connecter la base de donnée.
 * 
 * @return type $bdd Une instance PDO de ma base de donnée ou un message d'erreur.
 */
function connect_db() {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=biblio;port=3308;charset=utf8', 'root', '');
    } catch (Exception $e) {
        $bdd = $e->getMessage();
    }
    return $bdd;
}

function liste_auteurs(){
    $bdd = connect_db();
    $reponse = $bdd->query('SELECT * FROM auteur');
    $auteurs=$reponse->fetchAll(PDO::FETCH_CLASS); 
    return $auteurs;
}
function ajout_auteur()
{
    $bdd = connect_db();
        $req = $bdd->prepare("INSERT INTO auteur (nomAut,prenomAut)  VALUES(:nomAut, :prenomAut)");
            $req->execute(
                array(
                    'nomAut'=>$_POST['nomAut'],
                    'prenomAut'=>$_POST['prenomAut']
                )
            );
            $ajout_auteurs=$req;
            return $ajout_auteurs;
}

function liste_ouvrages()
{
            $bdd = connect_db();
            $reponse = $bdd->query('SELECT * FROM ouvrage');
            $ouvrages=$reponse->fetchAll(PDO::FETCH_CLASS); 
            return $ouvrages;
}