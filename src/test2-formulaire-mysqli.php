<?php
// Variables de connexion à la base de données
$servername = "db";  // Nom du serveur MySQL
$username = "root";  // Nom d'utilisateur MySQL
$password = "root";      // Mot de passe de l'utilisateur
$dbname = "user_form"; // Nom de la base de données

// Créer une connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué: " . $conn->connect_error);
}

// Variable pour afficher un message
$message = "";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Hacher le mot de passe pour la sécurité
    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    // Préparer la requête pour insérer les données dans la table
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";

    // Préparer la déclaration
    if ($stmt = $conn->prepare($sql)) {
        // Lier les paramètres
        $stmt->bind_param("ss", $user, $hashed_pass);

        // Exécuter la requête
        if ($stmt->execute()) {
            $message = "Compte créé avec succès !";
        } else {
            $message = "Erreur lors de la création du compte : " . $stmt->error;
        }

        // Fermer la déclaration
        $stmt->close();
    } else {
        $message = "Erreur lors de la préparation de la requête : " . $conn->error;
    }
}

// Fermer la connexion
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
</head>
<body>
    <h2>Formulaire de création de compte</h2>
    <!-- Afficher le message de résultat -->
    <p><?php echo $message; ?></p>
    
    <!-- Formulaire pour saisir le nom d'utilisateur et le mot de passe -->
    <form action="" method="post">
        <label for="username">Nom d'utilisateur :</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Créer le compte">
    </form>
</body>
</html>
