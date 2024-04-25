Procédure pour installer le site web en local :
1. Installer le serveur local XAMPP (https://www.apachefriends.org/fr/index.html). Il est aussi possible d'utiliser d'autres serveurs locaux, tels que MAMPP ou WAMPP.
2. Ouvrir en tant qu'administrateur XAMPP (dans l'explorateur de fichier, c:\xampp\xampp-control)
3. Une fois XAMPP ouvert, cliquer sur "Start" pour les Modules "Apache" et "MySQL".
4. Dans un navigateur, saisir l'URL "http://localhost/", sélectionner le dossier "dashboard/", puis se rendre dans phpMyAdmin (base de données locale), ou plus rapidement, saisir l'URL "http://localhost/phpmyadmin/".
5. Créer une nouvelle base de données, y insérer le document "moussa.diakite_db.sql". Les tables et leur contenu seront entrés dans la nouvelle base de données.
6. Dans l'explorateur de fichiers, "c:\xampp", allez dans le dossier "htdocs", insérer le dossier "ResaWeb" contenant tous les fichiers du site web.
7. Dans le document "connexion.php", modifier l'accès à la base de données de sorte à ce que le site soit lié à la base en serveur local.
Insérer une commande PHP du type : 
<?php $db =new PDO('mysql:host=localhost;dbname=moussa.diakite_db;port=3306;charset=utf8', 'root', ''); ?>
8. Retourner dans le localhost sur un navigateur et ouvrir le dossier contenant le site web. Si tout fonctionne, le site web s'affiche.
9. En local, le site web est accessible depuis l'URL : "http://localhost/resaweb/index.php" 
