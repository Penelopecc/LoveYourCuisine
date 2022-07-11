<?php include "../Core.php";

session_start();

$BDD=connecterBDD();

$titre=$_POST['titre'];
$table=$_POST['table'];

$requete ="UPDATE ".$table." SET titre='".$titre."'";
$changement=mysqli_query($BDD,$requete);

echo $titre;

deconnecterBDD($BDD);

?>
