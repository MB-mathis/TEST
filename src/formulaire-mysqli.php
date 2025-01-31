<html>
    <head>
        <link rel="stylesheet" href="form.css" />
    </head>
    <body>
    <?php
        // Paramètres de connexion
        $servername = "localhost";
        $username = "root";
        $password = ""; // Votre mot de passe MySQL
        $dbname = "user_form";

            // Créer une connexion
            $mysqli = new mysqli($servername, $username, $password, $dbname);

            // Vérifier la connexion
            if ($mysqli->connect_error) {
                die("Échec de la connexion : " . $mysqli->connect_error);
            }
            echo "Connexions réussie à la base de données 'user_form'.";

            
            // envoi des information dans la BDD
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                $name=$_POST['name'];
                $email=$_POST['email'];
                $pwd=password_hash($_POST['pwd'],PASSWORD_DEFAULT);

                $sql="INSERT INTO users (name,email, pwd) values (?,?,?)";
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("sss",$name,$email,$pwd);

                // Vérifier si la requête a été correctement préparée
                if (!$stmt) {
                    die("Erreur lors de la préparation de la requête : " . $mysqli->error);
                }
                // Exécuter la requête
                if($stmt->execute()){
                    echo"inscription reussi";
                } else{
                    echo "erreur". $mysqli->error;
                }

                // Fermer la connexion
                $stmt->close();
                $mysqli->close();
            

            }
           
            
            

        ?>
        <form method="Post"> 
            <div class='log'>
                <div>
                    <label> nom</label> 
                    <input type="text" name="name"/>
                    <br>
                    <label> email</label> 
                    <input type="email" name="email"/>
                    <br>
                    <label> mots de passe </label>
                    <input type="password" name="pwd"/>
                </div>
            </div>
            <input type="submit" value="crée un compte"/>
        </form>
        <div>
            <?php
                // vérification de la recupération des donnée soumis 
                 if(!empty($_POST["name"])) {
                    echo $_POST["name"];
                    echo '<br>';
                 }
                if(!empty($_POST["email"])) {
                    echo $_POST["email"];
                    echo '<br>';
                }
                if(!empty($_POST["pwd"])) {
                    echo $_POST["pwd"];
                    echo '<br>';
                }
                
            ?>
            
        </div>
    </body>
</html>
