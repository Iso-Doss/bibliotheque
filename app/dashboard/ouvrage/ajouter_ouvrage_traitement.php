<?php
$nomAut=$_POST['nomAut'];
$titre=$_POST['titre'];
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
    $numAut=recherche_auteur();
    $ajouter_ouvrage=ajouter_ouvrage();
    
    if (isset($ajouter_ouvrage) and !empty($ajouter_ouvrage) and isset($numAut) and !empty($numAut)) 
    {
        
            $success="L'ouvrage a été ajouter avec succes";
            
            header("location: index.php?page=dashboard&section=ouvrage&success=" . $success);
            var_dump($ajouter_ouvrage); 
            var_dump($numAut);
            die();
    }else{
        $erreurs[] = "Un probleme est survenue lors de la requete. Veuillez réesayer.";
 
    }
}else {
    $erreurs [] = $bdd;
}
header("location: index.php?page=dashboard&section=ajouter_ouvrage&erreurs=" . json_encode($erreurs));//ca nous redirige sur la page connexion en la passant en parzmetre suivie du tableau $erreurs crypté et de la variable string $success

?>