<?php require "header.php"
?>
<div class="slider-container">
    <div class="slider-filter"></div>
    <div class="arrows">
        <img src="./img/arrow-left.svg" class=" arrow left" alt="">
        <img src="./img/arrow-right.svg" class=" arrow right" alt="">
    </div>
    <div class="sliders">
        <div class="slider slide3">
            <div class="news">
                <h1>Four Knights of the Apocalypse adapté en anime</h1>
                <p>La revue Shônen Magazine, prépubliant le manga Four Knights of the Apocalypse de Nakaba Suzuki, a dévoilé la mise en chantier d'une adaptation animée.<br>Pour l'heure, nous n'en savons pas plus sur le projet, que ce soit sur son staff ou son casting vocal.<br>Néanmoins, un premier visuel promotionnel a déjà été dévoilé...</p>
                <div class="button"><a href="https://www.manga-news.com/index.php/actus/2022/05/01/Le-manga-Four-Knights-of-the-Apocalypse-adapte-en-anime">Lire l'article</a></div>
            </div>
            <img src="./img/Four-Knights-banner.webp" class="banner" alt="">
        </div>
        <div class="slider slide1">
            <div class="news">
                <h1>Killer Shark in Another World annoncé par Meian </h1>
                <p>Le manga Killer Shark in Another World vient d'être annoncé en France par les éditions Meian, pour une sortie prévue dans leur collection seinen à partir du 22 juillet...</p>
                <div class="button"><a href="https://www.manga-news.com/index.php/actus/2022/05/11/Killer-Shark-in-Another-World-annonce-par-Meian">Lire l'article</a></div>
            </div>
            <img src="./img/Killer_Shark-banner.jpg" class="banner" alt="">
        </div>
        <div class="slider slide 2">
            <div class="news">
                <h1>Le coffret Alabasta de One Piece approche chez Glénat </h1>
                <p>Les éditions Glénat ont annoncé l'arrivée du coffret de l'arc Alabasta de One Piece le 1er juin, au prix de 75,90€, soit le même prix que les volumes unitaires...</p>
                <div class="button"><a href="https://www.manga-news.com/index.php/actus/2022/05/11/Le-coffret-Alabasta-de-One-Piece-approche-chez-Glenat">Lire l'article</a></div>
            </div>
            <img src="./img/Arco_de_Arabasta.webp" class=" banner" alt="">
        </div>
        <div class="slider slide3">
            <div class="news">
                <h1>Four Knights of the Apocalypse adapté en anime</h1>
                <p>La revue Shônen Magazine, prépubliant le manga Four Knights of the Apocalypse de Nakaba Suzuki, a dévoilé la mise en chantier d'une adaptation animée.<br>Pour l'heure, nous n'en savons pas plus sur le projet, que ce soit sur son staff ou son casting vocal.<br>Néanmoins, un premier visuel promotionnel a déjà été dévoilé...</p>
                <div class="button"><a href="https://www.manga-news.com/index.php/actus/2022/05/01/Le-manga-Four-Knights-of-the-Apocalypse-adapte-en-anime">Lire l'article</a></div>
            </div>
            <img src="./img/Four-Knights-banner.webp" class="banner" alt="">
        </div>
        <div class="slider slide1">
            <div class="news">
                <h1>Killer Shark in Another World annoncé par Meian </h1>
                <p>Le manga Killer Shark in Another World vient d'être annoncé en France par les éditions Meian, pour une sortie prévue dans leur collection seinen à partir du 22 juillet...</p>
                <div class="button"><a href="https://www.manga-news.com/index.php/actus/2022/05/11/Killer-Shark-in-Another-World-annonce-par-Meian">Lire l'article</a></div>
            </div>
            <img src="./img/Killer_Shark-banner.jpg" class="banner" alt="">
        </div>
    </div>
</div>
</header>


<?php
include("connexion.php");
$requete =  "SELECT note, id_manga, prix, titre,manga.type, manga.date, manga.image, id_genre, GROUP_CONCAT(genre.nom_genre SEPARATOR ',' ) AS groupgenres FROM manga LEFT JOIN rel_manga_genre ON manga.id_manga = rel_manga_genre.ext_manga INNER JOIN genre ON genre.id_genre = rel_manga_genre.ext_genre GROUP BY manga.id_manga DESC LIMIT 8";

$stmt = $db->query($requete);
$resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
$i = 0;
$a = 1;
?>


<!-- <div class="mangas-pop"> -->
<h2 class="accueil_h2">Mangas récents</h2>
<div class="cards-container">
    <?php
    // if (!empty($product_array)) {
    foreach ($resultat as $manga) {
        $genreTable = explode(',', $manga['groupgenres']);
        // echo '<pre>';
        // var_dump($genreTable);
        // echo '</pre>';
        $genreTableCount = count($genreTable);
        // echo `
        // <form method="post" action="index.php?action=add&code={$manga["type"]}">
        // <div class="product-image"><img src="{$manga["image"]}"></div>
        // <div class="product-tile-footer">
        // <div class="product-title"> {$manga["titre"]}</div>
        // <div class="product-price"> "$".{$manga["prix"]}</div>
        // <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
        // </div>
        // </form>`;

        echo "<a href=\"detail_manga.php?id_manga={$manga["id_manga"]}\"><div class=\"card manga{$manga['id_manga']}\"><div class=\"img_card\"><div class=\"linear\"></div><div class=\"filter\"></div><img src='img/{$manga["image"]}'></div><div class=\"genres\">";
        for ($i = 0; $i < $genreTableCount; $i++) {
            echo "<a href=\"categorie.php?cat={$manga["id_genre"]}\">$genreTable[$i]</a> ";
        }
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


    <div class="button_voir">Voir Plus</div>
</div>
<?php require "footer.php" ?>