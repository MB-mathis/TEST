<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: connexion.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h2>Bienvenue, <?php echo htmlspecialchars($_SESSION["username"]); ?> !</h2>
    <p>Vous êtes connecté.</p>
    <a href="deconnexion.php">Se déconnecter</a>
</body>
</html>
