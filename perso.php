<?php
session_start();
?>

<html>
<head> <link href="style.css" media="all" rel="stylesheet" type="text/css"/> </head>
<body> 





</html>
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
    <li><a href="vu.php">Vu</a></li>
    </ul> </html> <?php

if ($connexion = mysqli_connect($serveurBDD, $userBDD, $mdpBDD, $nomBDD)) {
  $id = $_SESSION["id"];
  $requete = "SELECT * FROM UTILISATEUR ";
  $resultat = mysqli_query($connexion, $requete);
  while ($donnees = mysqli_fetch_assoc($resultat)) {
  
    //lien avec le nom des eleve pour voir les coordonnes le lien est et afficheperso.php
    echo "nom: <a href='afficheperso.php?nom=" . $donnees['nom'] . "'>" . $donnees['nom'] . "</a><br>";
    
  
    }
  
  }
  }
else
  {
    ?>
    <html>
    <ul class="nav">
    <li><a href="accueil.php">Accueil</a></li>
    <li><a href="perso.php">Profil</a></li>
    <li><a href="cr.php">Compte rendus</a></li>
    <li><a href="ccr.php">Nouveau compte-rendu</a></li>
    </ul>
    
    </html> 
    
    <?php


if ($connexion = mysqli_connect($serveurBDD, $userBDD, $mdpBDD, $nomBDD)) {
$id = $_SESSION["id"];
$requete = "SELECT * FROM UTILISATEUR where UTILISATEUR.num=$_SESSION[id]";
$resultat = mysqli_query($connexion, $requete);
while ($donnees = mysqli_fetch_assoc($resultat)) {

  $num= $donnees['num'];
  $nom= $donnees['nom'];
  $prenom= $donnees['prenom'];
  $tel= $donnees['tel'];
  $login= $donnees['login'];
  $type= $donnees['type'];
  $email= $donnees['email'];
  $option= $donnees['option'];
  $num_stage= $donnees['num_stage'];



  }

  //recupere les input de chaque colonne a mofi
  if(isset($_POST['submit'])){
    $newnom = addslashes($_POST['nom']);
    $newprenom = addslashes($_POST['prenom']);
    $newtel = addslashes($_POST['tel']);
    $newlogin= addslashes($_POST['login']);
    $newtype = addslashes($_POST['type']);
    $newemail = addslashes($_POST['email']);
    $newoption = addslashes($_POST['option']);
    $requete = "UPDATE UTILISATEUR SET nom = '$newnom', prenom = '$newprenom', tel = '$newtel', login = '$newlogin', type = '$newtype', email = '$newemail', option = '$newoption'WHERE UTILISATEUR.num = $num";

    if(mysqli_query($connexion, $requete)) {
      echo "profil modifié avec succès.";
      header("Location: perso.php ");
    
  } else {
      echo "Erreur : " . mysqli_error($connexion);
  }

    }
  }

?>
  <html>
  

    <FORM method="post" action="perso.php">
    <div> nom : <input type="text" name="nom" value="<?php echo $nom; ?>"> <br>
    <div> prénom : <input type="text" name="prenom" value="<?php echo $prenom; ?>"> <br>
        <div> tel : <input type="text" name="tel" value="<?php echo $tel; ?>"> <br>
        <div> login : <input type="text" name="login" value="<?php echo $login; ?>"> <br>
        <div> type : <input type="text" name="type" value="<?php echo $type; ?>"> <br>
        <div> email : <input type="text" name="email" value="<?php echo $email; ?>"> <br>
        <div> option : <input type="text" name="option" value="<?php echo $option; ?>"> <br>

    </div>
    <br>

</FORM>
    
    </html> 
    <?php

}

    ?>



