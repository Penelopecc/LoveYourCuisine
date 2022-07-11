<?php
include("Core.php");
$BDD = connecterBDD();
$markers='SELECT * FROM markers';
$result=mysqli_query($BDD,$markers);
$tableau=array();
$reponse = "";
if (mysqli_num_rows($result))
{
  while($ligne = mysqli_fetch_assoc($result))
  {
    $tableau[] = $ligne;
  }
}
deconnecterBDD($BDD);
for($i=0;$i<count($tableau);$i++)
{
  $reponse=$reponse.'/'.$tableau[$i]["nom"].'/'.$tableau[$i]['lat'].'/'.$tableau[$i]['lon'].'/'.$tableau[$i]['type'];
}
echo $reponse;
?>
