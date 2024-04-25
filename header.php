<?php
// session_start();
include("connexion.php");
$requete = "SELECT * FROM manga,auteur,genre, editeur WHERE id_genre=ext_genre";
// require_once("dbcontroller.php");
// var_dump($_SESSION["cart_item"]);
// session_destroy();

// if (!array_key_exists('cart_item', $_SESSION)) {
//     $_SESSION["cart_item"] = [];
// }

// foreach ($_SESSION["cart_item"] as $key => $value) {
//     $req = $db->prepare(
//         "SELECT *
//       FROM manga
//       WHERE id_manga=$key"
//     );
//     $req->execute();
//     $mangas[$key] = $req->fetch(PDO::FETCH_ASSOC);
//     $mangas[$key]["quantity"] = $value;
//     $mangas[$key]["total"] = $value * $mangas[$key]["prix"];
// }
// // var_dump($mangas);
// if (!empty($_GET["action"])) {
//     var_dump($_SESSION["cart_item"]);
//     switch ($_GET["action"]) {
//         case "add":
//             if (array_key_exists($_GET["id_manga"], $_SESSION["cart_item"])) {
//                 $_SESSION["cart_item"][$_GET["id_manga"]]++;
//             } else {
//                 $_SESSION["cart_item"][$_GET["id_manga"]] = 1;
//             }
//             break;
//         case "remove":
//             unset($_SESSION["cart_item"][$_GET["id_manga"]]);
//             break;
//         case "empty":
//             unset($_SESSION["cart_item"]);
//             break;
//     }
// }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="./styles/style.css">
    <title>Karma</title>
</head>

<body>
    <header>
        <div class="nav-bar">
            <ul class="nav-menu">
                <li><a href="./index.php" data-item='Accueil'>Accueil</a></li>
                <li><a href="./mangas.php" data-item='Mangas'>Mangas</a></li>
                <li><a href="./categories.php" data-item='Catégories'>Catégories</a></li>
                <li><a href="./apropos.php" data-item='A propos'>A propos</a></li>
            </ul>
            <div class="search">
                <div class="search_bar">
                    <input type="text" id="search-manga" placeholder="Recherche">
                </div>
                <div id="result_search"></div>
            </div>
        </div>
        <!-- <div id="shopping-cart">
            <div class="txt-heading">Shopping Cart</div>

            <a id="btnEmpty" href="detail_manga.php?action=empty">Empty Cart</a> -->
        <?php
        // if (isset($_SESSION["cart_item"])) {
        //     $total_quantity = 0;
        //     $total_price = 0;
        ?>
        <!-- <table class="tbl-cart" cellpadding="10" cellspacing="1">
                    <tbody>
                        <tr>
                            <th style="text-align:left;">Titre</th>
                            <th style="text-align:left;">Code</th>
                            <th style="text-align:right;" width="5%">Quantité</th>
                            <th style="text-align:right;" width="10%">Prix unité</th>
                            <th style="text-align:right;" width="10%">Price</th>
                            <th style="text-align:center;" width="5%">Remove</th>
                        </tr> -->
        <?php
        if (isset($mangas)) {

            foreach ($mangas as $manga) {


        ?>
                <!-- <tr>
                        <td><img src="<?php echo $manga["image"]; ?>" class="cart-item-image" /><?php echo $manga["titre"]; ?></td>
                        <td style="text-align:right;"><?php echo $manga["quantity"]; ?></td>
                        <td style="text-align:right;"><?php echo "$ " . $manga["prix"]; ?></td>
                        <td style="text-align:right;"><?php echo "$ " . number_format($manga["total"], 2); ?></td>
                        <td style="text-align:center;"><a href="detail_manga.php?action=remove&id_manga=<?php echo $manga["id_manga"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="right">Total:</td>
                        <td align="right"><?php echo $total_quantity; ?></td>
                        <td align="right" colspan="2"><strong><?php echo "$ " . number_format($total_price, 2); ?></strong></td>
                        <td></td>
                    </tr>
                    </tbody>
                    </table> -->

            <?php
            }
            // $total_quantity += $manga["quantity"];
            // $total_price += ($manga["prix"] * $manga["quantity"]);
        } else { ?>

            <!-- <div class="no-records">Your Cart is Empty</div> -->
        <?php }
        // }

        ?>


        <!-- </div> -->