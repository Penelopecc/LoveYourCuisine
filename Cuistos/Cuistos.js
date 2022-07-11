
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
      connect[i].setAttribute("onclick","window.location.href='../page_profil/page_profil.php';");
    }
  }
  for (var i=0 ; i<deconec.length;i++)
  {
    deconec[i].style.visibility="hidden";
    deconec[i].style.display="none";
  }
  chargerPage();
}

// Carte de géolocalisation
function lancerGeoMarker(element)
{
  var xhr = new XMLHttpRequest();
  var reponse;

  xhr.onreadystatechange = function()
  {
    if(xhr.readyState==4 && xhr.status==200)
    {
      reponse = xhr.responseText ;
      var tableau = reponse.split("/");
      for (var i = 1 ; i<tableau.length;i++)
      {
        var nom = tableau[i];
        var lat = tableau[i+1];
        var lon = tableau[i+2];
        var type = tableau[i+3];
        var i =i+3;
        var marker = new google.maps.Marker(
        {
          map: map,
          position: new google.maps.LatLng(lat,lon),
          title : nom,
        });
        infowindow = new google.maps.InfoWindow(
        {
          content: type
        });
        google.maps.event.addListener(marker, "click", function ()
        {
          infowindow.open(map, marker);
        });
      }
    }
  }
   xhr.open("POST","../lancerGeo.php",true) ;
   xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded ;charset=utf-8') ;
   xhr.send(null);
}



/* On initialise le centre de la carte */
var lat = 49.036425;
var lon = 2.080174;
var map = null;


/*Fonction qui initialise la carte */
function initMap()
{
  map = new google.maps.Map(document.getElementById("map"),
  {
	 // Nous plaçons le centre de la carte avec les coordonnées ci-dessus
	 center: new google.maps.LatLng(lat, lon),
	 // Nous définissons le zoom par défaut
	 zoom: 11,
		// Nous définissons le type de carte (ici carte routière)
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		// Nous activons les options de contrôle de la carte (plan, satellite...)
		mapTypeControl: true,
		// Nous désactivons la roulette de souris
		scrollwheel: false,
		mapTypeControlOptions:
    {
  		// Cette option sert à définir comment les options se placent
  		style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR
		},
		// Activation des options de navigation dans la carte (zoom...)
		navigationControl: true,
		navigationControlOptions:
    {
  		// Comment ces options doivent-elles s'afficher
  		style: google.maps.NavigationControlStyle.ZOOM_PAN
		}
    });
    var infoWindow = new google.maps.InfoWindow({map: map});
    if (navigator.geolocation) {
     navigator.geolocation.getCurrentPosition(function(position) {
       var pos = {
         lat: position.coords.latitude,
         lng: position.coords.longitude
       };

       infoWindow.setPosition(pos);
       infoWindow.setContent('Vous êtes ici');
       map.setCenter(pos);
       var zoneAction = new google.maps.Circle({
        strokeColor: '#7a8f5a',
        strokeOpacity: 0.8,
        strokeWeight: 2,
        fillColor: '#8FBC8F',
        fillOpacity: 0.35,
        map: map,
        center: pos,
        radius:10000
      });
     });
   }
   var bouton=document.getElementById("bouton-adresse");
   bouton.style.visibility="visible";
  }




function ajouterOnClick() {
  var cuistos = document.getElementById("photosCuistos");
  var photos = cuistos.getElementsByTagName("img");
  for (var i=0; i<photos.length; i++) {
    photos[i].onclick = regarderCuisto;
  }
}


function chargerTableaux(){
  // Tableau noms
  var noms = document.getElementsByClassName('noms');
  var tableauNomTest = [];
  for (var i = 0; i < noms.length; i++) {
    tableauNomTest[i] = noms[i].value;
  }
  // Tableau photos
  var photos = document.getElementsByClassName('photos');
  var tableauPhotoTest = [];
  for (var i = 0; i < photos.length; i++) {
    tableauPhotoTest[i] = photos[i].value;
  }
  // Tableau descriptions
  var descriptions = document.getElementsByClassName('descriptions');
  var tableauDescTest = [];
  for (var i = 0; i < descriptions.length; i++) {
    tableauDescTest[i] = descriptions[i].innerHTML;
  }
  // Tableaux des spécialités
  var specialites0 = document.getElementsByClassName('specialites0');
  var specialites1 = document.getElementsByClassName('specialites1');
  var specialites2 = document.getElementsByClassName('specialites2');
  var specialites3 = document.getElementsByClassName('specialites3');
  var tableauSpec0 = [];
  var tableauSpec1 = [];
  var tableauSpec2 = [];
  var tableauSpec3 = [];
  for (var i = 0; i < specialites0.length; i++) {
    tableauSpec0[i] = specialites0[i].value;}
  for (var i = 0; i < specialites1.length; i++) {
    tableauSpec1[i] = specialites1[i].value;}
  for (var i = 0; i < specialites2.length; i++) {
    tableauSpec2[i] = specialites2[i].value;}
  for (var i = 0; i < specialites3.length; i++) {
    tableauSpec3[i] = specialites3[i].value;}
  return [tableauNomTest,tableauPhotoTest,tableauDescTest,tableauSpec0,tableauSpec1,tableauSpec2,tableauSpec3];
}

