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

// Sélectionner les noms des utilisateurs depuis la table "utilisateurs"
$query = "SELECT nom FROM utilisateur WHERE num <> 1";
$resultat = mysqli_query($connexion, $query);

// Vérifier si la requête a réussi
if (!$resultat) {
    die("La requête a échoué : " . mysqli_error($connexion));
}

// Afficher les noms des utilisateurs
echo "<h1>Noms des utilisateurs :</h1>";
echo "<ul>";

while ($row = mysqli_fetch_assoc($resultat)) {
    echo "<li>" . $row['nom'] . "</li>";
}

echo "</ul>";

// Fermer la connexion à la base de données
mysqli_close($connexion);
?>
