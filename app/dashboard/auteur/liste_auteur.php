<?php
    $auteurs = liste_auteurs();
    //$numAut=$auteurs->numAut;
?>

<div style="width: 1111px; background: gainsboro;">
    <div>
        <h1>Liste des auteurs</h1>
        <a href="index.php?page=dashboard&section=ajout_auteur" class="" >Ajouter</a>
    </div>

    <div>
        <tr>
            <td>
            <?php
            if (isset($_GET['success']) && !empty($_GET['success']))
                 {
                    ?>
                    <li><?php echo $_GET['success'];?></li>
                    <?php      
                } 

    
                ?>
            
            </td>
        </tr>
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
        <?php
            if(isset($auteurs) && !empty($auteurs)){
              
                ?>
                    <table border="3">
                        <tr>
                        <td><b>Nom</b></td>
                        <td><b>Prenom</b></td>
                        <td><b>Actions</b></td>
                        </tr>
                        <?php foreach($auteurs as $auteur){ ?>
                            <tr>
                                <td> <?= $auteur->nomAut; ?> </td>
                                <td> <?= $auteur->prenomAut; ?> </td>
                                <td style="padding: 5px;">
                                    <a href="index.php?page=dashboard&section=modifier_auteur&id=<?= $auteur->numAut; ?>">Modifier</a>
                                    <a href="index.php?page=dashboard&section=supprimer_auteur_traitement&id=<?= $auteur->numAut; ?>" class="" >Supprimer</a>
                                    <a href="index.php?page=dashboard&section=activer_desactiver_auteur&id=<?= $auteur->numAut; ?>" class="" >Activer/Desactiver</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>
                <?php
            }else{
                echo "Pas d'auteurs disponible. Veuillez utiliser le bouton ajouter ci_dessus pour ajouter un nouveau auteur.";
            }
        ?>
    </div>
</div>