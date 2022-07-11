<?php

session_start();
include '../Core.php';
$cnx=connecterBDD();


mysqli_query($cnx,"update utilisateur set nom='".$_POST['nom']."',prenom='".$_POST['prenom']."',identifiant='".$_POST['identifiant']."',
			mdp='".$_POST['mdp']."',adresse='".$_POST['adresse']."', code= '".$_POST['code']."', 
			ville= '".$_POST['ville']."',tel= '".$_POST['tel']."', mail= '".$_POST['mail']."',age='".$_POST['age']."',
			nbpersonne='".$_POST['nbpersonne']."' where idutilisateur='".$_SESSION["idutilisateur"]."'");

deconnecterBDD($cnx);

?>
