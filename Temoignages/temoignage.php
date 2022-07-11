
<?php include "../Core.php";

	session_start();
	$_SESSION["admin"]=true;
	if (!isset($_SESSION["connect"]))
	{
		$_SESSION["connect"]=false;
	}

	$BDD=connecterBDD();
?>

<!DOCTYPE html>

<html>
	<title> Love Your Cuisine </title>
	<meta charset = "utf8" />
	<link rel="icon" href="Images/logo.png"/>
	<link rel="stylesheet" href="temoignages.css" />
	<script type="text/javascript" src="temoignages.js"> </script>
</html>

<body <?php if (isset($_SESSION["admin"])){echo 'onload="lancement()"';}?>>

	<header role="banner">

	    	<div class="menu">

					<div class="liens" ><a href="../Accueil/Accueil.php">Accueil</a></div>
	        <div class="liens" ><a href="../Recettes/Recettes.php">Nos recettes</a></div>
	        <div class="liens" ><a href="../Cuistos/Cuistos.php">Nos cuistos </a></div>
	        <div class="liens" ><a href="../How/how.php">Comment ça marche ?</a></div>
					<div class="connexion-insciption">
						<div class="inscription" ><a href="../Connexion/insciption.php">Inscription</a></div>
						<div class="compte" ><a href="../Compte/Compte.php">Mon Compte</a></div>
					</div>
					<div class="lien-commande" ><a href="../Commande/Commande.php">Commander un plat</a></div>
					<div class="spacer">&nbsp;</div>


	    	</div>
			<hr/>
	</header>

</body>
