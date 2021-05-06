
<h1>Ajouter un ouvrage</h1>

<form action="index.php?page=dashboard&section=ajouter_ouvrage_traitement" method="post">
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
<h3>Entrer d'abord son auteur</h3><tr>
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
    </table>
    <table>
    <h3>Entrer les informations de l'ouvrage</h3>
<tr>
        <td>
            <label for="titre">Titre de l'ouvrage</label>
        </td>
        <td>
            <input id="titre" class="titre" name="titre" type="text" value="" placeholder="Veuillez entrez le titre de l'ouvrage" required>
        </td>
    </tr>
    <tr>
        <td>
            <label for="nbEx">Nombre d'exemplaire de l'ouvrage:</label>
        </td>
        <td>
            <input id="nbEx" class="nbEx" name="nbEx" type="text" value="" placeholder="Veuillez entrez le nombre d'exemplaire de l'ouvrage" required>
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
