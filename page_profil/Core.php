<!-- Dans la console :  php -S 127.0.0.1:8008
     Sous linux taper dans le navigateur http://127.0.0.1:8008/Accueil.php
-->

<?php

  function connecterBDD()
  {
      $HOTE='mysql.etude.cergy.eisti.fr';
      $USER='cessacpene';
      $PASS='gFSdtVg9nB';
      $BASE='cessacpene';
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

  function requeteBDD ($DBconn,$requete)
  {
    $result = mysqli_query($DBconn, $requete);
    return $result;
  }


?>
