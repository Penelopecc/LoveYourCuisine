function annee()
{
  var annees=new Array();
  annees[0]="2018";
  var valeur=2017;
  for (i=1; i<=50;i++)
  {
    annees[i]=""+valeur;
    valeur=(valeur-1);
  }
  var liste=document.getElementById('age');
  for (var i =0; i<annees.length; i++)
  {
    var option = document.createElement('option');
    //var valeur= document.createTextNode(annees[i]);
    var valeur=""+annees[i];
    option.value = valeur;
    option.innerHTML = valeur;
    //option.appendChild(valeur);
    liste.appendChild(option);

  }
 }

/* fonction qui véridie via Ajax si l'identifiant est déjà en BDD */
 function checkIdentifiant(identifiant)
 {
   var xhr = new XMLHttpRequest();

   xhr.onreadystatechange = function()
   {
     if(xhr.readyState==4 && xhr.status==200)
     {
       reponse = xhr.responseText ;
       var zone = document.getElementById('errorIdentifiant');
       zone.innerHTML=reponse;
     }
   }
   id = identifiant.value;
    xhr.open("POST","checkIdentifiant.php",true) ;
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded ;charset=utf-8') ;
    xhr.send("identifiant="+id+"&isValid=true");
 }

 function nbPersonne()
 {

   var nbPersonnes=new Array();
   nbPersonnes[0]="1";
   var valeur=2;
   for (i=1; i<=20;i++)
   {
     nbPersonnes[i]=""+valeur;
     valeur++;
   }
   var liste=document.getElementById('personnefoyer');
   for (var i =0; i<nbPersonnes.length; i++)
   {
     var option = document.createElement('option');
     var valeur= document.createTextNode(nbPersonnes[i]);
     option.appendChild(valeur);
     liste.appendChild(option);
   }
  }

  function lancement()
  {
    annee()
    nbPersonne()
    cocher()
    var liens=document.getElementsByClassName("liens");
    for (var i=0 ; i<liens.length;i++)
    {
      liens[i].setAttribute("onmouseover",'style.backgroundColor = "rgba(122, 143, 90, 0.3)"');
      liens[i].setAttribute("onmouseout", 'style.backgroundColor = "#f5f5dc"');
    }
  }


 function cocher()
 {
   var coche = document.getElementById("cuisto");
   var decoche = document.getElementById("simple");
   var info =document.getElementById("infocuisto");

   if (coche.checked==true)
   {
     info.innerHTML="<label> un mail va vous être envoyé pour les modalités </label> <br/><br/><br/><label> photo de profils : * </label><br/><br/>";
   }
   else{
     info.innerHTML = "<br/><label>Photo de profil :  </label><br/><br/>";
   }
 }

 function surligne(champ, erreur)
{
   if(erreur)
      champ.style.backgroundColor = "#fba";
   else
      champ.style.backgroundColor = "";
}

 function verifMot(champ)
 {
    if(champ.value.length < 2 || champ.value.length > 25)
    {
       surligne(champ, true);
       return false;
    }
    else
    {
       surligne(champ, false);
       return true;
    }
 }


 function verifMail(champ)
 {
    var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;
    if(!regex.test(champ.value))
    {
       surligne(champ, true);
       return false;
    }
    else
    {
       surligne(champ, false);
       return true;
    }
 }

 function verifAdresse(champ)
 {
    var regex = /^\d{1,3}(([,.]?\s){1}\w+)*$/;
    if(!regex.test(champ.value))
    {
       surligne(champ, true);
       return false;
    }
    else
    {
       surligne(champ, false);
       return true;
    }
 }
 function veriftel(champ)
 {
    var regex = /^(\+33|0)[1-9]([ /\.-]?[0-9]{2}){4}$/;
    if(!regex.test(champ.value))
    {
       surligne(champ, true);
       return false;
    }
    else
    {
       surligne(champ, false);
       return true;
    }
 }


function verifCode(code_postal)
{
  var regex = /^[1-9]([ /\.-]?[0-9]){4}$/;
  if(!regex.test(code_postal.value))
  {
     surligne(code_postal, true);
     return false;
  }
  else
  {
     surligne(code_postal, false);
     return true;
  }
}

function veriflist(list)
{
  var test= list.value;
  if (test =="0" || test=="Année")
  {
     return false;
  }
  else
  {
     return true;
  }
}

 function valider(f)
 {
    var nomOk = verifMot(f.nom);
    var prenomOk = verifMot(f.prenom);
    var identifiantOk = verifMot(f.identifiant);
    var mailOk = verifMail(f.email);
    var villeOk = verifMot(f.ville);
    var mdpOk = verifMot(f.mdp);
    var adresseOk = verifAdresse(f.adresse);
    var telOk = veriftel(f.tel);
    var codeOk = verifCode(f.cp);
    var nbPersonneOk=veriflist(f.personnefoyer);
    var ageOk=veriflist(f.age);

    if(identifiantOk && mailOk && villeOk && mdpOk && adresseOk && telOk && codeOk && nomOk && prenomOk && nbPersonneOk && ageOk )
       validation.style.visibility="visible";
    else
    {
       alert("Veuillez remplir correctement tous les champs");
    }
 }
