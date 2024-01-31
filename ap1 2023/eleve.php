<?php
session_start();
include '_conf.php';

if ($_SESSION["type"] == 1) {
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["create_student"])) {
        // Récupérer les données du formulaire
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $tel = $_POST['tel'];
        $motdepasse = $_POST['motdepasse'];

        // Valider les données si nécessaire

        // Connexion à la base de données
        $connexion = mysqli_connect($serveurBDD, $userBDD, $mdpBDD, $nomBDD);

        // Préparer la requête SQL pour insérer un nouvel élève
        $requete = "INSERT INTO UTILISATEUR (nom, prenom, tel, motdepasse, type) VALUES ('$nom', '$prenom', '$tel', '$motdepasse', 0)"; // Supposons que le type 0 représente un élève

        // Exécuter la requête
        if (mysqli_query($connexion, $requete)) {
            echo "Nouvel élève créé avec succès.";
        } else {
            echo "Erreur lors de la création de l'élève : " . mysqli_error($connexion);
        }

        // Fermer la connexion
        mysqli_close($connexion);
    }
}
?>
<ul class="nav">
          <li><a href="accueil.php">Accueil</a></li>
          <li><a href="perso.php">Profil</a></li>
          <li><a href="membres.php">Membres</a></li>
          <li><a href="compte rendu.php">Compte rendu</a></li>
          <li><a href="eleve.php">Eleve</a></li>
          </ul> 

<!DOCTYPE html>
<html lang="en">
<head>
  <link href="style.css" media="all" rel="stylesheet" type="text/css"/>
  <style>
    body {
      background-color: #fffff0;
    }
  </style>
</head>
<body>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Création d'élève</title>
</head>
<body>

<?php
if ($_SESSION["type"] == 1) {
    ?>

    <h2>Création d'élève</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" required><br>

        <label for="tel">Téléphone :</label>
        <input type="tel" name="tel" required><br>

        <label for="motdepasse">Mot de passe :</label>
        <input type="password" name="motdepasse" required><br>

        <input type="submit" name="create_student" value="Créer l'élève">
    </form>
<?php
}
?>

</body>
</html>
