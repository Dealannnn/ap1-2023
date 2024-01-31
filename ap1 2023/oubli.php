<html>
<head>
</head>
<body>

<?php 

function CreatePass($long_pass)
{
    $consonnes = "bcdfghjklmnpqrstvwxz";
    $voyelles = "aeiouy";
    $mdp='';
    for ($i=0; $i < $long_pass; $i++)
    {
    if (($i % 2) == 0)
    {
    $mdp = $mdp.substr ($voyelles, rand(0,strlen($voyelles)-1), 1);
    }
    else
    {
    $mdp = $mdp.substr ($consonnes, rand(0,strlen($consonnes)-1), 1);
    }
    }
return $mdp;
}


if (isset($_POST['email']))
{
     $lemail=$_POST['email'];
     echo "le formulaire a été envoyé avec comme email la valeur :".$lemail;
     include "_conf.php";
    if($connexion=mysqli_connect($serveurBDD,$userBDD,$mdpBDD,$nomBDD))
    {
	    echo "<br>connexion OK<br>";
        $requete="Select * from utilisateur WHERE email='$lemail'";
        $resultat = mysqli_query($connexion, $requete);
        $login=0;
	        while($donnees = mysqli_fetch_assoc($resultat))
	        {
		        $login =$donnees['num']; //mettre le nom du champ dans la table
		        $mdp =$donnees['motdepasse'];	
	        }
    if ($login==0)
    {
        echo "<br> erreur l'email n'est pas présent dans la BDD <br>";
    }
    else {

    $motdepasse = CreatePass(8); /*mot de passe de 8 caracteres */
    $motdepassemd5=md5($motdepasse);
    $requete="UPDATE utilisateur SET motdepasse='$motdepassemd5' WHERE id=$login ";
    if (!mysqli_query($connexion,$requete)) 
    {
          echo "<br>Erreur : ".mysqli_error($connexion)."<br>";
    }
           
	     echo "<br> mot de passe = $motdepasse";
     $to      = $lemail;
     $subject = 'Mot de passe perdu';
     $message = 'Bonjour ! voici votre mot de passe : '.$motdepasse;


     mail($to, $subject, $message);
    }



    }
    else {
	    echo "erreur de connexion";
    }

}
else
{
    ?>
    <br>
    <form action="oubli.php" method="post">
    email : <input type="text" name="email"><br>

    <input type="submit" value="Confirmer" name="bouton">
    </form>
    <?php
}
?>


</body>
</html>