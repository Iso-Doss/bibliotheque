<?php
$nomAut=$_POST['nomAut'];
$prenomAut=$_POST['prenomAut'];
$erreurs=array();
$success="";

if(!isset($nomAut) or empty($nomAut))
{
   $erreurs[]="Vous n'avez pas entrer le nom de l'auteur";
}
if(!isset($prenomAut) or empty($prenomAut))
{
   $erreurs[]="Vous n'avez pas entrer le prenom de l'auteur";
}

if(empty($errors))
{
    $ajout_auteurs=ajout_auteur();
    
    if (isset($ajout_auteurs) and !empty($ajout_auteurs)) 
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