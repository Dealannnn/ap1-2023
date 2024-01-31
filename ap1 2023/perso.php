<?php
session_start();
?>

<html>
<head>
  <link href="style.css" media="all" rel="stylesheet" type="text/css"/>
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
    .table-section {
      margin-bottom: 20px; /* Ajoute une marge entre les sections du tableau */
    }
  </style>
</head>

<?php
if ($_SESSION["type"] ==0) //si connexion en eleve
  {
 ?>
  
  <ul class="nav">
    <li><a href="accueil.php">Accueil</a></li> 
    <li><a href="perso.php">Profil</a></li>
    <li><a href="cr.php">Compte rendus</a></li>
    <li><a href="ccr.php">Nouveau compte-rendu</a></li>
    <li><a href="contact.php">Contacter</a></li>
    </ul> 
 
<?php 
}
  include '_conf.php';
  if ($_SESSION["type"] == 0) {
    if ($connexion = mysqli_connect($serveurBDD, $userBDD, $mdpBDD, $nomBDD)) {
      $id = $_SESSION["id"];
      $requete = "SELECT * FROM UTILISATEUR WHERE UTILISATEUR.num = $id";
      $resultat = mysqli_query($connexion, $requete);

      if ($donnees = mysqli_fetch_assoc($resultat)) {
        $num = $donnees['num'];
        $nom = $donnees['nom'];
        $prenom = $donnees['prenom'];
        $tel = $donnees['tel'];
        $login = $donnees['login'];
        $type = $donnees['type'];
        $email = $donnees['email'];
        $option = $donnees['option'];
        $num_stage = $donnees['num_stage'];

        echo "<table class='table-section'>";
        echo "<tr><th>Élève</th><th></th></tr>";
        echo "<tr><td>Nom</td><td>$nom</td></tr>";
        echo "<tr><td>Prénom</td><td>$prenom</td></tr>";
        echo "<tr><td>Téléphone</td><td>$tel</td></tr>";
        echo "<tr><td>Login</td><td>$login</td></tr>";
        echo "<tr><td>Type</td><td>$type</td></tr>";
        echo "<tr><td>Email</td><td>$email</td></tr>";
        echo "<tr><td>Option</td><td>$option</td></tr>";
        echo "</table>";

        if ($num_stage) {
          $stage_requete = "SELECT * FROM stage WHERE num = $num_stage";
          $stage_resultat = mysqli_query($connexion, $stage_requete);

          if ($stage_donnees = mysqli_fetch_assoc($stage_resultat)) {
            $stage_nom = $stage_donnees['nom'];
            $stage_adresse = $stage_donnees['adresse'];
            $stage_CP = $stage_donnees['CP'];
            $stage_ville = $stage_donnees['ville'];
            $stage_tel = $stage_donnees['tel'];
            $libelleStage = $stage_donnees['libelleStage'];
            $stage_email = $stage_donnees['email'];
            $num_tuteur = $stage_donnees['num_tuteur'];

            echo "<table class='table-section'>";
            echo "<tr><th>Stage</th><th></th></tr>";
            echo "<tr><td>Nom du stage</td><td>$stage_nom</td></tr>";
            echo "<tr><td>Adresse</td><td>$stage_adresse</td></tr>";
            echo "<tr><td>Code Postal</td><td>$stage_CP</td></tr>";
            echo "<tr><td>Ville</td><td>$stage_ville</td></tr>";
            echo "<tr><td>Téléphone du stage</td><td>$stage_tel</td></tr>";
            echo "<tr><td>Libellé du stage</td><td>$libelleStage</td></tr>";
            echo "<tr><td>Email du stage</td><td>$stage_email</td></tr>";
            echo "</table>";

            $tuteur_requete = "SELECT * FROM TUTEUR WHERE num = $num_tuteur";
            $tuteur_resultat = mysqli_query($connexion, $tuteur_requete);

            if ($tuteur_donnees = mysqli_fetch_assoc($tuteur_resultat)) {
              $tuteur_num = $tuteur_donnees['num'];
              $tuteur_prenom = $tuteur_donnees['prenom'];
              $tuteur_tel = $tuteur_donnees['tel'];
              $tuteur_email = $tuteur_donnees['email'];

              echo "<table class='table-section'>";
              echo "<tr><th>Tuteur</th><th></th></tr>";
              echo "<tr><td>Numéro du tuteur</td><td>$tuteur_num</td></tr>";
              echo "<tr><td>Prénom du tuteur</td><td>$tuteur_prenom</td></tr>";
              echo "<tr><td>Téléphone du tuteur</td><td>$tuteur_tel</td></tr>";
              echo "<tr><td>Email du tuteur</td><td>$tuteur_email</td></tr>";
              echo "</table>";
            }
          }
        }
      }
    }
  }
  ?>
</body>
</html>
