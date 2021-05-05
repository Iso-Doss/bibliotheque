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
        <title>Gestion d'un auteur</title>
    </head>
    <body>
        <div style="display: flex;">
            <div style="width: 370.5px; height:1000px; background-color: paleturquoise">
                    <p><a href="index.php?page=dashboard&section=auteur">Gestion d'un auteur</a></p>
                    <p><a href="index.php?page=dashboard&section=ouvrage">Gestion d'un ouvrage</a></p>
                    <p><a href="index.php?page=dashboard&section=domaine">Gestion d'un domaine</a></p>
                    <p><a href="index.php?page=dashboard&section=langue">Gestion d'une langue</a></p>
                    <p><a href="index.php?page=dashboard&section=emprunt">Gestion d'un emprunt</a></p>
                    <p><a href="index.php?page=dashboard&section=membre">Gestion d'un membre</a></p>
            </div>
            <div style="width: 1111px; height:1000px; background: gainsboro;">
                <?php get_dashbord_page(); ?>
            </div>
        </div>
    </body>
</html>