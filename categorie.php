<?php
include("header.php");
?>
<?php
include("connexion.php");
$reference = $_GET["cat"];
// echo $reference;
$requete = "SELECT * FROM manga,genre, rel_manga_genre WHERE manga.ext_genre=rel_manga_genre.ext_manga AND rel_manga_genre.ext_genre=genre.id_genre AND genre.id_genre=$reference";
$stmt = $db->query($requete);
$resultat = $stmt->fetchall(PDO::FETCH_ASSOC);

// if ($reference == 1) {
//     $requete = $requete . " id_genre!=2";
// } elseif ($reference == 2) {
//     $requete = $requete . " id_genre=2";
// } elseif ($reference == 3) {
//     $requete = $requete . " id_genre=3";
// } elseif ($reference == 4) {
//     $requete = $requete . " id_genre=4";
// } elseif ($reference == 5) {
//     $requete = $requete . " id_genre=5";
// } elseif ($reference == 6) {
//     $requete = $requete . " id_genre=5 AND article.prix=0.00";
// } elseif ($reference == 7) {
//     $requete = $requete . " id_genre=1";
// }

// $requete =  "SELECT note, id_manga, prix, titre,manga.type, manga.date, manga.image, id_genre, GROUP_CONCAT(genre.nom_genre SEPARATOR ',' ) AS groupgenres FROM manga LEFT JOIN rel_manga_genre ON manga.id_manga = rel_manga_genre.ext_manga INNER JOIN genre ON genre.id_genre = rel_manga_genre.ext_genre GROUP BY manga.id_manga";
?>
<div class="cards-container">
    <?php
    // $stmt = $db->query($requete);
    // $resultat = $stmt->fetchall(PDO::FETCH_ASSOC);
    foreach ($resultat as $manga) {
        $a = 1;
        // $genreTableCount = count($genreTable);
        echo "<a href=\"detail_manga.php?id_manga={$manga["id_manga"]}\"><div class=\"card manga{$manga['id_manga']}\"><div class=\"img_card\"><div class=\"linear\"></div><div class=\"filter\"></div><img src='img/{$manga["image"]}'>";

        echo "</div><div class=\"informations\"><h3><a class=\"titre\" >{$manga["titre"]}</a></h3><div class=\"stars\"><svg width=\"18\" height=\"17\" viewBox=\"0 0 18 17\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z\" fill=\"#AFD6D1\"/ class=\"star star-1\">
            </svg><svg width=\"18\" height=\"17\" viewBox=\"0 0 18 17\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z\" fill=\"#AFD6D1\"/ class=\"star star-2\">
            </svg><svg width=\"18\" height=\"17\" viewBox=\"0 0 18 17\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z\" fill=\"#AFD6D1\"/ class=\"star star-3\">
            </svg><svg width=\"18\" height=\"17\" viewBox=\"0 0 18 17\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z\" fill=\"#AFD6D1\"/ class=\"star star-4\">
            </svg><svg width=\"18\" height=\"17\" viewBox=\"0 0 18 17\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z\" fill=\"#AFD6D1\"/ class=\"star star-5\">
            </svg></div><p class=\"date\">TOME 1- {$manga["date"]}</p><p class=\"prix\">{$manga["prix"]} €</p></div></div></a>\n";
        // if (++$i == 6) break;
        /*<a href=\"detail_manga.php?toto={$manga["id_manga"]}\">{$manga["titre"]}</a></td><td>{$manga["prenom"]} {$manga["nom"]}  {$manga["pseudo"]}</td><td>{$manga["nom_genre"]}</td><td><img src='img/{$manga["image"]}'></td></tr> \n";*/
        if ($manga["note"] == 5) {
            echo "<script>
            var star = document.querySelectorAll(\".manga" . $manga['id_manga'] . " .star\");
                star.forEach(element => element.style.fill='#1DCDB8');
                
                
                </script>\n";
        }
        if ($manga["note"] == 4) {
            echo "<script>
                    var star1 = document.querySelectorAll(\".manga" . $manga['id_manga'] . " .star-1\");
                    var star2 = document.querySelectorAll(\".manga" . $manga['id_manga'] . " .star-2\");
                    var star3 = document.querySelectorAll(\".manga" . $manga['id_manga'] . " .star-3\");
                    var star4 = document.querySelectorAll(\".manga" . $manga['id_manga'] . " .star-4\");
                    star1.forEach(element => element.style.fill='#1DCDB8');
                    star2.forEach(element => element.style.fill='#1DCDB8');
                    star3.forEach(element => element.style.fill='#1DCDB8');
                    star4.forEach(element => element.style.fill='#1DCDB8');
                    </script>\n";
        }
        if ($manga["note"] == 3) {
            echo "<script>
                    var star1 = document.querySelectorAll(\".manga" . $manga['id_manga'] . " .star-1\");
                    var star2 = document.querySelectorAll(\".manga" . $manga['id_manga'] . " .star-2\");
                    var star3 = document.querySelectorAll(\".manga" . $manga['id_manga'] . " .star-3\");
                    star1.forEach(element => element.style.fill='#1DCDB8');
                    star2.forEach(element => element.style.fill='#1DCDB8');
                    star3.forEach(element => element.style.fill='#1DCDB8');
                    </script>\n";
        }
        if ($manga["note"] == 2) {
            echo "<script>
                    var star1 = document.querySelectorAll(\".manga" . $manga['id_manga'] . " .star-1\");
                    var star2 = document.querySelectorAll(\".manga" . $manga['id_manga'] . " .star-2\");
                    star1.forEach(element => element.style.fill='#1DCDB8');
                    star2.forEach(element => element.style.fill='#1DCDB8');
                    </script>\n";
        }
        if ($manga["note"] == 1) {
            echo "<script>
                    var star1 = document.querySelectorAll(\".manga" . $manga['id_manga'] . " .star-1\");
                    star1.forEach(element => element.style.fill='#1DCDB8');
                    </script>\n";
        }
        if ($a++ == "<script>console.loge(6);</script>") {
            break;
        }
    }

    ?>
</div>
<?php include("footer.php"); ?>