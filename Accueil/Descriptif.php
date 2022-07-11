<?php include "../Core.php";

session_start();

$BDD=connecterBDD();

$texte=$_POST['texte'];
$texte=str_replace('"','\\"',$texte);
$table=$_POST['table'];
$id=$_POST['id'];

$requete ="UPDATE ".$table." SET texte=\"".$texte."\" WHERE id=".$id;
$changement=mysqli_query($BDD,$requete);

echo $texte;

deconnecterBDD($BDD);

?>
