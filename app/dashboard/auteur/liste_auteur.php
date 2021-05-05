<?php
    $auteurs = liste_auteurs();
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
        <?php
            if(isset($auteurs) && !empty($auteurs)){
                ?>
                    <table border="3">
                        <tr>
                        <td><b>Nom</b></td>
                            <td><b>Actions</b></td>
                        </tr>
                        <?php foreach($auteurs as $auteur){ ?>
                            <tr>
                                <td> <?= $auteur->nomAut; ?> </td>
                                <td style="padding: 5px;">
                                    <a href="index.php?page=dashboard&section=modifiert_auteur" class="" >Modier</a>
                                    <a href="index.php?page=dashboard&section=supprimer_auteur" class="" >Supprimer</a>
                                    <a href="index.php?page=dashboard&section=aactiver_desactiver_auteur" class="" >Activer/Desactiver</a>
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