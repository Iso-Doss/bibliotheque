<?php
if(isset($_GET['id']) and !empty($_GET['id']))
{
    
    $id=$_GET['id'];
    $Mauteurs=get_auteur($id);
    
    if(!empty($Mauteurs))
    {?>
    <form action="index.php?page=dashboard&section=modifier_auteur_traitement&id=<?= $id; ?>" method="post">
    
    <table>
<tr>
<tr>
            <td colspan="2">
                <?php              
                if (isset($_GET["erreurs"]) && !empty($_GET["erreurs"])) {
                    $erreurs = json_decode($_GET["erreurs"], true);
                    foreach ($erreurs as $erreur) {
                        echo "<li>" . $erreur . "</li>";
                    }
                }
                ?>
            </td>
</tr>
        <td>
            <label for="nomAut">Nom de l'auteur:</label>
        </td>
        <?php foreach($Mauteurs as $Mauteur){ ?>
        <td>
            <input id="nomAut" class="nomAut" name="nomAut" type="text" value="<?= $Mauteur->nomAut; ?>" placeholder="Veuillez entrez le nom de l'auteur" required>
        </td>
    </tr>
    <tr>
        <td>
            <label for="prenomAut">Prenom de l'auteur:</label>
        </td>
        <td>
            <input id="prenomAut" class="prenomAut" name="prenomAut" type="text" value="<?= $Mauteur->prenomAut; ?>" placeholder="Veuillez entrez le prénom de l'auteur" required>
        </td>
        <?php } ?>
    </tr>
        <tr>
            <td>
                <input type="reset" value="Effacer" name="Annuler">
            </td>
            <td>
                <input type="submit" value="Modifier" name="Connexion">
            </td>
        </tr>
        </table>
        </form>
        <?php
    }else
    {
    $erreurs="Ce auteur n'existe pas";
    header("location: index.php?page=dashboard&section=liste_auteur");
    }
}

?>
