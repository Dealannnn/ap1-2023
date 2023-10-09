<?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "ap1 2023";

$connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérifier la connexion
if (!$connexion) {
    die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Sélectionner toutes les colonnes de la table "cr"
$query = "SELECT num, date, description, vu, datetime, num_utilisateur FROM cr";
$resultat = mysqli_query($connexion, $query);

// Vérifier si la requête a réussi
if (!$resultat) {
    die("La requête a échoué : " . mysqli_error($connexion));
}

// Afficher les comptes rendus
echo "<h1>Comptes Rendus :</h1>";
echo "<table border='1'>";
echo "<tr><th>Num</th><th>Date</th><th>Description</th><th>Vu</th><th>Datetime</th><th>Num Utilisateur</th></tr>";

while ($row = mysqli_fetch_assoc($resultat)) {
    echo "<tr>";
    echo "<td>" . $row['num'] . "</td>";
    echo "<td>" . $row['date'] . "</td>";
    echo "<td>" . $row['description'] . "</td>";
    echo "<td>" . $row['vu'] . "</td>";
    echo "<td>" . $row['datetime'] . "</td>";
    echo "<td>" . $row['num_utilisateur'] . "</td>";
    echo "</tr>";
}

echo "</table>";

// Fermer la connexion à la base de données
mysqli_close($connexion);
?>
