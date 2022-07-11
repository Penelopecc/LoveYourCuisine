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

/* Partie Administrateur */

function lancementAdmin()
{
  var bouton=document.getElementsByClassName("close");
  var liens=document.getElementsByClassName("liens");
  for (var i=0 ; i<bouton.length;i++)
  {
    bouton[i].setAttribute("onmouseover",'style.backgroundColor = "#7a8f5a"');
    bouton[i].setAttribute("onmouseout", 'style.backgroundColor = "#f5f5dc"');
    bouton[i].setAttribute("onclick",'fermer(this)');
    bouton[i].style.visibility="visible";
  }
  for (var i=0 ; i<liens.length;i++)
  {
    liens[i].setAttribute("onmouseover",'style.backgroundColor = "rgba(122, 143, 90, 0.3)"');
    liens[i].setAttribute("onmouseout", 'style.backgroundColor = "#f5f5dc"');
  }
  lancementconnecte();
}

// POP-UP Connexion

// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function modifier_texte(element)
{
  var objet=element;
  var idObjet =objet.id;
  var parent=objet.parentNode;
  var zoneTexte=parent.getElementsByTagName("textarea");
  var bouton=parent.getElementsByTagName("input");
  if (zoneTexte[0].className=="bouton-invisible")
  {
    zoneTexte[0].className="bouton-visible";
    bouton[0].className="bouton-visible";
  }
}


function modifier_image(element)
{
  var objet=element;
  var idObjet =objet.id;
  var parent=objet.parentNode;
  var enfant=parent.getElementsByTagName("input");
  for (var i =0 ; i<enfant.length;i++)
  {
    if (enfant[i].className=="bouton-invisible")
    {
    enfant[i].className="bouton-visible";
    }
  }
}



function changer_texte(element)
{
  var xhr = new XMLHttpRequest();
  var objet = element.parentNode.parentNode;
  var texte=objet.getElementsByTagName('textarea')[0].value;
  var table = objet.getElementsByTagName('textarea')[0].name;
  var fenetre=objet.getElementsByTagName('textarea')[0];
  var bouton=objet.getElementsByTagName('input')[0];
  xhr.onreadystatechange = function()
  {
    if(xhr.readyState==4 && xhr.status==200)
    {
      reponse = xhr.responseText ;
      var zone = objet.getElementsByTagName('span')[0];
      zone.innerHTML=reponse;
      fenetre.className="bouton-invisible";
      bouton.className="bouton-invisible";
    }
  }
   xhr.open("POST","Textes.php",true) ;
   xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded ;charset=utf-8') ;
   xhr.send("texte="+texte+"&table="+table) ;
}


function changer_descriptif(element)
{
  var xhr = new XMLHttpRequest();
  var objet = element.parentNode.parentNode;
  var texte=objet.getElementsByTagName('textarea')[0].value;
  var table = objet.getElementsByTagName('textarea')[0].name;
  var id=objet.getElementsByTagName('textarea')[0].id;
  var fenetre=objet.getElementsByTagName('textarea')[0];
  var bouton=objet.getElementsByTagName('input')[0];
  xhr.onreadystatechange = function()
  {
    if(xhr.readyState==4 && xhr.status==200)
    {
      reponse = xhr.responseText ;
      var zone = objet.getElementsByTagName('span')[0];
      zone.innerHTML=reponse;
      fenetre.className="bouton-invisible";
      bouton.className="bouton-invisible";
    }
  }
   xhr.open("POST","Descriptif.php",true) ;
   xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded ;charset=utf-8') ;
   xhr.send("texte="+texte+"&table="+table+"&id="+id) ;
}


function changer_titre(element)
{
  var xhr = new XMLHttpRequest();
  var objet = element.parentNode.parentNode;
  var titre=objet.getElementsByTagName('textarea')[0].value;
  var table = objet.getElementsByTagName('textarea')[0].name;
  var fenetre=objet.getElementsByTagName('textarea')[0];
  var bouton=objet.getElementsByTagName('input')[0];
  xhr.onreadystatechange = function()
  {
    if(xhr.readyState==4 && xhr.status==200)
    {
      reponse = xhr.responseText ;
      var zone = objet.getElementsByTagName('span')[0];
      zone.innerHTML=reponse;
      fenetre.className="bouton-invisible";
      bouton.className="bouton-invisible";
    }
  }
   xhr.open("POST","Titres.php",true) ;
   xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded ;charset=utf-8') ;
   xhr.send("titre="+titre+"&table="+table) ;
}


function bouton(element)
{
  var objet=element;
  var idObjet = objet.id;
  var enfants = objet.getElementsByTagName("img");
  if (enfants[0].className=="bouton-invisible")
  {
    enfants[0].className="bouton-visible";
  }
  else
  {
    enfants[0].className="bouton-invisible";
  }
}


function boutonImage(element)
{
  var objet=element;
  var parentObjet=objet.parentNode;
  var enfants = parentObjet.getElementsByTagName("input");
  enfants[0].className="bouton-visible";
  enfants[1].className="bouton-visible";
}



function fermer(element)
{
  var bouton = element;
  var nom= bouton.parentNode.className;
  var fenetre= document.getElementsByClassName(nom);
  if(fenetre.length== 1 && nom =="content-block")
  {
   fenetre[0].parentNode.parentNode.removeChild(fenetre[0].parentNode);
  }
  else
  {
   fenetre[0].parentNode.removeChild(fenetre[0]);
  }
}


/* Partie Accueil client */

function lancement()
{
  var liens=document.getElementsByClassName("liens");
  for (var i=0 ; i<liens.length;i++)
  {
    liens[i].setAttribute("onmouseover",'style.backgroundColor = "rgba(122, 143, 90, 0.3)"');
    liens[i].setAttribute("onmouseout", 'style.backgroundColor = "#f5f5dc"');
  }
}
