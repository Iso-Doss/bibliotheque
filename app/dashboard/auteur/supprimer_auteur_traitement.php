<?php
$success="";
if(isset($_GET['id']) and !empty($_GET['id']))
{
    
    $id=$_GET['id'];
    $Mauteurs=get_auteur($id);
    if(!empty($Mauteurs))
    {
        $supprimer_auteurs=supprimer_auteur($id);
        $success="L'auteur a bel et bien été supprimer";
        header("location: index.php?page=dashboard&section=liste_auteur");

    }

}
    
    
    
    
    ?>