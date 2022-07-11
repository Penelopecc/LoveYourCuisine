<?php

session_start();
include '../Core.php';
$cnx=connecterBDD();


$adresse = recupBDD('select adresse from utilisateur where idUtilisateur="'.$_SESSION['idutilisateur'].'"','adresse');
$code=  recupBDD('select code from utilisateur where idUtilisateur="'.$_SESSION['idutilisateur'].'"','code');
$ville= recupBDD('select ville from utilisateur where idUtilisateur="'.$_SESSION['idutilisateur'].'"','ville');
$lieu= $adresse.", ".$code.", ".$ville;
$titre = recupBDD('select titre from recette where idrecette=2','titre');
$photo = recupBDD('select photo from recette where idrecette=2','photo');
$nom = recupBDD('select nom from  utilisateur where idutilisateur="'.$_SESSION['idutilisateur'].'"','nom');
$prenom = recupBDD('select prenom from  utilisateur where idutilisateur="'.$_SESSION['idutilisateur'].'"','prenom');
							
mysqli_query($cnx,"insert into recette_a_vendre values('0','".$titre."','".$photo."',".$_POST['prix'].",
".$_POST['portions'].",'".$lieu."','".$_POST['date']."','".$_POST['heure']."','".$nom."','".$prenom."')");

deconnecterBDD($cnx);

?>
