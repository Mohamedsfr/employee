<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="employee.css">
    
</head>
<body>

    <?php include "header.php" ?>
    
    <!-- Main content -->
    <div class="main-content">
        <div class="container-fluid">
            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">New Employee</h3>
                        </div>
                        <div class="card-body">
                        
                        <div class="container mt-5">
        <h2>Ajouter un nouvel employé</h2>
        <form action="employee-new.php" method="post">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom:</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="telephone" class="form-label">Telephone:</label>
                <input type="tel" class="form-control" id="telephone" name="telephone" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter l'employé</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Supposons que l'ID du salon est stocké dans une session ou fixé ici
        $idsalon = 4;  // Modifier cette valeur selon la logique de votre application

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $telephone = $_POST['telephone'];
        $password = $_POST['password'];  // Pensez à sécuriser les mots de passe avec password_hash()

        // Connexion à la base de données
        $conn = new mysqli("localhost", "root", "", "salon");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insertion des données dans la table employe
        $sql = "INSERT INTO employe (idsalon, nom, prenom, email,telephone, password) VALUES ('$idsalon', '$nom', '$prenom', '$email','$telephone', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "Nouvel employé ajouté avec succès";
        } else {
            echo "Erreur : " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
