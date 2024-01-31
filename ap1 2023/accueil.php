<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <head>
  <link href="style.css" media="all" rel="stylesheet" type="text/css"/>
    <title>Page d'accueil</title>
    <link href="style.css" media="all" rel="stylesheet" type="text/css"/>
</head>
<body>

<?php
session_start();
include '_conf.php';

if (isset($_POST['envoi'])) {
    $login = htmlspecialchars($_POST['login']);
    $mdp = md5($_POST['mdp']);

    $connexion = mysqli_connect($serveurBDD, $userBDD, $mdpBDD, $nomBDD);
    $requete = "Select * from UTILISATEUR WHERE login = '$login' AND motdepasse= '$mdp'";
    $resultat = mysqli_query($connexion, $requete);
    $trouve = 0;
    while ($donnees = mysqli_fetch_assoc($resultat)) {
        $trouve = 1;
        $type = $donnees['type'];
        $login = $donnees['login'];
        $id = $donnees['num'];
        $_SESSION["id"] = $id;
        $_SESSION["login"] = $login;
        $_SESSION["type"] = $type;
    }

    if ($trouve == 0) {
        echo "Erreur de connexion";
    }
}

if (isset($_SESSION["login"])) {
    echo '<div class="container">';

    if ($_SESSION["type"] == 0) {
        echo '<ul class="nav">
                <li><a href="accueil.php">Accueil</a></li>
                <li><a href="perso.php">Profil</a></li>
                <li><a href="cr.php">Compte rendus</a></li>
                <li><a href="ccr.php">Nouveau compte-rendu</a></li>
                <li><a href="contact.php">Contacter</a></li>
            </ul>';

        echo '<p class="welcome-message">Bienvenue sur le compte élève</p>';
    } else {
        echo '<ul class="nav">
                <li><a href="accueil.php">Accueil</a></li>
                <li><a href="perso.php">Profil</a></li>
                <li><a href="membres.php">Membres</a></li>
                <li><a href="compte rendu.php">Compte rendu</a></li>
                <li><a href="eleve.php">Eleve</a></li>
            </ul>';

        echo '<p class="welcome-message">Vous êtes un professeur</p>';
    }

    echo '<form method="post" action="index.php" class="logout-button">
            <button type="submit" name="deco">DECONNEXION</button>
          </form>';
    echo '</div>';
}
?>

</body>
</html>
