<!-- Dans la console :  php -S 127.0.0.1:8008
     Sous linux taper dans le navigateur http://127.0.0.1:8008/recette.php
-->


<?php



function listeBDD ($id, $requete, $id_nom) {
  $row = array();
  while( $a = mysqli_fetch_array($id)){
      $row[] = $a;
  }
  $length = count($row);

  for ($i = 0; $i < $length ; $i++){
      afficheBDD($requete.$row[$i][$id_nom]."'",'nom');
      echo ", ";
  }
  echo "<br/><br/>";
}


 ?>
