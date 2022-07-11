<?php include "../Core.php";

session_start();

$BDD=connecterBDD();

$texte=$_POST['texte'];
$texte=str_replace('"','\\"',$texte);
$table=$_POST['table'];

$requete ="UPDATE ".$table." SET texte=\"".$texte."\"";
$changement=mysqli_query($BDD,$requete);

echo $texte;

deconnecterBDD($BDD);

?>
