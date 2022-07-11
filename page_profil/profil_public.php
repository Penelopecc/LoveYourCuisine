<!DOCTYPE html>

<?php
	session_start();
	include '../Core.php';
	$cnx=connecterBDD();

?>
<html>
	<head>
	<title>Mon Profil Public</title>
	<title>Mon Profil</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet"  href="page_profil.css" />
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" >
	<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lora:700i" rel="stylesheet">
	<script type="text/javascript" src="page_profil.js"> </script>

	<style type="text/css">
		body {
			 text-align: center;
			 font-family: 'Asap', sans-serif;
			 background-color: #d5f7e7;
		 }

		h1 {
			font-family: 'Lora', serif;
		}

		h2 {
			font-family: 'Lora', serif;
		}

		h4 {
			font-family: 'Lora', serif;
		}

		.bloc {
			margin-bottom: 5%
		}
	</style>

	</head>


	<body onload="<?php

	 $id= mysqli_query($cnx,'select * from profil_public');  /* On choisit les champs à afficher selon les cases que l'utilisateur a coché sur son profil*/
	$row=array();
	while( $a=mysqli_fetch_array($id)){
		$row[]=$a;
	}
	$length= count($row);

	for ($i=0; $i<$length ; $i++){
		$bloc=recupBDD("select nom from profil_public where nom='".$row[$i]['nom']."'",'nom');
		$display=recupBDD("select display from profil_public where nom='".$row[$i]['nom']."'",'display');?>
		affiche_bloc('<?php echo $bloc ; ?>','<?php echo $display ; ?>');<?php
	}?>;
		show_cuisto('<?php echo recupBDD('select typeUtilisateur from utilisateur where idutilisateur="'.$_SESSION['idutilisateur'].'"','typeUtilisateur'); ?>') ">


<!-- En tête-->
		<header role="banner">

	        	<div class="menu">
	              <a href="../Accueil/Accueil.php"><img id='logo' width="80px" src="../Images/logo.png"/></a>
	              <div class="liens" ><a href="../Accueil/Accueil.php">Accueil</a></div>
	              <div class="liens" ><a href="../Recettes/recette.php">Nos recettes</a></div>
	              <div class="liens" ><a href="../Cuistos/Cuistos.php">Nos cuistos </a></div>
	              <div class="liens" ><a href="../How/how.php">Comment ça marche ?</a></div>


								<div class="connexion-insciption"> <!-- Bouton Mon compte -->
	 		          <div id="compte" class="connecte" onmouseover='style.backgroundColor = "rgba(122, 143, 90, 0.3)"'  onmouseout='style.backgroundColor = "#f5f5dc"'><a href="page_profil.php">Mon Compte</a></div>
	 		          <div id="medeconnecte" class="connecte"  style="margin-left : 5px; border-radius: 40px;" onmouseover='style.backgroundColor = "rgba(122, 143, 90, 0.3)"'  onmouseout='style.backgroundColor = "#f5f5dc"'><a href="../deconnexion.php">Déconnexion</a></div>
	 		        </div>

	           <div class="lien-commande" ><a href="../Plats/plats.php">Commander un plat</a></div>
	    				<div class="spacer">&nbsp;</div>


	        	</div>
	    		<hr/>
	    </header>



