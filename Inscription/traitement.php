<?php
//inclure les fonctions pour la base
include '../Core.php';
$bd=connecterBDD();
//récupération des données et les formater un peu

/* On empêche les ' de faire bugger la requête SQL d'ajout) */
$nom = str_replace("'","\'",$_POST["nom"]);
$prenom = str_replace("'","\'",$_POST["prenom"]);
$adresse = str_replace("'","\'",$_POST["adresse"]);
$identifiant = str_replace("'","\'",$_POST["identifiant"]);

/* On cherche si une personne a déjà cet identifiant */
$idRequest = "SELECT * FROM Utilisateur WHERE identifiant LIKE '%s'";
$idRequest = sprintf($idRequest,$identifiant);
$resultIdRequest = requeteBDD($db,$idRequest);
$error = "";
if (count($resultIdRequest) <> 0) {
  $error = "Un utilisateur a déjà ce pseudo, veuillez en trouver un nouveau ...";
}

$mail = str_replace("'","\'",$_POST["email"]);
$ville =str_replace("'","\'",$_POST["ville"]);
$mdp = str_replace("'","\'",$_POST["mdp"]);
$adresse = str_replace("'","\'",$_POST["adresse"]);
$tel = str_replace("'","\'",$_POST["tel"]);
$code = str_replace("'","\'",$_POST["cp"]);

/* cohérence sur l'age (qui ne correspond pas à l'année !) */
$age=intval(date("Y"))-intval($_POST["age"]);
$personnefoyer=$_POST["personnefoyer"];
$typeprofil=$_POST["typeprofil"];
$images=$_FILES['image'];
$admin="false";

if(isset($images) AND $images['error']==0)
{
  $chemin=pathinfo($images['name']);
  $extension_upload=$chemin['extension'];
  $extensions_autorisees= array('jpg','jpeg','gif','png');
  if (in_array($extension_upload, $extensions_autorisees))
  {
    /* Attribution d'un nom plus unique pour la photo de profil */
    $nomPic = str_replace(" ","",$nom);
    $prenomPic = str_replace(" ","",$prenom);
    $identifiantPic = str_replace(" ","",$identifiant);
    $newPic='photo_profil/'.$identifiantPic.$nomPic.$prenomPic.'.'.$extension_upload;
    move_uploaded_file($images['tmp_name'], $newPic);
  }
}
else {$newPic="../Inscription/photo_profil/pardefaut.png";}

//Insertion de données
echo "</br> Error = ".$error;
if (($bd<>0) && ($error==""))
{
  /* Plus propre */
  $requete = "INSERT INTO utilisateur(nom,prenom,identifiant,mdp,adresse,code,ville,tel,mail,age,nbpersonne,photo,typeUtilisateur,admin)
  VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s',%d,'%s','%s', '%s')";
  $requete = sprintf($requete,$nom,$prenom,$identifiant,$mdp,$adresse,$code,$ville,$tel,$mail,$age,$personnefoyer,$newPic,$typeprofil,$admin);

  echo $requete;

$resultat=requeteBDD($bd,$requete);

if($resultat<>FALSE)
   {
       echo "Inscription réussie, redirection ...";
       echo "<script> setTimeout(window.location.href = '../Accueil/Accueil.php', 3) </script>";

   }
   else
   {
       echo "Echec de l'enregistrement, désolé";
   }
   deconnecterBDD($bd);
}
/* correction de l'orthographe */
else {echo "Connexion perdue";}
?>
