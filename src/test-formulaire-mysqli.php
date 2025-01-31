<?php
$servername = "db"; // Nom du serveur MySQL sur phpMyAdmin
$username = "root";
$password = ""; // Si tu n'as pas défini de mot de passe
$dbname = "user_form"; // Nom de la base de données

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connexion à la base de données MySQL réussie!";
?>

