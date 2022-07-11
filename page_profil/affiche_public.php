<?php

session_start();
include '../Core.php';
$cnx=connecterBDD();


mysqli_query($cnx,"update profil_public set display='".$_POST['affiche']."' where nom='".$_POST['bloc']."'");

deconnecterBDD($cnx);

?>