tableaux = [];


function lancement()
{
  var liens=document.getElementsByClassName("liens");
  for (var i=0 ; i<liens.length;i++)
  {
    liens[i].setAttribute("onmouseover",'style.backgroundColor = "rgba(122, 143, 90, 0.3)"');
    liens[i].setAttribute("onmouseout", 'style.backgroundColor = "#f5f5dc"');
  }
}

function chargerPage(){
  tableaux = chargerTableaux();
  tableauNom = tableaux[0];
  tableauPhoto = tableaux[1];
  tableauDescription = tableaux[2];
  tableauSpec0 = tableaux[3];
  tableauSpec1 = tableaux[4];
  tableauSpec2 = tableaux[5];
  tableauSpec3 = tableaux[6];
  ajouterOnClick();
  lancement();
  initMap();
  lancerGeoMarker();
}

var idCuisto = 1;
var charger = 0;

function changerCuisto(numero) {
  var nom = document.getElementById("nomCuisto");
  nom.innerHTML = tableauNom[numero-1];

  //  Changement de photo
  var photo = document.getElementById("photoCuisto");
  photo.setAttribute("src",tableauPhoto[numero-1]);

  // Changement de description
  var desc = document.getElementById("descCuisto");
  desc.innerHTML = tableauDescription[numero-1];

  // Changement de spécialités
  var specialite0 = document.getElementById("specialite0");
  var specialite1 = document.getElementById("specialite1");
  var specialite2 = document.getElementById("specialite2");
  var specialite3 = document.getElementById("specialite3");
  specialite0.setAttribute("src",tableauSpec0[numero-1]);
  specialite1.setAttribute("src",tableauSpec1[numero-1]);
  specialite2.setAttribute("src",tableauSpec2[numero-1]);
  specialite3.setAttribute("src",tableauSpec3[numero-1]);

  // Changement d'encadrement
  var image = document.getElementById("cuisto"+idCuisto);
  //image.setAttribute("border","none");
  image.style.border = "none";
  idCuisto = numero;
  newID = "cuisto"+idCuisto;
  var nouvelleImage = document.getElementById(newID);
  nouvelleImage.style.border = "solid";
  nouvelleImage.style.borderColor = '#138D00';
}


function defilerDroite() {
  if (idCuisto <  tableauNom.length) {
    changerCuisto(idCuisto+1);}
  else {
    changerCuisto(1);}
}

function defilerGauche() {
  if (idCuisto > 1) {
    changerCuisto(idCuisto-1);}
  else {
    changerCuisto(tableauNom.length);}
}


function regarderCuisto() {
  var photo = this;
  var identifCuisto = photo.getAttribute("id");
  var numeroCuisto = identifCuisto.substring(6);
  var nombreCuisto = parseInt(numeroCuisto);
  changerCuisto(nombreCuisto);
}


/* Carte de géolocalisation */

function reloadMap(lat,lon,adresse)
{
  map.setCenter(new google.maps.LatLng(lat, lon));
  var marker = new google.maps.Marker(
  {
    map: map,
    position: new google.maps.LatLng(lat,lon)
  });
  infowindow = new google.maps.InfoWindow(
  {
    content: adresse
  });
  google.maps.event.addListener(marker, "click", function ()
  {
    infowindow.open(map, marker);
  });
  var zoneAction = new google.maps.Circle({
   strokeColor: '#7a8f5a',
   strokeOpacity: 0.8,
   strokeWeight: 2,
   fillColor: '#8FBC8F',
   fillOpacity: 0.35,
   map: map,
   center: pos,
   radius:rayon
 });
}



function geolocaliser(element)
{
  var xhr = new XMLHttpRequest();
  var objet = element.parentNode;
  var rayon = objet.getElementsByTagName('input')[0].value;
  var adresse = objet.getElementsByTagName('input')[1].value;
  xhr.onreadystatechange = function()
  {
    if(xhr.readyState==4 && xhr.status==200)
    {
      reponse = xhr.responseText ;
      var tableau=reponse.split('/');
      var lat= tableau[0];
      var lon= tableau[1];
      var adresse=tableau[2];
      var rayon = tableau[3];
      reloadMap(lat,lon,adresse,rayon);
    }
  }
   xhr.open("POST","../geolocaliser.php",true) ;
   xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded ;charset=utf-8') ;
   xhr.send("rayon="+rayon+"&adresse="+adresse) ;
}
