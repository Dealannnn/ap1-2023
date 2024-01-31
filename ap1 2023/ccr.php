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
  <form method="post" action="cr.php">
    <div>
      <h1>Créer un compte rendu</h1>
    </div>
    <br>
    <div>
      Date <input type="date" name="date" required>
    </div>
    <div>
      Contenu <textarea name="contenu" rows="10" cols="40"></textarea>
    </div>
    <br>
    <div>
      <button type="submit" name="update">Confirmer</button>
    </div>
  </form>

</body>
</html>
