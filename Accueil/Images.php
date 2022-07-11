<?php include "../Core.php";

session_start();

$BDD=connecterBDD();

$image=$_POST['image'];
$table=$_POST['table'];

$requete ="UPDATE ".$table." SET image='Images/".$image."'";
$changement=mysqli_query($BDD,$requete);

echo $requete;

deconnecterBDD($BDD);

?>
