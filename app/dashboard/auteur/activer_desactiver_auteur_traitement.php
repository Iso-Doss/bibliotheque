<?php
$id=$_GET['id'];
$statut=0;
$erreurs=array();
$success="";

if(!isset($id) or empty($id))
{
 
   $erreurs[]="Vous n'avez pas renseigner le bon id de l'auteur";
}
   if(empty($erreurs))
   {
        
        $desactiver_auteurs=desactiver_auteur($id,$statut);
       
        
        $success="Vous avez bien désactiver l'auteur";
   } else{
      $erreurs[] = "Un problème a été rencontrer laors de l'excécution de la requète.";  
       }


header("location: index.php?page=dashboard&section=liste_auteur&erreurs=" . json_encode($erreurs)."&success=" . $success);//ca nous redirige sur la page connexion en la passant en parzmetre suivie du tableau $erreurs crypté et de la variable string $success




?>