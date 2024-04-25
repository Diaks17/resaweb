<?php
// session_start();
include("connexion.php");
require "header.php";
$requete = '';
$stmt = $db->prepare("SELECT * FROM manga,auteur,genre, editeur WHERE id_genre=ext_genre AND id_auteur=ext_auteur AND id_manga= :id_manga");
$stmt->bindValue('id_manga', $_GET["id_manga"], PDO::PARAM_INT);
$stmt->execute();
$det_manga = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<div class="container">
    <div class="detail_main">
        <!-- <div class="txt-heading">Products</div> -->
        <img src="./img/<?= $det_manga["image"]; ?>" alt="">
        <div class="detail_manga">
            <div class="product-tile-footer">
                <h1><?= $det_manga["titre"]; ?></h1>
                <p><?= $det_manga["description"]; ?></p>
                <div class="detail_prix"><?= "€" . $det_manga["prix"]; ?></div>
            </div>
            <div class="infos_manga">
                <?php require "formulaire.php" ?>
                <table>
                    <tbody>

                        <tr>
                            <td>Date de parution</td>
                            <td><?= $det_manga["date"] ?></td>
                        </tr>
                        <tr>
                            <td>Editeur</td>
                            <td><?= $det_manga["nom_editeur"] ?></td>
                        </tr>
                        <tr>
                            <td>Auteur</td>
                            <td><?= $det_manga["pseudo"] . $det_manga["nom"] . "  " . $det_manga["prenom"] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require "footer.php" ?>