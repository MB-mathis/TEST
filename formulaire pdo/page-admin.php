<?php
require_once "configbdd-pdo.php"; // Inclusion de la connexion à la base de données

// On écrit notre requête
$sql = 'SELECT * FROM `jeux`';

// On prépare la requête
$query = $db->prepare($sql);

// On exécute la requête
$query->execute();

// On stocke le résultat dans un tableau associatif
$result = $query->fetchAll(PDO::FETCH_ASSOC);










?>