<!-- Infos de l'utilisateur-->
	<div class="container-fluid">
	<div class="row content">
		<div class="col-sm-3 sidenav">
				<h2>Mes infos :</h2>
					Photo : <br/>
							<img width="50%" src="<?php echo $_SESSION['photo']; ?>"/><br/>
					Nom : <br/>
						<?php
							afficheBDD('select nom from utilisateur where idUtilisateur="'.$_SESSION["idutilisateur"].'"','nom');  /* On récupère les infos de l'utilisateur grâce aux variables de session*/
						?><br/>
					Prénom :<br/>
						<?php
							afficheBDD('select prenom from utilisateur where idUtilisateur="'.$_SESSION["idutilisateur"].'"','prenom');
						?><br/>
					Identifiant :<br/>
						<?php
							afficheBDD('select identifiant from utilisateur where idUtilisateur="'.$_SESSION["idutilisateur"].'"','identifiant');
						?><br/>
					Mot de passe :<br/>
						<?php
							afficheBDD('select mdp from utilisateur where idUtilisateur="'.$_SESSION["idutilisateur"].'"','mdp');
						?><br/>
					Adresse :<br/>
						<?php
							afficheBDD('select adresse from utilisateur where idUtilisateur="'.$_SESSION["idutilisateur"].'"','adresse');
						?><br/>
					Code postal : <br/>
						<?php
							afficheBDD('select code from utilisateur where idUtilisateur="'.$_SESSION["idutilisateur"].'"','code');
						?><br/>
					Ville :<br/>
						<?php
							afficheBDD('select ville from utilisateur where idUtilisateur="'.$_SESSION["idutilisateur"].'"','ville');
						?><br/>
					Téléphone :<br/>
						<?php
							afficheBDD('select tel from utilisateur where idUtilisateur="'.$_SESSION["idutilisateur"].'"','tel');
						?><br/>
					Mail :<br/>
						<?php
							afficheBDD('select mail from utilisateur where idUtilisateur="'.$_SESSION["idutilisateur"].'"','mail');
						?><br/>
					Age :<br/>
						<?php
							afficheBDD('select age from utilisateur where idUtilisateur="'.$_SESSION["idutilisateur"].'"','age');
						?><br/>
					Nombre de personnes dans le foyer :
						<?php
							afficheBDD('select nbpersonne from utilisateur where idUtilisateur="'.$_SESSION["idutilisateur"].'"','nbpersonne');
						?><br/>
					Je suis un :
						<?php
							afficheBDD('select typeUtilisateur from utilisateur where idUtilisateur="'.$_SESSION["idutilisateur"].'"','typeUtilisateur');
						?><br/><br/>
						<form method="post" action="page_profil.php">
							 <input type="submit" class="btn btn-success" value="Retour au profil">
							 </form>
		</div>


<!-- périmètre d'action-->
		<div class="col-sm-9">
		<div class="bloc" id="perimetre_action"><h2>Périmètre d'action :</h2>
			Votre Adresse : <?php
			afficheBDD('select adresse from utilisateur where idUtilisateur="'.$_SESSION['idutilisateur'].'"','adresse');?>, <?php
			afficheBDD('select code from utilisateur where idUtilisateur="'.$_SESSION['idutilisateur'].'"','code');?>, <?php
			afficheBDD('select ville from utilisateur where idUtilisateur="'.$_SESSION['idutilisateur'].'"','ville');
			?>
			<p align= "center"><img src="carte.jpg" width="500"/></p>
		</div>

		<div class="bloc" id="panier"><h2>Mes paniers :</h2>
			<div class="col-md-8 gauche">
					<u>En attente :</u>
					<div class="sous_bloc"><li class="lien"  onClick="show_hide_div('panier 1')"> panier 1</li>
					<div class="volet" id="panier 1"> carottes <input type="button" class="A_payer" onclick="payer()" value="Payer"></div>
					</div>
					<div class="sous_bloc"><li class="lien" onClick="show_hide_div('panier 2')"> panier 2</li>
					<div class="volet" id="panier 2">bananes <input type="button" class="A_payer" class="bouton_commande" onclick="payer()" value="Payer"></div>
					</div>
					</ul>
			 </div>

			 <div class="col-md-8 droite">
				 <u>Déja commandé :</u>
				<ul>
					<div class="sous_bloc"><li class="lien" onClick="show_hide_div('panier_réglé 1')"> panier 1</li>
						<div class="volet" id="panier_réglé 1">riz</div>
					</div>

					<div class="sous_bloc"><li class="lien" onClick="show_hide_div('panier_réglé 2')"> panier 2</li>
						<div class="volet" id="panier_réglé 2">poires</div>
					</div>
				</ul>
			</div>
		</div>

<!--mes plats-->
		<div class="bloc volet_cuisto">
			<h2 id="plats">Mes plats :</h2>
				<div class="sous_bloc">
					<div class="lien" onClick="show_hide_div('recette 1')">
						<img width="300" height= "200" src="<?php
							afficheBDD('select photo from recette where idrecette=6','photo');
							?>"/><br/>
							<?php
							afficheBDD('select titre from recette where idrecette=6','titre');
						?>
						pour 4 personnes
					</div>
					<div class="volet" id="recette 1" onclick="prix_portion('nombre_portions1','prix1','gain1')">
						<ul>
							<thead>
								<th><u>Ingrédients</u></th>
							</thead>
							<?php
								$id= mysqli_query($cnx,'select idingredient from ingredient_recette where idrecette=2');
								$row=array();
								while( $a=mysqli_fetch_array($id)){
									$row[]=$a;
								}
								$length= count($row);

								for ($i=0; $i<$length ; $i++){ ?>
									<li><?php
									afficheBDD("select nom from ingredient where idingredient='".$row[$i]['idingredient']."'",'nom');
									?></li><br/><?php
								}?>
							</ul></br>
							<u>Préparation</u><br/>
							<?php
							afficheBDD('select preparation from recette where idrecette=6','preparation');
							?>
								</div>
							</div>
							</div>
						</ul>
					</div>

