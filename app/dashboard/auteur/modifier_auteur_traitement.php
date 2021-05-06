<?php
$nomAut=$_POST['nomAut'];
$prenomAut=$_POST['prenomAut'];
$erreurs=array();
$id=$_GET['id'];
$success="";

if(!isset($nomAut) or empty($nomAut))
{
   $erreurs[]="Vous n'avez pas entrer le nom de l'auteur";
}
if(!isset($prenomAut) or empty($prenomAut))
{
   $erreurs[]="Vous n'avez pas entrer le prenom de l'auteur";
}

if(empty($erreurs))
{
    $modifier_auteurs=modifier_auteur($nomAut,$prenomAut,$id);
    
            $success="L'auteur a été modifier avec succes";
            
           // header("location: index.php?page=dashboard&section=liste_auteur&success=" . $success);
            
    }else{
        $erreurs[] = "Vous avez mal renseigner les champs. Veuillez réesayer.";  
         }


header("location: index.php?page=dashboard&section=liste_auteur&erreurs=" . json_encode($erreurs)."&success=" . $success);//ca nous redirige sur la page connexion en la passant en parzmetre suivie du tableau $erreurs crypté et de la variable string $success

?>