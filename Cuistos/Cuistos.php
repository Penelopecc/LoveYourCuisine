<!DOCTYPE html>
<html>
<?php session_start() ?>
  <head>
    <title>Nos cuistos</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="Cuistos.css">
  	<link rel="icon" href="../Images/logo.png"/>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRz0NbXfWVy4upoIRsrqENinoUeJCZxis" type="text/javascript"></script>
    <script async defer type = "text/javascript" src="Cuistos.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:700i" rel="stylesheet">
  </head>
<body
  <?php
  		if (isset($_SESSION["idutilisateur"]))
  		{
          echo 'onload="lancementconnecte()"';
  		}
  		else
  		{
  			echo 'onload="chargerPage()"';
  		}
  		?>

>

<header role="banner">

      <div class="menu">
        <a href="../Accueil/Accueil.php"><img id='logo' width="80px" src="../Images/logo.png"/></a>
        <div class="liens" ><a href="../Accueil/Accueil.php">Accueil</a></div>
        <div class="liens" ><a href="../Recettes/recette.php">Nos recettes</a></div>
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
          <input type="text" class="connexion" placeholder="ex: GrandChef" name="identifiant" id="identifiant" required>

          <label for="psw"><b>Mot de passe</b></label>
          <input type="password" placeholder="ex: lyc123" name="mdp" required>

          <button type="submit" class="btn">Se connecter</button>
          <label>
            <input type="checkbox" checked="checked" name="remember"> Se souvenir de moi
          </label>
        </div>

      </form>
    </div>


    <?php
      include "../Core.php";
      $cnx = connecterBDD();

      // On récupère les prénoms
      $requeteNom = 'SELECT prenom FROM utilisateur WHERE idutilisateur IN (SELECT idutilisateur FROM cuisto)';
      $resNom = mysqli_query($cnx,$requeteNom);
      $tableauNom = array();
      if (mysqli_num_rows($resNom)) {
          while($ligne = mysqli_fetch_assoc($resNom)) {
                $tableauNom[] = $ligne;
          }
      }

      for ($i=0; $i<count($tableauNom); $i++){
        echo "<input type='hidden' class='noms' id='nom".$i."' value='".$tableauNom[$i]['prenom']."' />";
      }

      // On récupère les photos
      $requetePhoto = 'SELECT photo FROM utilisateur WHERE idutilisateur IN (SELECT idutilisateur FROM cuisto)';
      $resPhoto = mysqli_query($cnx,$requetePhoto);
      $tableauPhoto = array();
      if (mysqli_num_rows($resPhoto)) {
          while($ligne = mysqli_fetch_assoc($resPhoto)) {
                $tableauPhoto[] = $ligne;
          }
      }

      for ($i=0; $i<count($tableauPhoto); $i++){
        echo "<input type='hidden' class='photos' id='photo".$i."' value='".$tableauPhoto[$i]['photo']."' />";
      }

      // On récupère les descriptions
            $requeteDesc = 'SELECT description FROM cuisto';
            $resDesc = mysqli_query($cnx,$requeteDesc);
            $tableauDescription = array();
            if (mysqli_num_rows($resDesc)) {
                while($ligne = mysqli_fetch_assoc($resDesc)) {
                      $tableauDescription[] = $ligne;
                }
            }

            for ($i=0; $i < count($tableauDescription) ; $i++) {
              echo '<div class="descriptions">'.$tableauDescription[$i]["description"].'</div>';
            }




      // On récupère les spécialités
      $requeteSpec = 'SELECT specialite0,specialite1,specialite2,specialite3 FROM cuisto';
      $resSpec = mysqli_query($cnx,$requeteSpec);
      $tableauSpec = array();
      if (mysqli_num_rows($resSpec)) {
          while($ligne = mysqli_fetch_assoc($resSpec)) {
                $tableauSpec[] = $ligne;
          }
      }

      for ($i=0; $i<count($tableauSpec); $i++){
        echo "<input type='hidden' class='specialites0' id='spec0".$i."' value='".$tableauSpec[$i]["specialite0"]."' />";}
      for ($i=0; $i<count($tableauSpec); $i++){
        echo "<input type='hidden' class='specialites1' id='spec1".$i."' value='".$tableauSpec[$i]["specialite1"]."' />";}
      for ($i=0; $i<count($tableauSpec); $i++){
        echo "<input type='hidden' class='specialites2' id='spec2".$i."' value='".$tableauSpec[$i]["specialite2"]."' />";}
      for ($i=0; $i<count($tableauSpec); $i++){
        echo "<input type='hidden' class='specialites3' id='spec3".$i."' value='".$tableauSpec[$i]["specialite3"]."' />";}


    ?>

    <!-- Tableau des cuistos -->

    <!-- Introduction -->
    <h1>NOS CUISTOS</h1>

    <div class="paragraphe">Pour vous, Love Your Cuisine a sélectionné les meilleurs traiteurs. Ils cuisinent tous avec passion, des produits frais et soigneusement sélectionnés.
