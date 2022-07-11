<!DOCTYPE html>


<?php
	include 'Core.php';
	$cnx=connecterBDD();
	mysqli_set_charset($cnx, "utf8");

	 function afficheBDD ($req,$champ){
		$cnx=connecterBDD();
		$res = mysqli_query($cnx,$req);
		$row = mysqli_fetch_assoc($res);
		echo $row[$champ];
		}

	 function recupBDD ($req,$champ){
		$cnx=connecterBDD();
		$res = mysqli_query($cnx,$req);
		$row = mysqli_fetch_assoc($res);
		return ($row[$champ]);
		}
?>


<html>
	<head>
	<title>Mon Profil</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="page_profil.css" />
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" >

	<script type="text/javascript" src="page_profil.js"> </script>
	</head>
	<body onload= "show_cuisto('<?php echo recupBDD('select typeUtilisateur from utilisateur where idutilisateur=3','typeUtilisateur'); ?>')">
		<header role="banner">

	        	<div class="menu">
	              <a href="../Accueil/Accueil.php"><img id='logo' width="80px" src="../Images/logo.png"/></a>
	              <div class="liens" ><a href="../Accueil/Accueil.php">Accueil</a></div>
	              <div class="liens" ><a href="../Recettes/Recettes.php">Nos recettes</a></div>
	              <div class="liens" ><a href="../Cuistos/Cuistos.php">Nos cuistos </a></div>
	              <div class="liens" ><a href="../How/how.php">Comment ça marche ?</a></div>


	           <div class="connexion-insciption">
	    					<div class="inscription" ><a href="../Inscription/inscription.php">Inscription</a></div>
	    					<div class="compte" ><a href="../Compte/Compte.php">Mon Compte</a></div>
	    				</div>

	           <div class="lien-commande" ><a href="../Commande/Commande.php">Commander un plat</a></div>
	    				<div class="spacer">&nbsp;</div>


	        	</div>
	    		<hr/>
	    </header>

<div class="container-fluid">
		<div class="row content">
			<div class="col-sm-3 sidenav">
		Mes infos :

			<form method="post" action="page_profil.php">
			<p>
			<li> Nom :
				<?php
					afficheBDD('select nom from utilisateur where idUtilisateur=3','nom');
				?>
			</li>
			<li> Prénom :
				<?php
					afficheBDD('select prenom from utilisateur where idUtilisateur=3','prenom');
				?>
			</li>
			<li> Identifiant :
				<?php
					afficheBDD('select identifiant from utilisateur where idUtilisateur=3','identifiant');
				?>
			</li>
			<li> mot de passe :
				<?php
					afficheBDD('select mdp from utilisateur where idUtilisateur=3','mdp');
				?>
			</li>
			<li> Adresse :

				<input name="adresse" type="text" value="<?php
					afficheBDD('select adresse from utilisateur where idUtilisateur=3','adresse');
				?>"/>
			</li>
			<li> Code postal :
				<input name="code" type="text" value="<?php
					afficheBDD('select code from utilisateur where idUtilisateur=3','code');
				?>"/>
			</li>
			<li> Ville :
				<input name="ville" type="text" value="<?php
					afficheBDD('select ville from utilisateur where idUtilisateur=3','ville');
				?>"/>
			</li>
			<li> Téléphone :
				<input name="tel" type="text" value="<?php
					afficheBDD('select tel from utilisateur where idUtilisateur=3','tel');
				?>"/>
			</li>
			<li> mail :
				<input name="mail" type="text" value="<?php
					afficheBDD('select mail from utilisateur where idUtilisateur=3','mail');
				?>"/>
			</li>
			<li> âge :
				<?php
					afficheBDD('select age from utilisateur where idUtilisateur=3','age');
				?>
			</li>
			<li> nombre de personnes dans le foyer :
				<input type="text" name="nbpersonne" value="<?php
					afficheBDD('select nbpersonne from utilisateur where idUtilisateur=3','nbpersonne');
				?>"/>
			</li>
			<li> Je suis un :
				<?php
					afficheBDD('select typeUtilisateur from utilisateur where idUtilisateur=3','typeUtilisateur');
				?>
			</li>
