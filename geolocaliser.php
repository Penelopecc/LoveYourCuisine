<?php
function geocode($address)
{
  $address = urlencode($address);
  $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyBRz0NbXfWVy4upoIRsrqENinoUeJCZxis";
	//obtient la réponse json
	$resp_json = file_get_contents($url);
  // decode le json
  $resp = json_decode($resp_json, true);
  // response status will be 'OK', if able to geocode given address
  if($resp['status']=='OK')
	{

  	// On récupère les données utiles
  	$lati = isset($resp['results'][0]['geometry']['location']['lat']) ? $resp['results'][0]['geometry']['location']['lat'] : "";
  	$longi = isset($resp['results'][0]['geometry']['location']['lng']) ? $resp['results'][0]['geometry']['location']['lng'] : "";
  	$formatted_address = isset($resp['results'][0]['formatted_address']) ? $resp['results'][0]['formatted_address'] : "";

    // Vérifie que les données sont complètes
    if($lati && $longi && $formatted_address)
	  {
    //On stock les données dans un tableau
    $data_arr = array();

    array_push(
        $data_arr,
        $lati,
        $longi,
        $formatted_address
        );
    return $data_arr;
	  }
	  else
	  {
     return false;
    }
  }
  else
  {
    return false;
  }
}

if($_POST)
{
  $rayon=$_POST['rayon'];
  $data_arr = geocode($_POST['adresse']);
  if($data_arr)
	{
    $latitude = $data_arr[0];
    $longitude = $data_arr[1];
    $formatted_address = $data_arr[2];
    echo $latitude.'/'.$longitude.'/'.$formatted_address.'/'.$rayon;
    // Affiche au cas ou l'adresse est introuvable :
   }
	else
	{
    echo "<span style='margin-left : 30%;'>Aucune adresse trouvée.</span>";
  }
 }


?>
