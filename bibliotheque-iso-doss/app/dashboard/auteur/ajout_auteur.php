
<h1>Ajouter un auteur</h1>

<form action="index.php?page=dashboard&section=ajout_auteur_traitement" method="post">
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
                ?>
            </td>
</tr>
<tr>
        <td>
            <label for="nomAut">Nom de l'auteur:</label>
        </td>
        <td>
            <input id="nomAut" class="nomAut" name="nomAut" type="text" value="" placeholder="Veuillez entrez le nom de l'auteur" required>
        </td>
    </tr>
    <tr>
        <td>
            <label for="prenomAut">Prenom de l'auteur:</label>
        </td>
        <td>
            <input id="prenomAut" class="prenomAut" name="prenomAut" type="text" value="" placeholder="Veuillez entrez le prénom de l'auteur" required>
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
<?php
?>
