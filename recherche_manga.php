<?php
session_start();
require_once('connexion.php');

if (isset($_POST['query'])) {
  $query = (string) trim($_POST['query']);
  $req = $db->query(
    "SELECT titre, id_manga
      FROM manga
      WHERE titre LIKE '%$query%'
      LIMIT 10"
  );
  $req->execute();
  $resultats = $req->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($resultats);
}