<!--mes repas-->
					<div class="bloc volet_simple">
						<h2 id="repas">Mes repas :</h2>
							<div class="sous_bloc">
								<div class="lien" onClick="show_hide_div('repas 1')"> <?php afficheBDD('select titre from recette where idrecette=6','titre'); ?>
								</div>
								<div class="volet" id="repas 1">
									<ul>
										<thead>
											<th><u>Ingrédients</u></th>
										</thead>
										<?php
											$id= mysqli_query($cnx,'select idingredient from ingredient_recette where idrecette=6');
											$row=array();
											while( $a=mysqli_fetch_array($id)){
												$row[]=$a;
											}
											$length= count($row);

											for ($i=0; $i<$length ; $i++){ ?>
												<li><?php
												afficheBDD("select nom from ingredient where idingredient='".$row[$i]['idingredient']."'",'nom');
												?></li><br/><?php
											}
										?>
									</ul></br>
									<u>Préparation</u><br/>
										<?php
										afficheBDD('select preparation from recette where idrecette=6','preparation');
										?>
									<input type="button" onclick="partage_repas()" class="bouton_commande" value="Je partage mon repas">
								</div>
							</div>
							</div>
						</ul>
					</div>

<!-- Témoignages-->
		<div class="bloc" id="temoignages"><h2>Témoignages :</h2>
			<div class="sous_bloc" id="bloc_temoignage">
			<u>Vos retours :</u>
			<ul>
				<?php
					$id= mysqli_query($cnx,'select idtemoignage from temoignage where utilisateur_noté=(select identifiant from utilisateur where idutilisateur="'.$_SESSION['idutilisateur'].'")');
					$row=array();
					while( $a=mysqli_fetch_array($id)){
						$row[]=$a;
					}
					$length= count($row);

					for ($i=0; $i<$length ; $i++){ ?>
						<li> utilisateur : <?php
						afficheBDD("select utilisateur from temoignage where idtemoignage='".$row[$i]['idtemoignage']."'",'utilisateur');?> note : <?php
						afficheBDD("select note from temoignage where idtemoignage='".$row[$i]['idtemoignage']."'",'note');?> commentaire : <?php
						afficheBDD("select texte from temoignage where idtemoignage='".$row[$i]['idtemoignage']."'",'texte');
						?></li><br/><?php
					}?>
			</ul>
		</div>
	</div>
</div>

<!--Pied de page-->
							<hr/>
							   <footer>

							   	<div id="fin-de-site">
							   		<div id="fin-de-site-logo">
							   			<img width="120px" src="../Images/logo.png"/><br/>
							   			<span>Adresse : 49 rue de montgeroult</span>

							   		</div>

							   		<div id="fin-de-site-liens">

							   			<div id="we-do">
							   				<h4>WE DO:</h4>

							   					<ul id="liens-we-do">
							   						<li><a href="">Apéro cuistos</a></li>
							   						<li><a href="">Cours du cuisine</a></li>
							   						<li><a href="">Evènements</a></li>
							   						<li><a href="">Informations produits</a></li>
							   						<li><a href="">Blog</a></li>
							   						<li><a href="">Foire aux questions</a></li>
							   					</ul>
							   				</div>

							   			<div id="we-are">
							   				<h4>WE ARE :</h4>

							       		<ul id="liens-we-are">
							         		<li><a href="Societe">Société</a></li>
							         		<li><a href="Mentions">Mentions légales</a></li>
							   					<li><a href="Conditions">Conditions générales d'utilisation</a></li>
							   					<li><a href="DevenirCuisto">Devenir cuisto</a></li>
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
							   <div class="copyright">	&copy; LOVEYOURCUISINE 2018 </div>
							<?php deconnecterBDD($cnx);
							?>
			</div>

	</body>
</html>
