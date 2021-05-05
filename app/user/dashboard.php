<?php
session_start();
if($_SESSION["autoriser"]!="oui")
{
   header("location: index.php?page=connexion");
   exit();
}
if (isset($_SESSION['dernier_signe_de_vie']))
{
    if (time() - $_SESSION['dernier_signe_de_vie'] > 1800)
    {
         // déconnexion
         session_unset();
         session_destroy();
 
         // Affichage d'un message signalant que l'on est plus connecté
         // TODO
     }
     else
     {
         $_SESSION['dernier_signe_de_vie'] = time();
 
     }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion</title>
    
</head>
<body >
<!-- switch ($_REQUEST["page"]) {
            case "connexion":
                include_once './app/user/connexion.php';
                break; -->
                <div style="display: flex;">
<div style="width: 370.5px; background-color: paleturquoise">
<?php require_once "include_gestion.php" ?>
</div>
<div style="width: 1111px; background: gainsboro;">
<?php// require_once "gestion_auteur.php" ?>
</div>

</div>
</body>
</html>