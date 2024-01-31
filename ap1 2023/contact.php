<html>
<head>
  <link href="style.css" media="all" rel="stylesheet" type="text/css"/>
  <style>
    body {
      background-color: #fffff0;
    }
  </style>
</head>
<body>

<ul class="nav">
    <li><a href="accueil.php">Accueil</a></li>
    <li><a href="perso.php">Profil</a></li>
    <li><a href="cr.php">Compte rendus</a></li>
    <li><a href="ccr.php">Nouveau compte-rendu</a></li>
    <li><a href="contact.php">Contacter</a></li>

    </ul>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "ap1 2023";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("La connexion à la base de données a échoué : " . $conn->connect_error);
}
$sql = "SELECT * FROM utilisateur WHERE type = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<h1>Contact :</h1>";
    echo "<table border='1'>";
    echo "<tr><th>Nom</th><th>Prénom</th><th>Email</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["nom"] . "</td>";
        echo "<td>" . $row["prenom"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucun professeur trouvé.";
}
$conn->close();
?>

