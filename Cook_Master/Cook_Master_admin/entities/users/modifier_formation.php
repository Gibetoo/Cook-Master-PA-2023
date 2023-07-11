<?php

$data = array(
    'action' => 'modifier_formation',
    'nom_fo' => $_POST['nom_fo'],
    'description' => $_POST['description'],
    'prix' => $_POST['prix'],
    'id_fo' => $_POST['id_fo']
);

$data_string = json_encode($data);


$url = 'http://127.0.0.1/Projet-Annuel/Database/';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string); // On définit les données à envoyer
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
curl_setopt(
    $ch,
    CURLOPT_HTTPHEADER,
    array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string)
    )
);

$result = curl_exec($ch); 
curl_close($ch);

$response = json_decode($result, true);

if ($response["success"] == true) {
    header('Location: ../../gestion_formation');
    exit;
} else {
    return var_dump($response);
}
