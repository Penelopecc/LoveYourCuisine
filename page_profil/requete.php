<?php

session_start();
include '../Core.php';
$cnx=connecterBDD();

$nom = recupBDD('select nom from utilisateur where idutilisateur="'.$_SESSION['idutilisateur'].'"','nom');
$prenom = recupBDD('select prenom from utilisateur where idutilisateur="'.$_SESSION['idutilisateur'].'"','prenom');
mysqli_query($cnx,'insert into temoignage values("0","titre","image","'.$prenom.'","'.$nom.'","'.$_POST['cuisto'].'","'.$_POST['note'].'/5","'.$_POST['texte'].'")');

deconnecterBDD($cnx);

?>
