<?php
$titre=$_POST['tire'];
$nbEx=$_POST['nbEx'];
$erreurs=array();
$success="";

if(!isset($titre) or empty($titre))
{
   $erreurs[]="Vous n'avez pas entrer le titre de l'ouvrage";
}
if(!isset($nbEx) or empty($nbEx))
{
   $erreurs[]="Vous n'avez pas entrer le nombre d'exemplaire de l'ouvrage";
}

if(empty($errors))
{
    $ajouter_ouvrage=ajouter_ouvrage();
    
    if (isset($ajouter_auteurs) and !empty($ajout_auteurs)) 
    {
            $success="L'auteur a été ajouter avec succes";
            
            header("location: index.php?page=dashboard&section=auteur&success=" . $success);
           die(var_dump($success));
    }else{
        $erreurs[] = "Un probleme est survenue lors de la requete. Veuillez réesayer.";
 
    }
}else {
    $erreurs [] = $bdd;
}
header("location: index.php?page=dashboard&section=ajout_auteur&erreurs=" . json_encode($erreurs));//ca nous redirige sur la page connexion en la passant en parzmetre suivie du tableau $erreurs crypté et de la variable string $success

?>