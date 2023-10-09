<?php
session_start();
$query = "SELECT* FROM utilisateurs WHERE id = $id_utilisateur";
?>

<html>
<head> <link href="style.css" media="all" rel="stylesheet" type="text/css"/> </head>
<body> </html>
<?php
include '_conf.php';
if ($_SESSION["type"] ==1) //si connexion en prof
  {
    ?>
    <html>
    <ul class="nav">
    <li><a href="accueil.php">Accueil</a></li>
    <li><a href="perso.php">Profil</a></li>
    <li><a href="cr.php">Compte rendus</a></li>
    <li><a href="membres.php">Membres</a></li>
    </ul> </html> <?php
    { 
      if($connexion = mysqli_connect($serveurBDD,$userBDD,$mdpBDD,$nomBDD)){
        $id=$_SESSION["id"];
      $requete="Select * from utilisateur";
      $resultat = mysqli_query($connexion, $requete);
   
       while($donnees = mysqli_fetch_assoc($resultat))
    echo $donnees['nom']."-";
    echo $donnees['age']."-";
    echo $donnees['prenom']."-";
    echo $donnees['telephone']."-";
    echo $donnees['mail']."-";
  }
}}
else
  {
    ?>
    <html>
    <ul class="nav">
    <li><a href="accueil.php">Accueil</a></li>
    <li><a href="perso.php">Profil</a></li>
    <li><a href="cr.php">Compte rendus</a></li>
    <li><a href="ccr.php">Nouveau compte-rendu</a></li>
    <li><a href="contact.php">Contacter</a></li>
    </ul> </html> <?php
   $requete="SELECT CR.* FROM CR,UTILISATEUR WHERE UTILISATEUR.num = CR.num_utilisateur AND UTILISATEUR.num=$_SESSION[id]";
   $resultat = mysqli_query($connexion, $requete);

    while($donnees = mysqli_fetch_assoc($resultat))
    {
      echo $donnees['id']."-";
      echo $donnees['login']."-";
      echo $donnees['prenom']."-";
      echo $donnees['Age']."-";
      echo $donnees['Classe']."-";
    }
  }
?>
TODO : AFFICHER LE PROFIL UTILISATEUR