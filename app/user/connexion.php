<?php
session_start();
if(isset($_SESSION["autoriser"]))
{
    header("location: index.php?page=index");}
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form action="?page=connexion-traitement" method="POST" enctype="multipart/form-data">
    <p>Page de connexion:</p>
    <table>
        <tr>
            <td colspan="2">
                <?php              
                if (isset($_GET["erreurs"]) && !empty($_GET["erreurs"])) {
                    $erreurs = json_decode($_GET["erreurs"], true);
                    foreach ($erreurs as $erreur) {
                        echo "<li>" . $erreur . "</li>";
                    }

                }

                if (isset($_GET["success"]) && !empty($_GET["success"]))
                 {
                    header("location: index.php?page=session");
                } else
                
            
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <label for="email">Email:</label>
            </td>
            <td>
                <input id="email" class="email" name="email" type="text" value="" placeholder="Veuillez entrez votre mail" required>
            </td>
        </tr>
        <tr>
            <td>
                <label for="mot-de-passe">Mot de passe:</label>
            </td>
            <td>
                <input id="mot-de-passe" class="mot-de-passe" name="mot-de-passe"  type="password" value="" placeholder="Veuillez entrez votre mot de passe" required>
            </td>
        </tr>
        <tr>
            <td>
                <input type="reset" value="Annuler" name="Annuler">
            </td>
            <td>
                <input type="submit" value="Connexion" name="Connexion">
            </td>
        </tr>
    </table>
</form>