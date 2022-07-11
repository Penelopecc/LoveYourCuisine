<!-- Dans la console :  php -S 127.0.0.1:8008
     Sous linux taper dans le navigateur http://127.0.0.1:8008/recette.php
-->
<?php
  session_start();
  include "../Core.php";
  include "fonctions.php";
  $connexion = connecterBDD();

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset = "utf-8" />
  <title>Nos plats</title>
  <link rel="icon" href="../Images/logo.png" />
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRz0NbXfWVy4upoIRsrqENinoUeJCZxis" type="text/javascript"></script>
  <link rel="stylesheet" href="plats.css"/>
  <script async defer type = "text/javascript" src="plats.js"></script>
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
  		?>>

  <header role="banner">

        	<div class="menu">
    				<a href="../Accueil/Accueil.php"><img id='logo' width="80px" src="../Images/logo.png"/></a>
            <div class="liens" ><a href="../Accueil/Accueil.php">Accueil</a></div>
            <div class="liens" ><a href="../Recettes/recette.php">Nos recettes</a></div>
            <div class="liens" ><a href="../Cuistos/Cuistos.php">Nos cuistos </a></div>
            <div class="liens" ><a href="../How/how.php">Comment ça marche ?</a></div>
            <div class="connexion-insciption">
              <div id="inscription" class="deconnecte" onmouseover='style.backgroundColor = "rgba(122, 143, 90, 0.3)"'  onmouseout='style.backgroundColor = "#f5f5dc"' style="visibility:visible;"><a href="../Inscription/inscription.php">Inscription</a></div>
              <div id="compte" class="connecte" onclick="document.getElementById('id01').style.display='block'" onmouseover='style.backgroundColor = "rgba(122, 143, 90, 0.3)"'  onmouseout='style.backgroundColor = "#f5f5dc"'>Mon Compte</div>
              <div id="medeconnecte" class="connecte"  style="visibility:hidden; display:none; margin-left : 5px; border-radius: 40px;" onmouseover='style.backgroundColor = "rgba(122, 143, 90, 0.3)"'  onmouseout='style.backgroundColor = "#f5f5dc"'><a href="../deconnexion.php">Déconnexion</a></div>
              </div>
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
      
  <div class="container text-center">
    <h1>Nos plats</h1>
    <p>Venez découvrir toutes nos recettes.</p><br>
    <div class="row">



        <?php
           $id = mysqli_query($connexion,'select titre from recette');
           $row = array();
           while ($a = mysqli_fetch_array($id)) {
             $row[] = $a;
           }
           $length = count($row);

           for ($i=0; $i<$length ; $i++){ ?>
             <div class="recette" class="adorez">
             <img src="<?php afficheBDD('select photo from recette where titre="'.$row[$i]['titre'].'"','photo');?>" class="image" style="width:300px; height:300px" alt="Image"/>
             <p class="titre">
             <?php
             afficheBDD('select titre from recette where titre="'.$row[$i]["titre"].'"',"titre");
             ?>
             </p>
             </div><br/>
             <?php
           }
        ?>



    </div>
  </div><br>


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




	<?php
		deconnecterBDD($connexion);
	 ?>





</body>
</html>
