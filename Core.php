<?php

  function connecterBDD()
  {
      $HOTE='mysql.etude.cergy.eisti.fr';
      $USER='lubineaude';
      $PASS='JZexAaW3mW';
      $BASE='lubineaude';
      $DBconn = mysqli_connect($HOTE,$USER,$PASS,$BASE);
      if (!$DBconn) {
            die("Erreur: " . mysqli_connect_error());
      }
      mysqli_set_charset($DBconn, "utf8");

      return $DBconn;
  }

  function deconnecterBDD($DBconn)
  {
      if (isset($DBconn)) {
          mysqli_close($DBconn);
      }
  }

 function afficheBDD ($req,$champ){
	$cnx=connecterBDD();
	$res = mysqli_query($cnx,$req);
	$row = mysqli_fetch_assoc($res);
	echo $row[$champ];
}

 function recupBDD ($req,$champ){
	$cnx=connecterBDD();
	$res = mysqli_query($cnx,$req);
	$row = mysqli_fetch_assoc($res);
	return ($row[$champ]);
}

 function requeteBDD ($BDD,$requete){
    $verif=mysqli_query($BDD, $requete);
    return $verif;
 }
?>
