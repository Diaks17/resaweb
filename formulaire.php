<?php
if (isset($_POST['valider'])) {
    $id = $_POST["id"];
    $nom = $_POST["Nom"];
    $prenom = $_POST["Prenom"];
    $mail = $_POST["mail"];
    $date = $_POST["date"];
    echo "<p>Merci $prenom $nom pour votre commande!<br> Un mail va vous être envoyer à l'adresse $mail pour confirmer la réservation de" . " " . $det_manga["titre"] . ' Tome' . $det_manga["tome"], " à récupérer pour le $date dans notre boutique</p>";
    $requete = "INSERT INTO reservation (nom_util, prenom_util, email,id_user, reservation.date) VALUES ('$nom', '$prenom', '$mail', '$id','$date')";
    $stmt = $db->query($requete);
    $resultat = $stmt->fetchall(PDO::FETCH_ASSOC);
    $contenu = "<h1>Confirmation de la réservation</h1>";
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=utf-8';
    mail($mail, 'test subject', $contenu, implode("\r\n", $headers));
    echo "Mail envoyé";
}

?>
<div class="container-form">
    <div class="formulaire">
        <form method="post">
            <label for="Nom">Entrez votre nom :</label>
            <input type="text" name="Nom" id="Nom" placeholder="Jaeger">
            <label for="Prenom">Entrez votre prénom :</label>
            <input type="text" name="Prenom" id="Prenom" placeholder="Eren">
            <label for="mail">Entrez votre adresse mail :</label>
            <input type="email" name="mail" id="mail" placeholder="jaimangemonpere@gmail.com">
            <label for="date">Sélectionnez une date de retrait :</label>
            <input type="date" name="date" id="date">
            <label for="valider">Reservez</label>
            <div class="btn-form"><input type="submit" name="valider" id="valider"></div>
            <input type="hidden" name="id" id="id" value="<?= $det_manga["id_manga"] ?>">
        </form>
    </div>
</div>