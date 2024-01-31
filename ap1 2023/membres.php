<html>
<head>
  <link href="style.css" media="all" rel="stylesheet" type="text/css"/>
  <ul class="nav">
          <li><a href="accueil.php">Accueil</a></li>
          <li><a href="perso.php">Profil</a></li>
          <li><a href="membres.php">Membres</a></li>
          <li><a href="compte rendu.php">Compte rendu</a></li>
          <li><a href="eleve.php">Eleve</a></li>
          </ul> 
  <style>
    body {
      background-color: #fffff0;
    }
    table {
      border-collapse: collapse;
      width: 50%;
      margin: 20px;
    }
    table, th, td {
      border: 1px solid black;
    }
    th, td {
      padding: 10px;
      text-align: left;
    }
  </style>
</head>
<body>
<?php

$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "ap1 2023";

$connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

$query = "SELECT nom, prenom, email FROM utilisateur WHERE num <> 1";
$resultat = mysqli_query($connexion, $query);

if (!$resultat) {
    die("La requête a échoué : " . mysqli_error($connexion));
}

echo "<h1>Noms des utilisateurs :</h1>";
echo "<table>";
echo "<tr><th>Nom</th><th>Prénom</th></tr>";

while ($row = mysqli_fetch_assoc($resultat)) {
    echo "<tr><td>" . $row['nom'] . "</td><td>" . $row['prenom'] . "</td></tr>";
}

echo "</table>";

mysqli_close($connexion);
?>
</body>
</html>