</br>
			<input type="submit" class="bouton_commande" onclick="modif_plat()" value="Enregistrer les modifications">
</form>
</div>
<div class="col-sm-9">
	<div id="Bonjour" class="bloc">Bonjour, <?php
				afficheBDD('select prenom from utilisateur where idUtilisateur=3','prenom');
			?> !</br>
		<i>Quoi de neuf ?</i></br>
	</div>
		
		<?php
		mysqli_query($cnx,"update utilisateur set adresse='".$_POST['adresse']."', code= '".$_POST['code']."', ville= '".$_POST['ville']."',tel= '".$_POST['tel']."', mail= '".$_POST['mail']."', nbpersonne='".$_POST['nbpersonne']."' where idutilisateur=3");
		?>
		<form method="post" action="profil_public.php">
			 <input type="submit" value="Voir mon profil public">
		</form>

		<div class="bloc"><u>Périmètre d'action :</u></br></br>
			Votre Adresse :</br>
			<p align= "center"><img src="carte.jpg" width="500"/></p>
			<input type="checkbox"  class= "checkbox" onchange="show_blocpublic(perimetre_action)" id="perimetre_action"> Afficher votre périmètre d'action sur votre profil public ?</br>
		</div>

		<div class="bloc"><u>Mes paniers :</u></br></br>
			<div class="col-bg-12 gauche">
		 En attente :
			 <div class="sous_bloc"><li class="lien"  onClick="show_hide_div('panier 1')"> panier 1</li>
				 <div class="volet" id="panier 1">blablablabla <input type="button" class="A_payer" onclick="payer()" value="Payer"></div>
			 </div>
			 <div class="sous_bloc"><li class="lien" onClick="show_hide_div('panier 2')"> panier 2</li>
				 <div class="volet" id="panier 2">blablablabla <input type="button" class="A_payer" class="bouton_commande" onclick="payer()" value="Payer"></div>
			 </div>
			 </div>
		</div>
		<div class="droite">
		 <u>En attente :</u>
			 <div class="sous_bloc"><li class="lien"  onClick="show_hide_div('panier 1')"> panier 1</li>
				 <div class="volet" id="panier 1">blablablabla <input type="button" class="A_payer" onclick="payer()" value="Payer"></div>
			 </div>

			 <div class="sous_bloc"><li class="lien" onClick="show_hide_div('panier 2')"> panier 2</li>
				 <div class="volet" id="panier 2">blablablabla <input type="button" class="A_payer" class="bouton_commande" onclick="payer()" value="Payer"></div>
			 </div>
			 </
 </div>

			<u>Déja commandé :</u></br>
			<ul>
				<div class="sous_bloc"><li class="lien" onClick="show_hide_div('panier_réglé 1')"> panier 1</li>
					<div class="volet" id="panier_réglé 1">blablablabla</div>
				</div>

				<div class="sous_bloc"><li class="lien" onClick="show_hide_div('panier_réglé 2')"> panier 2</li>
					<div class="volet" id="panier_réglé 2">blablablabla</div>
				</div>
			</ul>
			<input type="checkbox"  class= "checkbox" onclick="show_blocpublic(panier)" id="panier"> Afficher vos paniers sur votre profil public ?</br>
		</div>

		<div class="bloc volet_cuisto"><u>Mes plats :</u></br>
			<ul>
				<div class="sous_bloc">
					<li class="lien" onClick="show_hide_div('recette 1')">
						<img width="300" height= "200" src="<?php
							afficheBDD('select photo from recette_a_vendre where idavendre=1','photo');
							?>"/><br/>
							<?php
							afficheBDD('select titre from recette where idrecette=1','titre');
						?>
						pour 4 personnes
					</li>
					<div class="volet" id="recette 1" onclick="prix_portion('nombre_portions1','prix1','gain1')">
						<ul>
							<thead>
								<th><u>Ingrédients</u></th>
							</thead>
							<?php
								$id= mysqli_query($cnx,'select idingredient from ingredient_recette where idrecette=1');
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
						<ul>
							<thead>
								<th><u>Ustensiles</u></th>
							</thead>
							<?php
								$id= mysqli_query($cnx,'select idustensile from ustensile_recette where idrecette=1');
								$row=array();
								while( $a=mysqli_fetch_array($id)){
									$row[]=$a;
								}
								$length= count($row);

								for ($i=0; $i<$length ; $i++){ ?>
									<li><?php
									afficheBDD("select nom from ustensile where idustensile='".$row[$i]['idustensile']."'",'nom');
									?></li><br/><?php
								}
							?>
						</ul></br>
						<ul>
							<thead>
								<th><u>Préparation</u></th>
							</thead>
							<?php
							afficheBDD('select preparation from recette where idrecette=1','preparation');
							?>
						</ul></br>
						<iframe width="560" height="315" src="<?php echo recupBDD('select video from recette where idrecette=1','video'); ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe><br/>
					<form method="post" action="page_profil.php">
						<p>
							<ul>
								<thead>
									<th><u>Portions</u></th>
								</thead>


								<li>	<label for="ticketNum">Nombre de portions à vendre :</label
										<input type="text" name="test"/><br/>
										<input type="number" name="portions" id="nombre_portions1" class="portions" min="0" max="30" value="0" required />
										prix suggéré : 3€/portion</li>
								<li>	<label for="ticketNum">Votre gain :</label>
										<input type="number" name="prix" id="prix1" class="portions" min="0" max="30" value="0" required />€/portion  <input type="text" id="gain1" class="portions" value=""/>€ au total
								</li>
							</ul></br>
							<u>Date de préparation :</u><br/>
								<input type="date" name="date" id="date" class="" placeholder="ex : 20/11" required /><br/>
							<u>Heure de préparation :</u><br/>
								<input  type="hour" name="heure" id="heure" class="" placeholder="ex : 12h30" required /><br/>
							<u>Lieu de revente :</u><br/>
								domicile</br>
						<input type="submit" class="bouton_commande" value="Publier la vente">
					</p>
				</form>
				<?php
					echo $_POST['prix']."<br/>";
					echo $_POST['portions']."<br/>";
					$titre = recupBDD('select titre from recette where idrecette=1','titre');
					$photo = recupBDD('select photo from recette where idrecette=1','photo');
					$nom = recupBDD('select nom from  where idutilisateur=3','nom');
					$prenom = recupBDD('select prenom from  where idutilisateur=3','prenom');
					mysqli_query($cnx,"insert into recette_a_vendre values('0','".$titre."','".$photo."',".$_POST['prix'].",".$_POST['portions'].",'domicile','".$_POST['date']."','".$_POST['heure']."','".$nom."','".$prenom."')");
				?>
					</div>
				</div>

				<div class="sous_bloc"><li class="lien" onClick="show_hide_div('recette 2')"> recette 2</li>
					<div class="volet" id="recette 2">blablablabla</div>
				</div>
			</ul>
			<input type="checkbox"  class= "checkbox"  onclick="show_blocpublic(plats)" id="plats"> Afficher les plats que vous cuisinez sur votre profil public ?</br>
		</div>

		<div class="bloc volet_simple">
			<u>Mes repas :</u></br>
			<ul>
				<div class="sous_bloc"><li class="lien" onClick="show_hide_div('repas 1')"> <?php afficheBDD('select titre from recette where idrecette=2','titre'); ?></li>
					<div class="volet" id="repas 1">
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
								}
							?>
						</ul></br>
						<ul>
							<thead>
								<th><u>Ustensiles</u></th>
							</thead>
							<?php
								$id= mysqli_query($cnx,'select idustensile from ustensile_recette where idrecette=2');
								$row=array();
								while( $a=mysqli_fetch_array($id)){
									$row[]=$a;
								}
								$length= count($row);

								for ($i=0; $i<$length ; $i++){ ?>
									<li><?php
									afficheBDD("select nom from ustensile where idustensile='".$row[$i]['idustensile']."'",'nom');
									?></li><br/><?php
								}?>
						<ul>
							<thead>
								<th><u>Préparation</u></th>
							</thead>
							<?php
							afficheBDD('select preparation from recette where idrecette=2','preparation');
							?>
						</ul></br>
						<iframe width="560" height="315" src= src="<?php echo recupBDD('select video from recette where idrecette=2','video'); ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe><br/>
							<input type="button" onclick="partage_repas()" class="bouton_commande" value="Je partage mon repas">
					</div>
				</div>

				<div class="sous_bloc"><li class="lien" onClick="show_hide_div('repas 2')"> recette 2</li>
					<div class="volet" id="repas 2">blablablabla</div>
				</div>
			</ul>
			<input type="checkbox"  class= "checkbox" onclick="show_blocpublic(repas)" id="repas"> Afficher vos repas sur votre profil public ?</br>
		</div>



		<div class="bloc"><u>Je commande un plat :</u>
			<ul>
				<div class="sous_bloc"><li class="lien" onClick="show_hide_div('plat 1')">
					<img width="300" height= "200" src="<?php
							afficheBDD('select photo from recette_a_vendre where idavendre=2','photo');
							?>"/><br/>
					<?php
							afficheBDD('select titre from recette_a_vendre where idavendre=2','titre');
							?></li>
					<div class="volet" id="plat 1">
						<?php
							afficheBDD('select prix from recette_a_vendre where idavendre=2','prix');
							?>€/portion</br>
						<?php
							afficheBDD('select portions from recette_a_vendre where idavendre=2','photo');
							?> portions disponibles</br>
						lieu : <?php
							afficheBDD('select lieu from recette_a_vendre where idavendre=2','lieu');
							?></br>
						horaire de vente : <?php
							afficheBDD('select horaire from recette_a_vendre where idavendre=2','horaire');
							?></br>
						par : <?php
							afficheBDD('select prénom,nom from recette_a_vendre where idavendre=2','cuisto');
							?></br>
						<input type="button" class="bouton_commande" onclick="commande_plat()" value="Je commande">
					</div>
				</div>

				<div class="sous_bloc"><li class="lien" onClick="show_hide_div('plat 2')"> plat 2</li>
					<div class="volet" id="plat 2">blablablabla</div>
				</div>
			</ul>
		</div>

		<div class="bloc"><u>Témoignages :</u></br></br>
		<form method="post" action="page_profil.php">
			<p>
			<div class="sous_bloc" id="bloc_temoignage">
				<label for="monNavigateur">Choisissez un utilisateur à noter :</label></br>
				<input list="users" id="utilisateur_note" name="utilisateur_note"/>
					<datalist name="utilisateur_noté" id="users" required>
						<?php
								$requeteNom = 'SELECT identifiant FROM utilisateur';
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
					 <div class="rating">
					   <input type="radio" name="star" id="star1" value='1'><label for="star1"></label>
					   <input type="radio" name="star" id="star2" value='2'><label for="star2"></label>
					   <input type="radio" name="star" id="star3" value='3'><label for="star3"></label>
					   <input type="radio" name="star" id="star4" value='4'><label for="star4"></label>
					   <input type="radio" name="star" id="star5" value='5'><label for="star5"></label>
					   </div><br></br></br></br>
				<TEXTAREA name="texte" rows=10 cols=50 placeholder="Laissez un témoignage"></TEXTAREA></br>
				<input type="submit" onclick="envoyer()" value="Envoyer"></br></br>
			</div>
			</p>
		</form>
			<?php
				$identifiant = recupBDD('select identifiant from utilisateur where idutilisateur=3','identifiant');
				mysqli_query($cnx,'insert into temoignage values("0","'.$identifiant.'","'.$_POST['utilisateur_noté'].'","'.$_POST['note'].'","'.$_POST['texte'].'")');
				?>
			<div>
			<u>Vos retours :</u>
			<ul>
				<?php
					$id= mysqli_query($cnx,'select idtemoignage from temoignage where utilisateur_noté=(select identifiant from utilisateur where idutilisateur=3)');
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
			<input type="checkbox"  class= "checkbox"  onclick="show_blocpublic(perimetre_action)" id="perimetre_action"> Afficher vos témoignages reçus/envoyés sur votre profil public ?</br>
			</div>
		</div>
</div>
</div>
	<?php
	deconnecterBDD($cnx);
	?>
	</body>
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
	<?php deconnecterBDD($BDD); ?>
</html>
