<!DOCTYPE html>

<?php
session_start();										/* récupération des variables de sessions */

	include '../Core.php';
	$cnx=connecterBDD();

?>


<html>
	<head>
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


	<body onload= "<?php $id= mysqli_query($cnx,'select * from profil_public'); /* On récupère les valeurs de display des blocs à afficher sur le profil public*/
	$row=array();
	while( $a=mysqli_fetch_array($id)){
		$row[]=$a;
	}
	$length= count($row);

	for ($i=0; $i<$length ; $i++){ ?>
		<?php
		$bloc=recupBDD("select nom from profil_public where nom='".$row[$i]['nom']."'",'nom');
		$display=recupBDD("select display from profil_public where nom='".$row[$i]['nom']."'",'display');?>
		check_box('<?php echo $bloc ; ?>','<?php echo $display ; ?>');<?php
	}?>;
	show_cuisto('<?php echo recupBDD('select typeUtilisateur from utilisateur where idutilisateur="'.$_SESSION['idutilisateur'].'"','typeUtilisateur'); ?>')"> <!-- On affiche les blocs de profil en fonction de type d'utilisateur-->




<!-- En tête-->
		<header role="banner">

	        	<div class="menu"> <!-- Connexion aux autres pages du site-->
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
<div class="container-fluid">
		<div class="row content">
				<div class="col-sm-3 sidenav">  <!-- Informations de l'utilisateur connecté-->
					<h2>Mes infos :</h2>
						Photo : <br/>
								<img width="50%" src="<?php echo $_SESSION['photo']; ?>"/><br/>
						Nom : <br/>
							<input id="nom" type="text" value="<?php
								afficheBDD('select nom from utilisateur where idUtilisateur="'.$_SESSION["idutilisateur"].'"','nom');   /* On récupère les infos de l'utilisateur grâce aux variables de session*/
							?>"/><br/>
						Prénom :<br/>
							<input id="prenom" type="text" value="<?php
								afficheBDD('select prenom from utilisateur where idUtilisateur="'.$_SESSION["idutilisateur"].'"','prenom');
							?>"/><br/>
						Identifiant :<br/>
							<input id="identifiant" type="text" value="<?php
								afficheBDD('select identifiant from utilisateur where idUtilisateur="'.$_SESSION["idutilisateur"].'"','identifiant');
							?>"/><br/>
						Mot de passe :<br/>
							<input id="mdp" type="text" value="<?php
								afficheBDD('select mdp from utilisateur where idUtilisateur="'.$_SESSION["idutilisateur"].'"','mdp');
							?>"/><br/>
						Adresse :<br/>
							<input id="adresse" type="text" value="<?php
								afficheBDD('select adresse from utilisateur where idUtilisateur="'.$_SESSION["idutilisateur"].'"','adresse');
							?>"/><br/>
						Code postal : <br/>
							<input id="code" type="text" value="<?php
								afficheBDD('select code from utilisateur where idUtilisateur="'.$_SESSION["idutilisateur"].'"','code');
							?>"/><br/>
						Ville :<br/>
							<input id="ville" type="text" value="<?php
								afficheBDD('select ville from utilisateur where idUtilisateur="'.$_SESSION["idutilisateur"].'"','ville');
							?>"/><br/>
						Téléphone :<br/>
							<input id="tel" type="text" value="<?php
								afficheBDD('select tel from utilisateur where idUtilisateur="'.$_SESSION["idutilisateur"].'"','tel');
							?>"/><br/>
						Mail :<br/>
							<input id="mail" type="text" value="<?php
								afficheBDD('select mail from utilisateur where idUtilisateur="'.$_SESSION["idutilisateur"].'"','mail');
							?>"/><br/>
						Age :<br/>
							<input id="age" type="text" value="<?php
								afficheBDD('select age from utilisateur where idUtilisateur="'.$_SESSION["idutilisateur"].'"','age');
							?>"/><br/>
						Nombre de personnes dans le foyer :
							<input id="nbpersonne" type="text"  value="<?php
								afficheBDD('select nbpersonne from utilisateur where idUtilisateur="'.$_SESSION["idutilisateur"].'"','nbpersonne');
							?>"/><br/>
						Je suis un :
							<?php
								afficheBDD('select typeUtilisateur from utilisateur where idUtilisateur="'.$_SESSION["idutilisateur"].'"','typeUtilisateur');
							?><br/><br/>

		<input type="button" onclick="partage_repas()" class="bouton_commande volet_simple btn-success" value="devenir cuisto">
		<input type="submit" class="bouton_commande btn btn-success" onclick="modif_info()" value="Enregistrer les modifications"> </br>
		<a href="http://localhost:8008/page_profil/profil_public.php">	 <input class="btn btn-success" type="submit" value="Voir mon profil public"> </a>

	</div>

