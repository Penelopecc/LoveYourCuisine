
<!-- Dans la console :  php -S 127.0.0.1:8008
     Sous linux taper dans le navigateur http://127.0.0.1:8008/Accueil/Accueil.php
     Hote sous linux : mysql.etude.cergy.eisti.fr
-->


<?php include "../Core.php";

	session_start();

	if (!isset($_SESSION["admin"]))
	{
		$_SESSION["admin"]="false";
	}


	$BDD=connecterBDD();
?>

<!DOCTYPE html>

<html>

	<head>

		<title> Love Your Cuisine </title>
		<meta charset = "utf8" />
		<link rel="icon" href="../Images/logo.png"/>
		<link rel="stylesheet" href="Accueil.css" />
	  <script type="text/javascript" src="Accueil.js"> </script>
		<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lora:700i" rel="stylesheet">

	</head>

<!-- Utile de mettre le isset ?   -->
  <body
	<?php
		if (isset($_SESSION["idutilisateur"]))
		{
      if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
      {
        echo 'onload="lancementAdmin()"';
      }
      elseif (isset($_SESSION["admin"]) && $_SESSION["admin"]=="false")
      {
        echo 'onload="lancementconnecte()"';
      }
		}
		else
		{
			echo 'onload="lancement()"';
		}
		?>
		>

<header role="banner">

    	<div class="menu">
				<a href="../Accueil/Accueil.php"><img id='logo' width="80px" src="../Images/logo.png"/></a>
        <div class="liens" ><a href="../Recettes/recette.php">Nos recettes</a></div>
        <div class="liens" ><a href="../Cuistos/Cuistos.php">Nos cuistos </a></div>
        <div class="liens" ><a href="../How/how.php">Comment ça marche ?</a></div>
				<div class="connexion-insciption">
					<div id="inscription" class="deconnecte" onmouseover='style.backgroundColor = "rgba(122, 143, 90, 0.3)"'  onmouseout='style.backgroundColor = "#f5f5dc"' style="visibility:visible;"><a href="../Inscription/inscription.php">Inscription</a></div>
					<div id="compte" class="connecte" onclick="document.getElementById('id01').style.display='block'" onmouseover='style.backgroundColor = "rgba(122, 143, 90, 0.3)"'  onmouseout='style.backgroundColor = "#f5f5dc"'>Mon Compte</div>
					<div id="medeconnecte" class="connecte"  style="visibility:hidden; display:none; margin-left : 5px; border-radius: 40px;" onmouseover='style.backgroundColor = "rgba(122, 143, 90, 0.3)"'  onmouseout='style.backgroundColor = "#f5f5dc"'><a href="../deconnexion.php">Déconnexion</a></div>
				</div>
				<div class="lien-commande" onmouseover='style.backgroundColor = "rgba(122, 143, 90, 0.3)"'  onmouseout='style.backgroundColor = "#f5f5dc"'><a href="../Plats/plats.php">Commander un plat</a></div>
				<div class="spacer">&nbsp;</div>


    	</div>
		<hr/>
</header>

<main>

<!-- POP-UP Connexion -->

<div id="id01" class="modal">

  <form class="modal-content animate" action="../seconnecter.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close2" title="Fermer">&times;</span>
    </div>

    <div class="container">
      <label for="uname"><b>Identifiant</b></label>
      <input type="text" placeholder="ex: GrandChef" name="identifiant" id="identifiant" required>

      <label for="psw"><b>Mot de passe</b></label>
      <input type="password" placeholder="ex: lyc123" name="mdp" required>

      <button type="submit" class="btn">Se connecter</button>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Se souvenir de moi
      </label>
    </div>

  </form>
</div>


<!--                           ACCROCHE                        -->

<!-- Image de l'accroche  -->

<div id="accroche">

		<?php
			$imageAccroche= 'SELECT image FROM accroche';
			$result=mysqli_query($BDD,$imageAccroche);
			$image=mysqli_fetch_assoc($result);
			echo "<div id='accroche' style='background-image: url(\"".$image['image']."\")'";
			if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onmouseover='bouton(this)' onmouseout='bouton(this)'";} echo ">";
		?>
	<form id='accroche-modify' method="POST" action='Accueil.php' enctype="multipart/form-data">
	<?php   if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
					{
						echo "<img src='Images/modify.png' width=45px  class='bouton-invisible' onclick='modifier_image(this)'/>";
						echo "<input type='file' name='image' class='bouton-invisible'/></br>";
						echo "<input type='submit' value='Envoyer' class='bouton-invisible' style='clear : both;' onsubmit='window.location.reload()'/>";
						if (isset($_FILES['image']))
						{
							$images=$_FILES['image'];
							if(isset($images) AND $images['error']==0)
							{
								$chemin=pathinfo($images['name']);
								$extension_upload=$chemin['extension'];
								$extensions_autorisees= array('jpg','jpeg','gif','png');
								if (in_array($extension_upload, $extensions_autorisees))
								 {
									$newPic='Images/accroche.'.$extension_upload;
									move_uploaded_file($images['tmp_name'], $newPic);
								 }
								$requete ="UPDATE accroche SET image='".$newPic."'";
								$changement=mysqli_query($BDD,$requete);
								header('Refresh: URL=Accueil.php');
						}
						else
						{
							$images=null;
						}

					}
				}
	?>
	</form>

