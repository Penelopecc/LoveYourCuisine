<?php
  include "../Core.php";
  $BDD=connecterBDD();
 ?>

<!DOCTYPE html>


<html>

 <head>
  <title>Formulaire d'inscription</title>
  <meta charset="utf-8"/>
  <script type="text/javascript" src="inscription.js"></script>
  <link rel="stylesheet" href="inscription.css" />
  <link rel="icon" href="../Images/logo.png"/>
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:700i" rel="stylesheet">
 </head>

 <body onload="lancement()">


   <header role="banner">

       	<div class="menu">
             <a href="../Accueil/Accueil.php"><img id='logo' width="80px" src="../Images/logo.png"/></a>
             <div class="liens" ><a href="../Accueil/Accueil.php">Accueil</a></div>
             <div class="liens" ><a href="../Recettes/Recettes.php">Nos recettes</a></div>
             <div class="liens" ><a href="../Cuistos/Cuistos.php">Nos cuistos </a></div>
             <div class="liens" ><a href="../How/how.php">Comment ça marche ?</a></div>


          <div class="connexion">
              				<div id="compte" onclick="document.getElementById('id01').style.display='block'" onmouseover='style.backgroundColor = "rgba(122, 143, 90, 0.3)"'  onmouseout='style.backgroundColor = "#f5f5dc"'>Mon Compte</div>
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

<!-- FORMULAIRE -->

		<div id="vide"></div>

		<form id="formulaire" name="formulaire" action='traitement.php' method="post" enctype="multipart/form-data">
			<fieldset>
				<div class="Tableau">
					<p class="legende"><span class="col1">INSCRIPTION</span>
						<span class="col2"></span>
						 <!-- Coordonnées de la personne  -->
						 <span class="col3">
						</span></p>

					<p><span class="col1">Qui êtes vous:</span>

						<span class="col2">Nom : *</span>
					     <!-- Coordonnées de la personne  -->
					     <span class="col3">
							<input type="text"  id="nom" name="nom" onblur="verifMot(nom)" placeholder="ex : Dupont" />
							</span></p>

					<p><span class="col1"> </span>
						<span class="col2">Prénom : *</span>

						<span class="col3">
							<input type="text" id="prenom" name="prenom" onblur="verifMot(prenom)" placeholder="ex : Francois" />
							</span>

						<br />

						<br />
					</p>

					<p>
						     <!-- Liste déroulante -->
						<span class="col1"> </span>
						<span class="col2">Année de naissance *:</span>
						     <span class="col3">
							<select id="age" name="age">
								<option selected>Année</option>
							</select>
					</span></p>

					<p><span class="col1"> </span>
						<span class="col2">Nombre de personne dans votre foyer :</span>
						<span class="col3">
							<select id="personnefoyer" name="personnefoyer" onload="nbPersonne();" >
								<option selected>0</option>
							</select>
					</span></p>

					<p><span class="col1">
					  Mon Compte :</span>
						<span class="col2">Identifiant : *</span>
						<span class="col3">
							<input type="text" id="identifiant" name="identifiant" onblur="verifMot(identifiant);checkIdentifiant(this)"  placeholder="ex : cuisinelover" />
						     <!-- Reçoit la réponse Ajax de si l'utilisateur existe déjà ou non -->
						     <div id="errorIdentifiant"></div>
					</span></p>

					<p><span class="col1">
						</span>
						<span class="col2">Mot de passe : *</span>
						<span class="col3">
							<input type="password" id="mdp" name="mdp" onblur="verifMot(mdp)"  placeholder="ex:123motdepasse" />
							</span></p>

					<p><span class="col1">
							</span>
							<span class="col2">

						     <!-- Boutons pour le type de profil -->
						  Mon profil :</span>
						  <span class="col3 Radiobouton">

								<span class="element1">
								<input type="radio" id="cuisto" name="typeprofil" value="cuisto" onchange="cocher()" />

								<label for="cuisto">Cuisto</label>
							</span>

							<span class="element1">
								<input type="radio" id="simple" name="typeprofil" value="simple" checked="checked" onchange="cocher()" />

								<label for="simple">Amateur</label>
							</span>
						</span>
				</span></p>

					<p><span class="col1">
							</span>
						<span class="col2">
							<div id="infocuisto"></div>
						</span>
						<span class="col3">
							<input type="file" name="image" id="photo">
							</span></p>

					<p><span class="col1">Coordonnées:</span>
						<span class="col2"></span>
						<span class="col3"></span></p>

					<p><span class="col1"></span>
						<span class="col2">Email : *</span>
						<span class="col3">
							<input type="text" id="email" name="email" onblur="verifMail(email)"  placeholder="ex : francois.dupond@gmail.com" />
							</span></p>

					<p><span class="col1"></span>
						<span class="col2">Numéro de téléphone *:</span>
						<span class="col3">
							<input type="text" id="tel" name="tel" onblur="veriftel(tel)"  placeholder="ex : 0967458765" />
							</span></p>

					<p><span class="col1"></span>
						<span class="col2">Ville : *</span>
						<span class="col3">
							<input type="text" id="ville" name="ville" onblur="verifMot(ville)"  placeholder="ex : Tokyo" />
							</span></p>

					<p><span class="col1"></span>
						<span class="col2">Code postal: *</span>
						<span class="col3">
							<input type="text" id="cp" name="cp" onblur="verifCode(cp)"  placeholder="ex : 75892" />
							</span></p>

					<p><span class="col1"></span>
						<span class="col2">Adresse: *</span>
						<span class="col3">
							<textarea rows="3" cols="50" id="adresse" name="adresse" onblur="verifAdresse(adresse)"  placeholder="ex : 8 rue pierre brossolet"></textarea>
					</span></p>

					<p><span class="col1"></span>
					    <span class="col2"></span>
					    <span class="col3">
					    <!-- Bouton d'envoi de données -->
					    <input type="button" value="Valider" onclick="valider(formulaire)" />

							</span></p>

					<p><span class="col1"></span>
						<span class="col2"></span>
						<span class="col3">
							<input  id="validation" type="submit" value="Je crée mon compte" style="visibility:hidden;" />
							</span></p>
				</div>

			<br /><span> * : Champs obligatoires </span></fieldset>
		</form>


   <!-- FIN DE PAGE -->


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
 </main>
 </body>
<?php deconnecterBDD($BDD); ?>
</html>