<!--centre de la page-->
			<div class="col-sm-9">
	<!--accueil-->
				<h1 id="Bonjour" class="bloc">Bonjour, <?php
							afficheBDD('select prenom from utilisateur where idUtilisateur="'.$_SESSION['idutilisateur'].'"','prenom');
						?> !</br>
					<i>Quoi de neuf ?</i></br>
				</h1>

	<!--Périmètre d'action-->
				<div class="bloc"><h2>Périmètre d'action :</h2>
					Votre Adresse : <?php
					afficheBDD('select adresse from utilisateur where idUtilisateur="'.$_SESSION['idutilisateur'].'"','adresse');?>, <?php
					afficheBDD('select code from utilisateur where idUtilisateur="'.$_SESSION['idutilisateur'].'"','code');?>, <?php
					afficheBDD('select ville from utilisateur where idUtilisateur="'.$_SESSION['idutilisateur'].'"','ville');
					?>
					<p align= "center"><img src="carte.jpg" width="500"/></p>
					<input type="checkbox"  class= "checkbox" onchange="show_blocpublic('perimetre_action')" value="perimetre_action" id="perimetre_action"> Afficher votre périmètre d'action sur votre profil public ?</br>
				</div>

	<!--mes paniers-->
				<div class="bloc"><h2>Mes paniers :</h2>
					<div class="col-md-8 gauche">
				 			<u>En attente :</u>
					 		<div class="sous_bloc"><li class="lien"  onClick="show_hide_div('panier 1')"> panier 1</li>
						 	<div class="volet" id="panier 1">carottes <input type="button" class="A_payer btn-success" onclick="payer()" value="Payer"></div>
					 		</div>
					 		<div class="sous_bloc"><li class="lien" onClick="show_hide_div('panier 2')"> panier 2</li>
						 	<div class="volet" id="panier 2">bananes <input type="button" class="A_payer btn-success" class="bouton_commande" onclick="payer()" value="Payer"></div>
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
					<input type="checkbox"  class= "checkbox" onclick="show_blocpublic('panier')" id="panier" value="panier"> Afficher vos paniers sur votre profil public ?</br>
				</div>


	<!--mes plats-->
	<div class="bloc volet_cuisto">
		<h2>Mes plats :</h2>
			<div class="sous_bloc">
				<div class="lien" onClick="show_hide_div('recette 1')">
					<img width="300" height= "200" src="<?php
						afficheBDD('select photo from recette where idrecette=6','photo');   /* On affiche la recette  d'id 6*/
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
						<u>Portions</u><br/>
							<label for="ticketNum">Nombre de portions à vendre :</label>
									<input type="number" id="nombre_portions1" class="portions" min="0" max="30" value="" required /><br/>
									(prix suggéré : 3€/portion)
									<label for="ticketNum">Votre gain :</label>
									<input type="number" name="prix" id="prix1" class="portions" min="0" max="30" value="" required />€/portion  <input type="text" id="gain1" class="portions" value=""/>€ au total
									<br/>
						<u>Date de préparation :</u><br/>
							<input type="date" name="date" id="date" class="" placeholder="ex : 20/11" required /><br/>
						<u>Heure de préparation :</u><br/>
							<input  type="hour" name="heure" id="heure" class="" placeholder="ex : 12h30" required /><br/>
						<u>Lieu de vente :</u><br/>
							<?php
					afficheBDD('select adresse from utilisateur where idUtilisateur="'.$_SESSION['idutilisateur'].'"','adresse');?>, <?php
					afficheBDD('select code from utilisateur where idUtilisateur="'.$_SESSION['idutilisateur'].'"','code');?>, <?php
					afficheBDD('select ville from utilisateur where idUtilisateur="'.$_SESSION['idutilisateur'].'"','ville');
					?></br>
						<input type="submit" class="bouton_commande btn-success" onclick="publier_plat()" value="Publier la vente"> <!-- On envoie la recette dans la table recette_a_vendre-->
							</div>
						</div>
					</ul>
					<input type="checkbox"  class= "checkbox" onclick="show_blocpublic('plats')" id="plats" value="plats"> Afficher les plats que vous cuisinez sur votre profil public ?</br>
				</div>

