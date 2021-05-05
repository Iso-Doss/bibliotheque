<?php
$mdp;
$mdp=sha1(bibliotheque0123);
echo $mdp;

$bdd = connect_db();
$nom="Azerta";
$prenom="Alice";
$req = $bdd->prepare("INSERT INTO auteur (nomAut,prenomAut)  VALUES(:nom,:prenom)");
    $req->execute(
        array(
            'nom'=>$_POST['nomAut'],
            'prenom'=>$_POST['prenomAut']
        )
    );
            $ajout_auteurs=$req->fetchAll(PDO::FETCH_CLASS);
            //return $ajout_auteurs;

var_dump($ajout_auteurs);