Chacun d’eux a son histoire, ses spécificités, et ses recettes préférées. </div>



    <!-- Présentation d'un cuisto -->
    <div class="presentation">
      <div class="vide1"></div>
      <div class="nom"> <h2 id="nomCuisto"><?php echo $tableauNom[0]["prenom"] ?></h2> </div>
      <div class="vide2"></div>
      <div class="fleches" onclick="defilerGauche()"> <img src="./Images/flecheGauche.png" width="50" id="flecheGauche"/> </div>
      <div class="photo"> <img src=<?php echo $tableauPhoto[0]["photo"]; ?> id="photoCuisto" width="75%"/> </div>
      <div class="description" id="descCuisto"> <?php echo $tableauDescription[0]['description'] ?> </div>
      <div class="fleches" onclick="defilerDroite()"> <img src="./Images/flecheDroite.png" width="50" id="flecheDroite"/> </div>
    </div>



    <!-- Spécialités -->
    <div class="specialites">
      <div class="titre_specialite">Quelques-unes de ses spécialités :</div>
      <div class="specPhotos">
        <img src=<?php echo $tableauSpec[0]["specialite0"]; ?> class="specialite" id="specialite0" height="150" alt=""/>
        <img src=<?php echo $tableauSpec[0]["specialite1"]; ?> class="specialite" id="specialite1" height="150" alt=""/>
        <img src=<?php echo $tableauSpec[0]["specialite2"]; ?> class="specialite" id="specialite2" height="150" alt=""/>
        <img src=<?php echo $tableauSpec[0]["specialite3"]; ?> class="specialite" id="specialite3" height="150" alt=""/>
      </div>
    </div>

    <br/>


    <!-- Liste des cuistos -->
    <div class="listeCuistos">
      <div class="titre"> <h2>Tous nos cuistos</h2> </div>
      <div id="photosCuistos">
        <?php
        for ($i=1; $i <count($tableauPhoto)+1 ; $i++) {
          echo '<img src="'.$tableauPhoto[$i-1]["photo"].'" id="cuisto'.$i.'" height="200" class="listePhoto" />' ;
        }
        ?>

      </div>

    </div>



    <div id='bouton'>
            <input type="button" id="bouton_recettes" value="Je découvre les recettes" onclick="window.location.href='../Recettes/recette.php';" />
    </div>

<h2 id="regardez">Regardez s'il y a des cuistos proches de chez vous !</h2>

<div id='map'>
</div>

<form id="bouton-adresse" style="visibility:hidden;" method="POST">
  	<input type="text" id="rayon" name="rayon" placeholder="Rayon d'action en m"/>
  <input type="text" id="adresse" name="adresse" placeholder="Entrer votre adresse"/>
  <input type="button"  value="Autour de moi" onclick="geolocaliser(this)"/>
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
    <div class="copyright">	&copy; LOVEYOURCUISINE 2018 </div>

    <?php
        deconnecterBDD($cnx);
     ?>
  </main>
  </body>

</html>
