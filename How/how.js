// Carte de géolocalisation
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

function typeMarker(map,marker,infowindow)
{
  infowindow.open(map, marker);
}


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
        i=i+3;
        var marker = new google.maps.Marker(
        {
          map: map,
          position: new google.maps.LatLng(lat,lon),
          title : nom
        });
        var infowindow = new google.maps.InfoWindow({
          content: type
        });
        marker.addListener('click', typeMarker(map,marker,infowindow));

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
	 zoom: 10,
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
    if (navigator.geolocation)
    {
     navigator.geolocation.getCurrentPosition(function(position)
     {
       var pos =
       {
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



function lancementAdmin()
{
  var liens=document.getElementsByClassName("liens");
  for (var i=0 ; i<liens.length;i++)
  {
    liens[i].setAttribute("onmouseover",'style.backgroundColor = "rgba(122, 143, 90, 0.3)"');
    liens[i].setAttribute("onmouseout", 'style.backgroundColor = "#f5f5dc"');
  }
  initMap();
  lancerGeoMarker();
  lancementconnecte();
}



/* Carte de géolocalisation */

function reloadMap(lat,lon,adresse,rayon)
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
   center: new google.maps.LatLng(lat,lon),
   radius: parseInt(rayon)
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

function chargerPage()
{
  initMap();
  lancerGeoMarker();
}