<!--Mes repas -->
				<div class="bloc volet_simple">
					<h2>Mes repas :</h2>  <!-- Repas que peut cuisiner l'utilisateur simple-->
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
								<input type="button" onclick="partage_repas()" class="bouton_commande btn-success" value="Je partage mon repas">
							</div>
						</div>
					</ul>
					<input type="checkbox"  class= "checkbox" onclick="show_blocpublic('repas')" id="repas" value="repas"> Afficher vos repas sur votre profil public ?</br>
				</div>


<!-- Commander un plat-->
				<div class="bloc"><h2>Je commande un plat :</h2>
					<ul>
						<div class="sous_bloc"><li class="lien" onClick="show_hide_div('plat 1')">
							<img width="300" height= "200" src="<?php
									afficheBDD('select photo from recette_a_vendre where idavendre=1','photo'); /* On affiche l'element d'id 1 de la table recette_a_vendre*/
									?>"/><br/>
							<?php
									afficheBDD('select titre from recette_a_vendre where idavendre=1','titre');
									?></li>
							<div class="volet" id="plat 1">
								<?php
									afficheBDD('select prix from recette_a_vendre where idavendre=1','prix');
									?>€/portion</br>
								<?php
									afficheBDD('select portions from recette_a_vendre where idavendre=1','portions');
									?> portions disponibles</br>
								lieu : <?php
									afficheBDD('select lieu from recette_a_vendre where idavendre=1','lieu');
									?></br>
								horaire de vente : <?php
									afficheBDD('select horaire from recette_a_vendre where idavendre=1','horaire');
									?></br>
								par : <?php
									afficheBDD('select prenom from recette_a_vendre where idavendre=1','prenom');?> <?php
									afficheBDD('select nom from recette_a_vendre where idavendre=1','nom');
									?></br>
								<input type="button" class="bouton_commande btn-success" onclick="commande_plat()" value="Je commande">
							</div>
						</div>
					</ul>
						</div>
								<div class="bloc"><h2>Témoignages :</h2>
									<div class="sous_bloc" id="bloc_temoignage">
										<label for="monNavigateur">Choisissez un utilisateur à noter :</label></br>  <!-- On choisit l'utilisateur que l'on veut noter par son pseudo pour éviter les homonymes-->
										<input name="utilisateur_noté" list="users" id="utilisateur_note"/>
											<datalist id="users" required>
												<?php
														$requeteNom = 'SELECT identifiant FROM utilisateur where idutilisateur != "'.$_SESSION['idutilisateur'].'"';
														$resNom = mysqli_query($cnx,$requeteNom);
														$tableauNom = array();
														if (mysqli_num_rows($resNom)) {
															while($ligne = mysqli_fetch_assoc($resNom)) {
																	$tableauNom[] = $ligne;
															  }
														  }
														for ($i=0; $i<count($tableauNom); $i++){ ?>
															<option value="<?php echo $tableauNom[$i]['identifiant']; ?>"/><?php;
															?><?php
														}
												?>
											</datalist></br>
											 <div class="col-md-12 rating" id="note"> <!-- On note l'utilisateur grâce la notation en étoiles-->
											   <input type="radio" name="star" class="radio" id="star1" value='5'><label for="star1"></label>
											   <input type="radio" name="star" class="radio" id="star2" value='4'><label for="star2"></label>
											   <input type="radio" name="star" class="radio" id="star3" value='3'><label for="star3"></label>
											   <input type="radio" name="star" class="radio" id="star4" value='2'><label for="star4"></label>
											   <input type="radio" name="star" class="radio" id="star5" value='1'><label for="star5"></label>
											   </div><br>
										<TEXTAREA name="texte" rows=10 cols=50 placeholder="Laissez un témoignage" id="texte"></TEXTAREA></br>
										<input class="btn btn-success" type="submit" onclick="envoyer()" value="Envoyer"></br>
									</div>
									<div>
									<u>Vos retours :</u> <!-- Affichage des commentaires que les autres utilisateurs postent sur vous-->
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
									<input type="checkbox"  class= "checkbox"  onclick="show_blocpublic('temoignages')" id="temoignages" value="temoignages"> Afficher vos témoignages reçus/envoyés sur votre profil public ?</br>
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