<!-- Titre de l'accroche -->

	<div id="accroche-titre" <?php if (isset($_SESSION["idutilisateur"]))
	{if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onmouseover='bouton(this)' onmouseout='bouton(this)' ";} }?>>

		<form id='accroche-titre-modify'>
			<span id="accroche-zone-titre">
				<?php
				if (isset($_SESSION["idutilisateur"]))
				{if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
				  {
					 echo "<textarea class='bouton-invisible' name='accroche' style='height:99px;'>Taper votre nouveau titre. Ecrire '</br>' pour sauter à la ligne.</textarea>";
					 echo "<input type='button' value='Envoyer' class='bouton-invisible' style='clear : both;' onclick='changer_titre(this)'/>";
					 echo "<img src='Images/modify.png' width=30px  id='modify' class='bouton-invisible' onclick='modifier_texte(this)'/>" ;
				 }}
					$titreAccroche = "SELECT titre FROM accroche";
					$result=mysqli_query($BDD,$titreAccroche);
					$texte=mysqli_fetch_assoc($result);
					echo $texte["titre"];
				?>
		 </span>
		</form>
	</div>

	<br/>

		<img id="accroche-logo"  src="../Images/logo.png"/>


	<br/>
</div>
</div>



<!-- PARTIE "explication" -->


<div class="explication">

	<div class="explication-titre" <?php if (isset($_SESSION["idutilisateur"]))
	{ if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onmouseover='bouton(this)' onmouseout='bouton(this)' ";}} ?>>

		<form id="explication-titre-modify">
			<?php
			if (isset($_SESSION["idutilisateur"]))
			{
				if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
				{
					echo "<textarea class='bouton-invisible' name='explication' style='height:99px;'>Taper votre nouveau titre. Ecrire '</br>' pour sauter à la ligne.</textarea>";
					echo "<input type='button' value='Envoyer' class='bouton-invisible' style='clear : both;' onclick='changer_titre(this)'/>";
					echo "<img src='Images/modify.png' width=30px  id='modify' class='bouton-invisible' onclick='modifier_texte(this)'/>" ;
				}
			}
			?>
		</form>

		<span id="explication-titre-zone-texte" >
		<?php
			$titreExplication = "SELECT titre FROM explication";
			$result=mysqli_query($BDD,$titreExplication);
			$titre=mysqli_fetch_assoc($result);
			echo $titre["titre"];
		?>
	</span>
	</div>

	<br/>

	<div id="explication-texte" <?php if (isset($_SESSION["idutilisateur"]))
	{if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onmouseover='bouton(this)' onmouseout='bouton(this)' ";}} ?>>
		<form id="explication-texte-modify">
			<?php
			if (isset($_SESSION["idutilisateur"]))
			{if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
				{
		  		echo "<textarea class='bouton-invisible' name='explication' style='height:99px;'>Taper votre nouveau titre. Ecrire '</br>' pour sauter à la ligne.</textarea>";
					echo "<input type='button' value='Envoyer' class='bouton-invisible' style='clear : both;' onclick='changer_texte(this)'/>";
					echo "<img src='Images/modify.png' width=30px  id='modify' class='bouton-invisible' onclick='modifier_texte(this)'/>" ;
				}}
			?>
		</form>

		<span class="explication-texte-zone-modify">
			<?php
				$texteExplication = "SELECT texte FROM explication";
				$result=mysqli_query($BDD,$texteExplication);
				$texte=mysqli_fetch_assoc($result);
				echo $texte["texte"];
	   	?>
	 </span>
	</div>
</div>



<!--                        CARACTERISTIQUES                           -->


<div class="caracteristiques">

<!-- Titre -->
	<div class="close" style="visibility:hidden;">&#x2716;</div>
	<div class="caracteristiques-titre" <?php if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onmouseover='bouton(this)' onmouseout='bouton(this)' ";} ?>>

		<form id="caracteristiques-titre-modify">
			<?php
			if (isset($_SESSION["idutilisateur"]))
			{
				if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
				{
					echo "<textarea class='bouton-invisible' name='caracteristiques' style='height:99px; width=100px;'>Taper votre nouveau titre. Ecrire '</br>' pour sauter à la ligne.</textarea>";
					echo "<input type='button' value='Envoyer' class='bouton-invisible' style='clear : both;' onclick='changer_titre(this)'/>";
					echo "<img src='Images/modify.png' width=30px  id='modify' class='bouton-invisible' onclick='modifier_texte(this)'/>" ;
				}
			}
			?>
		</form>

		<span id="caracteristiques-titre-zone-texte" >
		<?php
			$titreCaracteristique = "SELECT titre FROM caracteristiques WHERE idCaracteristiques=1";
			$result=mysqli_query($BDD,$titreCaracteristique);
			$titre=mysqli_fetch_assoc($result);
			echo $titre["titre"];
		?>
	</span>
	</div>

<!-- 1ère caractéristique -->

	<div class="caracteristiques-block">
	 <div class="close" style="visibility:hidden;">&#x2716;</div>
   <img class="caracteristiques-image" src="Images/pratique.png">
   <div class="caracteristiques-container">
     <h4><b>Pratique</b></h4>
     <p>Texte</p>
   </div>
 </div>


 <div class="caracteristiques-block">
	<div class="close" style="visibility:hidden;">&#x2716;</div>
	<img class="caracteristiques-image" src="Images/innovant.png">
	<div class="caracteristiques-container">
		<h4><b>Innovant</b></h4>
		<p>Texte</p>
	</div>
</div>


<div class="caracteristiques-block">
 <div class="close" style="visibility:hidden;">&#x2716;</div>
 <img class="caracteristiques-image" src="Images/convivial.png">
 <div class="caracteristiques-container">
	 <h4><b>Convivial</b></h4>
	 <p>Texte</p>
 </div>
</div>


<div class="caracteristiques-block">
 <div class="close" style="visibility:hidden;">&#x2716;</div>
 <img class="caracteristiques-image" src="Images/top.png">
 <div class="caracteristiques-container">
	 <h4><b>Top Qualité</b></h4>
	 <p>Texte</p>
 </div>
</div>


<div class="caracteristiques-block">
 <div class="close" style="visibility:hidden;">&#x2716;</div>
 <img class="caracteristiques-image" src="Images/prix.png">
 <div class="caracteristiques-container">
	 <h4><b>Meilleur Prix</b></h4>
	 <p>Texte</p>
 </div>
</div>


</div>

<div id="centrer">
<a href="../Recettes/recette.php" id="decouvre"> Je découvre les recettes</a>
</div>


<!-- FAIRE A MANGER -->


<div class="faire-manger">

<!-- Titre  -->

	<div class="faire-manger-titre" <?php if (isset($_SESSION["idutilisateur"]))
	{ if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onmouseover='bouton(this)' onmouseout='bouton(this)' ";} }?>>
		<form id="faire-manger-titre-modify">
			<?php
			if (isset($_SESSION["idutilisateur"]))
			{if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
				{
					echo "<textarea class='bouton-invisible' name='fairemanger' style='height:99px;'>Taper votre nouveau titre. Ecrire '</br>' pour sauter à la ligne.</textarea>";
					echo "<input type='button' value='Envoyer' class='bouton-invisible' style='clear : both;' onclick='changer_titre(this)'/>";
					echo "<img src='Images/modify.png' width=30px  id='modify' class='bouton-invisible' onclick='modifier_texte(this)'/>" ;
				}}
			?>
		</form>

		<span id="faire-manger-titre-zone-texte" >
		<?php
			$titreExplication = "SELECT titre FROM fairemanger";
			$result=mysqli_query($BDD,$titreExplication);
			$titre=mysqli_fetch_assoc($result);
			echo $titre["titre"];
		?>
		</span>
	</div>

	<br/>

<!-- Sous-titre  -->

	<div class="faire-manger-soustitre" <?php if (isset($_SESSION["idutilisateur"]))
	{if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onmouseover='bouton(this)' onmouseout='bouton(this)' ";}} ?>>
		<form id="faire-manger-soustitre-modify">
			<?php
				 if (isset($_SESSION["idutilisateur"]))
				{if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
				{
					echo "<textarea id='1' class='bouton-invisible' name='fairemanger' style='height:99px;'>Taper votre nouveau sous-titre. Ecrire '</br>' pour sauter à la ligne.</textarea>";
					echo "<input type='button' value='Envoyer' class='bouton-invisible' style='clear : both;' onclick='changer_descriptif(this)'/>";
					echo "<img src='Images/modify.png' width=30px  id='modify' class='bouton-invisible' onclick='modifier_texte(this)'/>" ;
				}
			}
			?>
		</form>
		<span id="faire-manger-soustitre-zone-texte" >
		<?php
			$texteFairemanger = "SELECT texte FROM fairemanger";
			$result=mysqli_query($BDD,$texteFairemanger);
			$texte=mysqli_fetch_assoc($result);
			echo $texte["texte"];
		?>
		</span>
	</div>


<!-- Faire à manger blokcs  -->
	<div id="faire-manger-blocks">

<!-- Bloc 1 -->
		<div class="faire-manger-block">
			<div class="faire-manger-image">
			<!-- Image   -->
			<?php
				$requete= 'SELECT image FROM fairemanger WHERE id=2';
				$result=mysqli_query($BDD,$requete);
				$imageFaireManger1=mysqli_fetch_assoc($result);
				echo "<img class='image'  src=\"".$imageFaireManger1["image"]."\"";
				if (isset($_SESSION["idutilisateur"]))
				{if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onclick='boutonImage(this)'";}} echo "/>";
			?>
			<form  method="POST" action='Accueil.php' enctype="multipart/form-data">
			<?php   if (isset($_SESSION["idutilisateur"]))
			{if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
						{
						  echo "<input type='file' name='imageFaireManger1' class='bouton-invisible'/></br>";
							echo "<input type='submit' value='Envoyer' class='bouton-invisible' style='clear : both;'/>";
							if (isset($_FILES['image']))
							{
								$imagesFaireManger1=$_FILES['image'];
								if(isset($imagesFaireManger1) AND $imagesFaireManger1['error']==0)
								{
									$chemin=pathinfo($imagesFaireManger1['name']);
									$extension_upload=$chemin['extension'];
									$extensions_autorisees= array('jpg','jpeg','gif','png');
									if (in_array($extension_upload, $extensions_autorisees))
									 {
										$newPic='Images/commande.'.$extension_upload;
										move_uploaded_file($imagesFaireManger1['tmp_name'], $newPic);
									 }
									$requete ="UPDATE fairemanger SET image='".$newPic."' WHERE id=2";
									$changement=mysqli_query($BDD,$requete);

								}
							else
							{
								$imagesFaireManger1=null;
							}
						}
						}
					}
			?>
			</form>
		</div>

<!-- Texte -->

						<div class="faire-manger-texte" <?php if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onmouseover='bouton(this)' onmouseout='bouton(this)' ";} ?>>
							<form class="faire-manger-texte-modify">
								<?php
									if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
									{
							  		echo "<textarea id='2' class='bouton-invisible' name='fairemanger' style='height:99px;'>Taper votre nouveau texte. Ecrire '</br>' pour sauter à la ligne.</textarea>";
										echo "<input type='button' value='Envoyer' class='bouton-invisible' style='clear : both;' onclick='changer_descriptif(this)'/>";
										echo "<img src='Images/modify.png' width=30px  id='modify' class='bouton-invisible' onclick='modifier_texte(this)'/>" ;
									}
								?>
							</form>

							<span class="faire-manger-texte-zone-modify">
								<?php
									$texte = "SELECT texte FROM fairemanger WHERE id=2";
									$result=mysqli_query($BDD,$texte);
									$texte=mysqli_fetch_assoc($result);
									echo $texte["texte"];
						   	?>
						 </span>
						</div>
				</div>



<!-- BLoc 2   -->

		<div class="faire-manger-block">

<!-- Image Bloc 2 -->

			<div class="faire-manger-image">
					<?php
				$requete= 'SELECT image FROM fairemanger WHERE id=3';
				$result=mysqli_query($BDD,$requete);
				$imageFaireManger1=mysqli_fetch_assoc($result);
				echo "<img class='image'  src=\"".$imageFaireManger1["image"]."\"";
				if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onclick='boutonImage(this)'";} echo "/>";
			?>
			<form  method="POST" action='Accueil.php' enctype="multipart/form-data">
			<?php   if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
						{
						  echo "<input type='file' name='imageFaireManger1' class='bouton-invisible'/></br>";
							echo "<input type='submit' value='Envoyer' class='bouton-invisible' style='clear : both;' onsubmit='window.location.reload()'/>";
							if (isset($_FILES['image']))
							{
								$imagesFaireManger1=$_FILES['image'];
								if(isset($imagesFaireManger1) AND $imagesFaireManger1['error']==0)
								{
									$chemin=pathinfo($imagesFaireManger1['name']);
									$extension_upload=$chemin['extension'];
									$extensions_autorisees= array('jpg','jpeg','gif','png');
									if (in_array($extension_upload, $extensions_autorisees))
									 {
										$newPic='Images/ingredients.'.$extension_upload;
										move_uploaded_file($imagesFaireManger1['tmp_name'], $newPic);
									 }
									$requete ="UPDATE fairemanger SET image='".$newPic."' WHERE id=3";
									$changement=mysqli_query($BDD,$requete);
								}
							else
							{
								$imagesFaireManger1=null;
							}
						}
					}
			?>
			</form>
		</div>

		<!-- Texte  Bloc 2  -->

		<div class="faire-manger-texte" <?php if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onmouseover='bouton(this)' onmouseout='bouton(this)' ";} ?>>
			<form class="faire-manger-texte-modify">
				<?php
					if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
					{
						echo "<textarea id='3' class='bouton-invisible' name='fairemanger' style='height:99px;'>Taper votre nouveau texte. Ecrire '</br>' pour sauter à la ligne.</textarea>";
						echo "<input type='button' value='Envoyer' class='bouton-invisible' style='clear : both;' onclick='changer_descriptif(this)'/>";
						echo "<img src='Images/modify.png' width=30px  id='modify' class='bouton-invisible' onclick='modifier_texte(this)'/>" ;
					}
				?>
			</form>

			<span class="faire-manger-texte-zone-modify">
				<?php
					$texte = "SELECT texte FROM fairemanger WHERE id=3";
					$result=mysqli_query($BDD,$texte);
					$texte=mysqli_fetch_assoc($result);
					echo $texte["texte"];
				?>
		 </span>
		</div>
</div>


<!-- BLoc 3   -->

<!-- Image bloc 3  -->

		<div class="faire-manger-block">

			<div class="faire-manger-image">
					<?php
				$requete= 'SELECT image FROM fairemanger WHERE id=4';
				$result=mysqli_query($BDD,$requete);
				$imageFaireManger1=mysqli_fetch_assoc($result);
				echo "<img class='image'  src=\"".$imageFaireManger1["image"]."\"";
				if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onclick='boutonImage(this)'";} echo "/>";
			?>
			<form  method="POST" action='Accueil.php' enctype="multipart/form-data">
			<?php   if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
						{
							echo "<input type='file' name='imageFaireManger1' class='bouton-invisible'/></br>";
							echo "<input type='submit' value='Envoyer' class='bouton-invisible' style='clear : both;' onsubmit='window.location.reload()'/>";
							if (isset($_FILES['image']))
							{
								$imagesFaireManger1=$_FILES['image'];
								if(isset($imagesFaireManger1) AND $imagesFaireManger1['error']==0)
								{
									$chemin=pathinfo($imagesFaireManger1['name']);
									$extension_upload=$chemin['extension'];
									$extensions_autorisees= array('jpg','jpeg','gif','png');
									if (in_array($extension_upload, $extensions_autorisees))
									 {
										$newPic='Images/plat.'.$extension_upload;
										move_uploaded_file($imagesFaireManger1['tmp_name'], $newPic);
									 }
									$requete ="UPDATE fairemanger SET image='".$newPic."' WHERE id=4";
									$changement=mysqli_query($BDD,$requete);
								}
							else
							{
								$imagesFaireManger1=null;
							}
						}
					}
			?>
			</form>
		</div>


<!-- Texte Bloc 3  -->
<div class="faire-manger-texte" <?php if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onmouseover='bouton(this)' onmouseout='bouton(this)' ";} ?>>
	<form class="faire-manger-texte-modify">
		<?php
			if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
			{
				echo "<textarea id='4' class='bouton-invisible' name='fairemanger' style='height:99px;'>Taper votre nouveau texte. Ecrire '</br>' pour sauter à la ligne.</textarea>";
				echo "<input type='button' value='Envoyer' class='bouton-invisible' style='clear : both;' onclick='changer_descriptif(this)'/>";
				echo "<img src='Images/modify.png' width=30px  id='modify' class='bouton-invisible' onclick='modifier_texte(this)'/>" ;
			}
		?>
	</form>

	<span class="faire-manger-texte-zone-modify">
		<?php
			$texte = "SELECT texte FROM fairemanger WHERE id=4";
			$result=mysqli_query($BDD,$texte);
			$texte=mysqli_fetch_assoc($result);
			echo $texte["texte"];
		?>
 </span>
</div>


</div>
</div>

</div>

<div id="centrer">
	<a href="../Recettes/recette.php" id="decouvre">Je choisis une recette</a>
</div>


</div>




<!--                   PARTAGER SES REPAS                        -->


<div id="partager-ses-repas">
	<div id="partager-ses-repas-titre" <?php if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onmouseover='bouton(this)' onmouseout='bouton(this)' ";} ?>>
	<form id="partager-ses-repas-titre-modify">
    <?php
      if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
      {
        echo "<textarea class='bouton-invisible' name='partager' style='height:99px;'>Taper votre nouveau titre. Ecrire '</br>' pour sauter à la ligne.</textarea>";
        echo "<input type='button' value='Envoyer' class='bouton-invisible' style='clear : both;' onclick='changer_titre(this)'/>";
        echo "<img src='Images/modify.png' width=30px  id='modify' class='bouton-invisible' onclick='modifier_texte(this)'/>" ;
      }
    ?>
  </form>
		<span id="partager-ses-repas-zone-texte" >
	  <?php
	    $titreExplication = "SELECT titre FROM partager";
	    $result=mysqli_query($BDD,$titreExplication);
	    $titre=mysqli_fetch_assoc($result);
	    echo $titre["titre"];
	  ?>
	  </span>
	</div>

<br/>
	<div id="partager-ses-repas-soustitre" <?php if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onmouseover='bouton(this)' onmouseout='bouton(this)' ";} ?>>
	<form id="partager-ses-repas-soustitre-modify">
		<?php
			if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
			{
				echo "<textarea class='bouton-invisible' name='partager' style='height:99px;'>Taper votre nouveau texte. Ecrire '</br>' pour sauter à la ligne.</textarea>";
				echo "<input type='button' value='Envoyer' class='bouton-invisible' style='clear : both;' onclick='changer_texte(this)'/>";
				echo "<img src='Images/modify.png' width=30px  id='modify' class='bouton-invisible' onclick='modifier_texte(this)'/>" ;
			}
		?>
	</form>
		<span id="partager-ses-repas-zone-soustitre" >
		<?php
			$titreExplication = "SELECT texte FROM partager";
			$result=mysqli_query($BDD,$titreExplication);
			$titre=mysqli_fetch_assoc($result);
			echo $titre["texte"];
		?>
		</span>
	</div>

	<br/>


<!-- Etapes partager ses repas -->


	<div id="blocks-partager-ses-repas">

<!-- Bloc 1   -->
		<div class="block-partager-ses-repas">

	<!-- Image Bloc 1   -->

			<div class="partager-repas-image">
			<?php
				$requete= 'SELECT image FROM partager WHERE id=2';
				$result=mysqli_query($BDD,$requete);
				$imagepartager=mysqli_fetch_assoc($result);
				echo "<img class='image'  src=\"".$imagepartager["image"]."\"";
				if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onclick='boutonImage(this)'";} echo "/>";
			?>
			<form  method="POST" action='Accueil.php' enctype="multipart/form-data">
			<?php   if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
						{
							echo "<input type='file' name='imagepartager' class='bouton-invisible'/></br>";
							echo "<input type='submit' value='Envoyer' class='bouton-invisible' style='clear : both;' onsubmit='window.location.reload()'/>";
							if (isset($_FILES['image']))
							{
								$image=$_FILES['image'];
								if(isset($image) AND $image['error']==0)
								{
									$chemin=pathinfo($image['name']);
									$extension_upload=$chemin['extension'];
									$extensions_autorisees= array('jpg','jpeg','gif','png');
									if (in_array($extension_upload, $extensions_autorisees))
									 {
										$newPic='Images/share.'.$extension_upload;
										move_uploaded_file($image['tmp_name'], $newPic);
									 }
									$requete ="UPDATE partager SET image='".$newPic."' WHERE id=2";
									$changement=mysqli_query($BDD,$requete);
								}
							else
							{
								$image=null;
							}
						}
					}
			?>
			</form>
		</div>

<!-- Texte Bloc 1 -->

				<div style="width:350px;" class="partager-repas-texte" <?php if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onmouseover='bouton(this)' onmouseout='bouton(this)' ";} ?>>
					<form class="partager-repas-texte-modify">
						<?php
							if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
							{
								echo "<textarea id='2' class='bouton-invisible' name='partager' style='height:99px;'>Taper votre nouveau texte. Ecrire '</br>' pour sauter à la ligne.</textarea>";
								echo "<input type='button' value='Envoyer' class='bouton-invisible' style='clear : both;' onclick='changer_descriptif(this)'/>";
								echo "<img src='Images/modify.png' width=30px  id='modify' class='bouton-invisible' onclick='modifier_texte(this)'/>" ;
							}
						?>
					</form>

					<span class="partager-repas-texte-zone-modify">
						<?php
							$texte = "SELECT texte FROM partager WHERE id=2";
							$result=mysqli_query($BDD,$texte);
							$texte=mysqli_fetch_assoc($result);
							echo $texte["texte"];
						?>
				 </span>
				</div>
		</div>


<!-- Bloc 2   -->

		<div class="block-partager-ses-repas">

			<!-- Image Bloc 2 -->

		<div class="partager-repas-image">
		<?php
			$requete= 'SELECT image FROM partager WHERE id=3';
			$result=mysqli_query($BDD,$requete);
			$imagepartager=mysqli_fetch_assoc($result);
			echo "<img class='image'  src=\"".$imagepartager["image"]."\"";
			if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onclick='boutonImage(this)'";} echo "/>";
		?>
		<form  method="POST" action='Accueil.php' enctype="multipart/form-data">
		<?php   if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
					{
						echo "<input type='file' name='imagepartager' class='bouton-invisible'/></br>";
						echo "<input type='submit' value='Envoyer' class='bouton-invisible' style='clear : both;' onsubmit='window.location.reload()'/>";
						if (isset($_FILES['image']))
						{
							$image=$_FILES['image'];
							if(isset($image) AND $image['error']==0)
							{
								$chemin=pathinfo($image['name']);
								$extension_upload=$chemin['extension'];
								$extensions_autorisees= array('jpg','jpeg','gif','png');
								if (in_array($extension_upload, $extensions_autorisees))
								 {
									$newPic='Images/share.'.$extension_upload;
									move_uploaded_file($image['tmp_name'], $newPic);
								 }
								$requete ="UPDATE partager SET image='".$newPic."' WHERE id=3";
								$changement=mysqli_query($BDD,$requete);
							}
						else
						{
							$image=null;
						}
					}
				}
		?>
		</form>
	</div>

	<!-- Texte Bloc 2 -->

		<div style="width:350px; " class="partager-repas-texte" <?php if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onmouseover='bouton(this)' onmouseout='bouton(this)' ";} ?>>
			<form class="partager-repas-texte-modify">
				<?php
					if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
					{
						echo "<textarea id='3' class='bouton-invisible' name='partager' style='height:99px;'>Taper votre nouveau texte. Ecrire '</br>' pour sauter à la ligne.</textarea>";
						echo "<input type='button' value='Envoyer' class='bouton-invisible' style='clear : both;' onclick='changer_descriptif(this)'/>";
						echo "<img src='Images/modify.png' width=30px  id='modify' class='bouton-invisible' onclick='modifier_texte(this)'/>" ;
					}
				?>
			</form>

			<span class="partager-repas-texte-zone-modify">
				<?php
					$texte = "SELECT texte FROM partager WHERE id=3";
					$result=mysqli_query($BDD,$texte);
					$texte=mysqli_fetch_assoc($result);
					echo $texte["texte"];
				?>
		 </span>
		</div>
   </div>

<!-- Bloc 3   -->

		<div class="block-partager-ses-repas">

<!-- Image Bloc 3 -->

		<div class="partager-repas-image">
		<?php
			$requete= 'SELECT image FROM partager WHERE id=4';
			$result=mysqli_query($BDD,$requete);
			$imagepartager=mysqli_fetch_assoc($result);
			echo "<img class='image'  src=\"".$imagepartager["image"]."\"";
			if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onclick='boutonImage(this)'";} echo "/>";
		?>
		<form  method="POST" action='Accueil.php' enctype="multipart/form-data">
		<?php   if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
					{
						echo "<input type='file' name='imagepartager' class='bouton-invisible'/></br>";
						echo "<input type='submit' value='Envoyer' class='bouton-invisible' style='clear : both;' onsubmit='window.location.reload()'/>";
						if (isset($_FILES['image']))
						{
							$image=$_FILES['image'];
							if(isset($image) AND $image['error']==0)
							{
								$chemin=pathinfo($image['name']);
								$extension_upload=$chemin['extension'];
								$extensions_autorisees= array('jpg','jpeg','gif','png');
								if (in_array($extension_upload, $extensions_autorisees))
								 {
									$newPic='Images/share.'.$extension_upload;
									move_uploaded_file($image['tmp_name'], $newPic);
								 }
								$requete ="UPDATE partager SET image='".$newPic."' WHERE id=4";
								$changement=mysqli_query($BDD,$requete);
							}
						else
						{
							$image=null;
						}
					}
				}
		?>
		</form>
	</div>

<!-- Texte Bloc 3   -->

	<div class="partager-repas-texte"  style="width:350px; "<?php if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onmouseover='bouton(this)' onmouseout='bouton(this)' ";} ?>>
		<form class="partager-repas-texte-modify">
			<?php
				if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
				{
					echo "<textarea id='4' class='bouton-invisible' name='partager' style='height:99px;'>Taper votre nouveau texte. Ecrire '</br>' pour sauter à la ligne.</textarea>";
					echo "<input type='button' value='Envoyer' class='bouton-invisible' style='clear : both;' onclick='changer_descriptif(this)'/>";
					echo "<img src='Images/modify.png' width=30px  id='modify' class='bouton-invisible' onclick='modifier_texte(this)'/>" ;
				}
			?>
		</form>

		<span  class="partager-repas-texte-zone-modify">
			<?php
				$texte = "SELECT texte FROM partager WHERE id=4";
				$result=mysqli_query($BDD,$texte);
				$texte=mysqli_fetch_assoc($result);
				echo $texte["texte"];
			?>
	 </span>
	</div>
</div>

</div>

<div id="centrer">
<a href="../Recettes/recette.php" id="decouvre">Je partage mes plats</a>
</div>

</div>


<!-- COMMANDER UN PLAT -->


<div id="commander-plat">

<!-- Titre   -->

		<div id="commander-plat-titre" <?php if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onmouseover='bouton(this)' onmouseout='bouton(this)' ";} ?>>
			<form id="commander-plat-titre-modify">
		    <?php
		      if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
		      {
		        echo "<textarea class='bouton-invisible' name='commander' style='height:99px;'>Taper votre nouveau titre. Ecrire '</br>' pour sauter à la ligne.</textarea>";
		        echo "<input type='button' value='Envoyer' class='bouton-invisible' style='clear : both;' onclick='changer_titre(this)'/>";
		        echo "<img src='Images/modify.png' width=30px  id='modify' class='bouton-invisible' onclick='modifier_texte(this)'/>" ;
		      }
		    ?>
		  </form>
			<span id="commander-plat-zone-texte" >
		  <?php
		    $titre = "SELECT titre FROM commander";
		    $result=mysqli_query($BDD,$titre);
		    $titre=mysqli_fetch_assoc($result);
		    echo $titre["titre"];
		  ?>
		  </span>
		</div>

<!-- Sous-titre  -->

<br/>
<div id="commander-plat-soustitre" <?php if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onmouseover='bouton(this)' onmouseout='bouton(this)' ";} ?>>
	<form id="commander-plat-soustitre-modify">
		<?php
			if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
			{
				echo "<textarea class='bouton-invisible' name='commander' style='height:99px;'>Taper votre nouveau sous-titre. Ecrire '</br>' pour sauter à la ligne.</textarea>";
				echo "<input type='button' value='Envoyer' class='bouton-invisible' style='clear : both;' onclick='changer_texte(this)'/>";
				echo "<img src='Images/modify.png' width=30px  id='modify' class='bouton-invisible' onclick='modifier_texte(this)'/>" ;
			}
		?>
	</form>
	<span id="commander-plat-soustitre-zone-texte" >
	<?php
		$texte = "SELECT texte FROM commander";
		$result=mysqli_query($BDD,$texte);
		$texte=mysqli_fetch_assoc($result);
		echo $texte["texte"];
	?>
	</span>
</div>


<!-- Etapes Commander un plat  -->

		<div id="blocks-commander-plat">

<!-- Bloc 1  -->
<div class="block-commander-plat">

	<!-- Image Bloc 1 -->

	<div class="commander-repas-image">
	<?php
		$requete= 'SELECT image FROM commander WHERE id=2';
		$result=mysqli_query($BDD,$requete);
		$imagepartager=mysqli_fetch_assoc($result);
		echo "<img class='commander-plat-image'  src=\"".$imagepartager["image"]."\"";
		if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onclick='boutonImage(this)'";} echo "/>";
	?>
	<form  method="POST" action='Accueil.php' enctype="multipart/form-data">
	<?php   if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
				{
					echo "<input type='file' name='imagepartager' class='bouton-invisible'/></br>";
					echo "<input type='submit' value='Envoyer' class='bouton-invisible' style='clear : both;' onsubmit='window.location.reload()'/>";
					if (isset($_FILES['image']))
					{
						$image=$_FILES['image'];
						if(isset($image) AND $image['error']==0)
						{
							$chemin=pathinfo($image['name']);
							$extension_upload=$chemin['extension'];
							$extensions_autorisees= array('jpg','jpeg','gif','png');
							if (in_array($extension_upload, $extensions_autorisees))
							 {
								$newPic='Images/repasMaison.'.$extension_upload;
								move_uploaded_file($image['tmp_name'], $newPic);
							 }
							$requete ="UPDATE commander SET image='".$newPic."' WHERE id=2";
							$changement=mysqli_query($BDD,$requete);
						}
					else
					{
						$image=null;
					}
				}
			}
	?>
	</form>
</div>

	<!-- Texte Bloc 1   -->

		<div class="commander-repas-texte"  style="width:350px; "<?php if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onmouseover='bouton(this)' onmouseout='bouton(this)' ";} ?>>
			<form class="commander-repas-texte-modify">
				<?php
					if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
					{
						echo "<textarea id='2' class='bouton-invisible' name='partager' style='height:99px;'>Taper votre nouveau texte. Ecrire '</br>' pour sauter à la ligne.</textarea>";
						echo "<input type='button' value='Envoyer' class='bouton-invisible' style='clear : both;' onclick='changer_descriptif(this)'/>";
						echo "<img src='Images/modify.png' width=30px  id='modify' class='bouton-invisible' onclick='modifier_texte(this)'/>" ;
					}
				?>
			</form>

			<span  class="partager-repas-texte-zone-modify">
				<?php
					$texte = "SELECT texte FROM partager WHERE id=2";
					$result=mysqli_query($BDD,$texte);
					$texte=mysqli_fetch_assoc($result);
					echo $texte["texte"];
				?>
		 </span>
		</div>
</div>


<!-- Bloc 2 -->

<div class="block-commander-plat">
	<!-- Image Bloc 2 -->

	<div class="commander-repas-image">
	<?php
		$requete= 'SELECT image FROM commander WHERE id=3';
		$result=mysqli_query($BDD,$requete);
		$imagepartager=mysqli_fetch_assoc($result);
		echo "<img class='commander-plat-image'  src=\"".$imagepartager["image"]."\"";
		if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onclick='boutonImage(this)'";} echo "/>";
	?>
	<form  method="POST" action='Accueil.php' enctype="multipart/form-data">
	<?php   if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
				{
					echo "<input type='file' name='imagepartager' class='bouton-invisible'/></br>";
					echo "<input type='submit' value='Envoyer' class='bouton-invisible' style='clear : both;' onsubmit='window.location.reload()'/>";
					if (isset($_FILES['image']))
					{
						$image=$_FILES['image'];
						if(isset($image) AND $image['error']==0)
						{
							$chemin=pathinfo($image['name']);
							$extension_upload=$chemin['extension'];
							$extensions_autorisees= array('jpg','jpeg','gif','png');
							if (in_array($extension_upload, $extensions_autorisees))
							 {
								$newPic='Images/recupere.'.$extension_upload;
								move_uploaded_file($image['tmp_name'], $newPic);
							 }
							$requete ="UPDATE commander SET image='".$newPic."' WHERE id=3";
							$changement=mysqli_query($BDD,$requete);
						}
					else
					{
						$image=null;
					}
				}
			}
	?>
	</form>
</div>

	<!-- Texte Bloc 2   -->

		<div class="commander-repas-texte"  style="width:350px; "<?php if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onmouseover='bouton(this)' onmouseout='bouton(this)' ";} ?>>
			<form class="commander-repas-texte-modify">
				<?php
					if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
					{
						echo "<textarea id='3' class='bouton-invisible' name='partager' style='height:99px;'>Taper votre nouveau texte. Ecrire '</br>' pour sauter à la ligne.</textarea>";
						echo "<input type='button' value='Envoyer' class='bouton-invisible' style='clear : both;' onclick='changer_descriptif(this)'/>";
						echo "<img src='Images/modify.png' width=30px  id='modify' class='bouton-invisible' onclick='modifier_texte(this)'/>" ;
					}
				?>
			</form>

			<span  class="partager-repas-texte-zone-modify">
				<?php
					$texte = "SELECT texte FROM partager WHERE id=3";
					$result=mysqli_query($BDD,$texte);
					$texte=mysqli_fetch_assoc($result);
					echo $texte["texte"];
				?>
		 </span>
		</div>
</div>

<!-- Bloc 3 -->

	<div class="block-commander-plat">

		<!-- Image Bloc 3 -->

		<div class="commander-repas-image">
		<?php
			$requete= 'SELECT image FROM commander WHERE id=4';
			$result=mysqli_query($BDD,$requete);
			$imagepartager=mysqli_fetch_assoc($result);
			echo "<img class='commander-plat-image'  src=\"".$imagepartager["image"]."\"";
			if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onclick='boutonImage(this)'";} echo "/>";
		?>
		<form  method="POST" action='Accueil.php' enctype="multipart/form-data">
		<?php   if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
					{
						echo "<input type='file' name='imagepartager' class='bouton-invisible'/></br>";
						echo "<input type='submit' value='Envoyer' class='bouton-invisible' style='clear : both;' onsubmit='window.location.reload()'/>";
						if (isset($_FILES['image']))
						{
							$image=$_FILES['image'];
							if(isset($image) AND $image['error']==0)
							{
								$chemin=pathinfo($image['name']);
								$extension_upload=$chemin['extension'];
								$extensions_autorisees= array('jpg','jpeg','gif','png');
								if (in_array($extension_upload, $extensions_autorisees))
								 {
									$newPic='Images/deguste.'.$extension_upload;
									move_uploaded_file($image['tmp_name'], $newPic);
								 }
								$requete ="UPDATE commander SET image='".$newPic."' WHERE id=4";
								$changement=mysqli_query($BDD,$requete);
							}
						else
						{
							$image=null;
						}
					}
				}
		?>
		</form>
	</div>

		<!-- Texte Bloc 3   -->

			<div class="commander-repas-texte"  style="width:350px; "<?php if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onmouseover='bouton(this)' onmouseout='bouton(this)' ";} ?>>
				<form class="commander-repas-texte-modify">
					<?php
						if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
						{
							echo "<textarea id='4' class='bouton-invisible' name='partager' style='height:99px;'>Taper votre nouveau texte. Ecrire '</br>' pour sauter à la ligne.</textarea>";
							echo "<input type='button' value='Envoyer' class='bouton-invisible' style='clear : both;' onclick='changer_descriptif(this)'/>";
							echo "<img src='Images/modify.png' width=30px  id='modify' class='bouton-invisible' onclick='modifier_texte(this)'/>" ;
						}
					?>
				</form>

				<span  class="partager-repas-texte-zone-modify">
					<?php
						$texte = "SELECT texte FROM partager WHERE id=4";
						$result=mysqli_query($BDD,$texte);
						$texte=mysqli_fetch_assoc($result);
						echo $texte["texte"];
					?>
			 </span>
			</div>

	</div>

</div>

<div id="centrer">
<a href="../Plats/plats.php" id="decouvre">Je commande un plat</a>
</div>

</div>



<!--                     TEMOIGNAGES                                    -->

<div id="temoignage">

	<!-- Titre   -->

			<div id="temoignage-titre" <?php if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true") {echo "onmouseover='bouton(this)' onmouseout='bouton(this)' ";} ?>>
				<form id="temoignage-titre-modify">
			    <?php
			      if (isset($_SESSION["admin"]) && $_SESSION["admin"]=="true")
			      {
			        echo "<textarea class='bouton-invisible' name='temoignage' style='height:99px;'>Taper votre nouveau titre. Ecrire '</br>' pour sauter à la ligne.</textarea>";
			        echo "<input type='button' value='Envoyer' class='bouton-invisible' style='clear : both;' onclick='changer_titre(this)'/>";
			        echo "<img src='Images/modify.png' width=30px  id='modify' class='bouton-invisible' onclick='modifier_texte(this)'/>" ;
			      }
			    ?>
			  </form>
				<span id="temoignage-zone-texte" >
			  <?php
			    $titre = "SELECT titre FROM temoignage";
			    $result=mysqli_query($BDD,$titre);
			    $titre=mysqli_fetch_assoc($result);
			    echo $titre["titre"];
			  ?>
			  </span>
			</div>

<!-- Bulles de témoignage  -->

	<div class="bulle">
		<div class="bulle-contenu-qui">Sébastien, 22 ans</div>
		<div class="bulle-contenu-quoi">Commande avec vous !</div>
		<div class="bulle-contenu-commentaire">"C'est pratique et trop bon, merci!</br>miamiamiamiama"
		</div>
		<div class="bulle-note"><!--
   --><span class="etoile1">☆</span><!--
   --><span class="etoile2">☆</span><!--
   --><span class="etoile3">☆</span><!--
   --><span class="etoile4">☆</span><!--
   --><span class="etoile5">☆</span>
	</div>

</div>
	<a  id="temoignage-bouton" href="../Temoignages/temoignage.php"/>Voir tous les témoignages</a>
</div>



<!--             NOS PARTENAIRES                              -->

<div id="partenaires">

<h3 id="partenaires-titre"> Nos partenaires : </h3>

<section id="partenaires-slider">

	<div class="partenaires-container">

			<div class="slider-command"></div>
			<div class="slider">

			<figure>
				<img src="Images/ca.jpg" alt="" width="640" height="310" />
			</figure><!--
			--><figure>
				<img src="Images/lcl.jpg"alt="" width="640" height="310" />
			</figure><!--
			--><figure>
				<img src="Images/ca.jpg" alt="" width="640" height="310" />
			</figure><!--
		--><figure>
			<img src="Images/lcl.jpg"alt="" width="640" height="310" />
			</figure>

			</div>

	</div>
	<span id="timeline"></span>
</div>


</section>

<!-- FIN DE PAGE -->


<hr/>
<footer>

	<div id="fin-de-site">
		<div id="fin-de-site-logo">
			<img width="120px" src="../Images/logo.png"/><br/>
			<span>Adresse : Rue dautancourt, 75017 Paris</span>

		</div>

		<div id="fin-de-site-liens">

			<div id="we-do">
				<h4>WE DO:</h4>

					<ul id="liens-we-do">
						<li><a class="liens-we-do" href="">Apéro cuistos</a></li>
						<li><a class="liens-we-do" href="">Cours du cuisine</a></li>
						<li><a class="liens-we-do" href="">Evènements</a></li>
						<li><a class="liens-we-do" href="">Informations produits</a></li>
						<li><a class="liens-we-do" href="">Blog</a></li>
						<li><a class="liens-we-do" href="">Foire aux questions</a></li>
					</ul>
				</div>

			<div id="we-are">
				<h4>WE ARE :</h4>

    		<ul id="liens-we-are">
      		<li><a class="liens-we-are" href="Societe">Société</a></li>
      		<li><a class="liens-we-are" href="Mentions">Mentions légales</a></li>
					<li><a class="liens-we-are" href="Conditions">Conditions générales d'utilisation</a></li>
					<li><a class="liens-we-are" href="DevenirCuisto">Devenir cuisto</a></li>
    	</ul>
		</div>

		<div id="suivez-nous">
			<h4>SUIVEZ-NOUS :</h4>

    		<ul id="liens-suivez-nous">
      		<li class="reseaux" id="fb"><a class="liens-sites" href="https://www.facebook.com/loveyourcuisine/">Facebook</a></li>
      		<li class="reseaux" id="twitter"><a class="liens-sites"   href="https://twitter.com/?lang=fr">Twitter</a></li>
					<li class="reseaux" id="google"><a class="liens-sites"   href="https://plus.google.com/discover?hl=fr">Google+</a></li>
					<li class="reseaux" id="in"><a class="liens-sites"   href="https://fr.linkedin.com/">LinkedIn</a></li>
				</ul>
		</div>

		<div id="besoin-aide">
			<h4>BESOIN D'AIDE  :</h4>

				<ul id="liens-besoin-aide">
					<li>06.16.41.05.53</li>
					<li><a id="mail" href="mailto:hallo@loveyourcuisine.com">hallo@loveyourcuisine.com</a></li>
				</ul>
			</div>
	</div>

</footer>

<hr/>

<!-- Date mise à jour automatiquement -->
<div class="copyright">	&copy; LOVEYOURCUISINE <?php echo date("Y");?> </div>
<?php deconnecterBDD($BDD); ?>
</main>
  </body>

</html>
