<?php
include '../Core.php';
  try {
    (isset($_POST["isValid"]));
    $db = connecterBDD();
    $identifiant = $_POST["identifiant"];

    $idRequest = "SELECT * FROM utilisateur WHERE identifiant LIKE '%s'";
    $idRequest = sprintf($idRequest,$identifiant);
    $resultIdRequest = requeteBDD($db,$idRequest);
    $error = "";
    deconnecterBDD($db);
    if (count(mysqli_fetch_assoc($resultIdRequest)) <> 0) {
      $error = "Un utilisateur a déjà ce pseudo, veuillez en trouver un nouveau ...";
      $error;
    } else {
      $error = "C'est tout bon";
    }
  } catch (\Exception $e) {
    $error = "Accès non autorisé";
  }

  if (strlen($identifiant) < 3) {
    $error = "Identifiant trop court";
  }

  echo $error;

  ?>
