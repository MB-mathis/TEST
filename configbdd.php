<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "user_form";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}
?>
