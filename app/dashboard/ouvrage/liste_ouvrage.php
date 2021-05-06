<?php
    $ouvrages = liste_ouvrages();
?>

<div style="width: 1111px; background: gainsboro;">
    <div>
        <h1>Liste des ouvrage</h1>
        <a href="index.php?page=dashboard&section=ajouter_ouvrage" class="" >Ajouter</a>
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
            if(isset($ouvrages) && !empty($ouvrages)){
                ?>
                    <table border="3">
                        <tr>
                        <td><b>Titre</b></td>
                        <td><b>Nombre d'exemplaire</b></td>
                            <td><b>Actions</b></td>
                        </tr>
                        <?php foreach($ouvrages as $ouvrage){ ?>
                            <tr>
                                <td> <?= $ouvrage->titre; ?> </td>
                                <td> <?= $ouvrage->nbEx; ?> </td>
                                <td style="padding: 5px;">
                                    <a href="index.php?page=dashboard&section=modifier_ouvrage" class="" >Modifer</a>
                                    <a href="index.php?page=dashboard&section=supprimer_ouvrage" class="" >Supprimer</a>
                                    <a href="index.php?page=dashboard&section=activer_desactiver_ouvrage" class="" >Activer/Desactiver</a>
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