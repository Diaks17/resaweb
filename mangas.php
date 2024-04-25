<?php
require "connexion.php";
require "header.php";
$requete =  "SELECT id_genre,note, id_manga, prix, titre,manga.type, manga.date, manga.image, GROUP_CONCAT(genre.nom_genre SEPARATOR ',' ) AS groupgenres FROM manga LEFT JOIN rel_manga_genre ON manga.id_manga = rel_manga_genre.ext_manga INNER JOIN genre ON genre.id_genre = rel_manga_genre.ext_genre GROUP BY manga.id_manga";

if (isset($_GET["tri"])) {
        $requete = $requete . " ORDER BY " . $_GET["tri"];
}
if (isset($_GET["tri-desc"])) {
        $requete = $requete . " ORDER BY " . $_GET["tri-desc"] .  " " . "DESC";
}
$stmt = $db->query($requete);
$resultat = $stmt->fetchall(PDO::FETCH_ASSOC);
$i = 0;
?>
<div class="filtre-cont">
        <div class="trier">Trier par:</div>
        <ul class="filtre hidden">
                <li><a href="mangas.php?tri=titre">titre</a></li>
                <li><a href="mangas.php?tri=prix">prix croissant</a></li>
                <li><a href="mangas.php?tri-desc=prix">prix décroissant</a></li>
                <li><a href="mangas.php?tri-desc=note">note</a></li>
                <li><a href="mangas.php?tri=date">plus récent</a></li>
                <li><a href="mangas.php?tri-desc=date">plus ancien</a></li>
        </ul>
</div>
<div class="cards-container-mangas">
        <?php
        foreach ($resultat as $manga) {
                $genreTable = explode(',', $manga['groupgenres']);

                $genreTableCount = count($genreTable);

                echo "<a href=\"detail_manga.php?id_manga={$manga["id_manga"]}\"><div class=\"card manga{$manga['id_manga']}\"><div class=\"img_card\"><div class=\"linear\"></div><div class=\"filter\"></div><img src='img/{$manga["image"]}'></div><div class=\"genres\"> ";
                for ($i = 0; $i < $genreTableCount; $i++) {
                        echo '<a href="categorie.php?cat=' . $manga["id_genre"] . '">' . $genreTable[$i] . '</a> ';
                }
                echo "</div><div class=\"informations\"><h3><a class=\"titre\" >{$manga["titre"]}</a></h3><div class=\"stars\"><svg width=\"18\" height=\"17\" viewBox=\"0 0 18 17\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z\" fill=\"#AFD6D1\"/ class=\"star star-1\">
                </svg><svg width=\"18\" height=\"17\" viewBox=\"0 0 18 17\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z\" fill=\"#AFD6D1\"/ class=\"star star-2\">
                </svg><svg width=\"18\" height=\"17\" viewBox=\"0 0 18 17\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z\" fill=\"#AFD6D1\"/ class=\"star star-3\">
                </svg><svg width=\"18\" height=\"17\" viewBox=\"0 0 18 17\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z\" fill=\"#AFD6D1\"/ class=\"star star-4\">
                </svg><svg width=\"18\" height=\"17\" viewBox=\"0 0 18 17\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\"><path d=\"M9 0L11.0206 6.21885H17.5595L12.2694 10.0623L14.2901 16.2812L9 12.4377L3.70993 16.2812L5.73056 10.0623L0.440492 6.21885H6.97937L9 0Z\" fill=\"#AFD6D1\"/ class=\"star star-5\">
                </svg></div><p class=\"date\">TOME 1- {$manga["date"]}</p><p class=\"prix\">{$manga["prix"]} €</p></div></div></a>\n";

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
        }

        ?>
</div>
<?php require "footer.php";
