function lancementconnecte()
{
  var deconec=document.getElementsByClassName("deconnecte");
  var connect=document.getElementsByClassName("connecte");
  for (var i=0 ; i<connect.length;i++)
  {
    connect[i].style.visibility="visible";
    connect[i].style.display="inline-block";
    if (connect[i].id="compte")
    {
      // Mettre la page profil quand on clic (recette cetait un test)
      connect[i].setAttribute("onclick","window.location.href='../page_profil/page_profil.php';");
    }
  }
  for (var i=0 ; i<deconec.length;i++)
  {
    deconec[i].style.visibility="hidden";
    deconec[i].style.display="none";
  }
}

/* fonction qui affiche les blocs du profil selon que l'utilisateur est un cuisto ou non*/
function show_cuisto(type){
	var volet1 = document.getElementsByClassName('volet_cuisto');
		for (i = 0; i < volet1.length; i++) {
			if (type=="cuisto")
				volet1[i].style.display="block";
			else
				volet1[i].style.display="none";
		}
	var volet2 = document.getElementsByClassName('volet_simple');
		for (i = 0; i < volet2.length; i++) {
			if (type=="cuisto")
				volet2[i].style.display="none";
			else
				volet2[i].style.display="block";
		}
}


/* fonction qui précoche les blocs qui s'affichent sur le profil public*/
function check_box(bloc, affiche){
	var box= document.getElementById(bloc);
	if(affiche=="block"){
		box.checked = true;
	}else{
		box.checked = false;
	}
}

/* fonction qui renvoie les modifications d'infos dans la bdd*/
function modif_info() {
	var nom = document.getElementById("nom").value;
	var prenom = document.getElementById("prenom").value;
	var identifiant = document.getElementById("identifiant").value;
	var mdp = document.getElementById("mdp").value;
	var adresse = document.getElementById("adresse").value;
	var code = document.getElementById("code").value;
	var ville = document.getElementById("ville").value;
	var tel = document.getElementById("tel").value;
	var mail = document.getElementById("mail").value;
	var age = document.getElementById("age").value;
	var nbpersonne = document.getElementById("nbpersonne").value;
	alert(nom);

	var xhr= new XMLHttpRequest();
	xhr.onreadystatechange= function() {
	if(xhr.readyState==4 && xhr.status==200)
		{

		  var reponse = xhr.responseText ;
		}
	  }
	   xhr.open("POST","infos.php",true) ;
	   xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded ;charset=utf-8') ;
	   xhr.send("nom="+nom+"&prenom="+prenom+"&identifiant="+identifiant
	   +"&mdp="+mdp+"&adresse="+adresse+"&code="+code+"&ville="+ville
	   +"&tel="+tel+"&mail="+mail+"&age="+age+"&nbpersonne="+nbpersonne);

    alert("Vos modifications ont  été enregistrées");
}

/* fonction qui affiche les blocs cochés sur le profil public*/
function show_blocpublic(a) {
	var bouton = document.getElementById(a);
	var bloc = bouton.value;
	var affiche = "";
		if(bouton.checked){
			affiche= "block";
		}else{
			affiche="none";
		}

	var xhr= new XMLHttpRequest();
	xhr.onreadystatechange= function() {
	if(xhr.readyState==4 && xhr.status==200)
		{

		  var reponse = xhr.responseText ;
		}
	  }
	   xhr.open("POST","affiche_public.php",true) ;
	   xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded ;charset=utf-8') ;
	   xhr.send("bloc="+bloc+"&affiche="+affiche);

}


/* focntion qui dévoile les sous-blocs cachés lorsque l'on clique sur le bloc correspondant*/
function show_hide_div(volet){
	var lediv = document.getElementById(volet);
	if(lediv.style.display=="block")
		lediv.style.display="none";
	else
		lediv.style.display="block";
}

/* focntion qui envoie le plat à publier dans la bdd*/
function publier_plat() {
	var prix = document.getElementById("prix1").value;
	var portions = document.getElementById("nombre_portions1").value;
	var date = document.getElementById("date").value;
	var heure = document.getElementById("heure").value;

	var xhr= new XMLHttpRequest();
	xhr.onreadystatechange= function() {
	if(xhr.readyState==4 && xhr.status==200)
		{

		  var reponse = xhr.responseText ;
		}
	  }
	   xhr.open("POST","plat.php",true) ;
	   xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded ;charset=utf-8') ;
	   xhr.send("prix="+prix+"&portions="+portions+"&date="+date+"&heure="+heure);

    alert("Votre plat a été publié");
}


/* fonction qui envoie un témoignage dans la bdd*/
function envoyer() {
	var cuisto = document.getElementById("utilisateur_note").value;
	var radios = document.getElementsByClassName("radio");
	var note = "";
	for(var i= 0;i< radios.length;i++){
		if(radios[i].checked){
			note = radios[i].value;
		}
	}
	var texte = document.getElementById("texte").value;

	var xhr= new XMLHttpRequest();
	xhr.onreadystatechange= function() {
	if(xhr.readyState==4 && xhr.status==200)
		{

		  var reponse = xhr.responseText ;
		}
	  }
	   xhr.open("POST","requete.php",true) ;
	   xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded ;charset=utf-8') ;
	   xhr.send("cuisto="+cuisto+"&note="+note+"&texte="+texte);

    alert("Témoignage reçu, merci!");
}


/* fonction qui renvoie un message lorsque l'on veut régler son panier*/
function payer() {
    alert("L'option régler son panier n'est pas disponible pour le moment.");
}

/* effectue le gain du cuisto en fonction du prix choisi et du nombre de portions*/
function prix_portion(a,b,c){
	var nombre_portions = document.getElementById(a).value;
	var prix = document.getElementById(b).value;
	var gain = nombre_portions*prix
	document.getElementById(c).value= gain;
}

/* Renvoie un message lorsque l'utilisateur clique sur devenir cuisto*/
function partage_repas() {
    alert("L'option devenir cuisto n'est pas disponible pour le moment.");
}

/* Renvoie un message lorsque l'utilisateur clique sur commander un plat*/
function commande_plat() {
    alert("La fonction commander un plat n'est pas disponible pour le moment");
}

/*Profil_public*/
function affiche_bloc(bloc,affiche){
	var lediv = document.getElementById(bloc);
		lediv.style.display=affiche;
}
