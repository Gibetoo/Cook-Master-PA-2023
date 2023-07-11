<?php

$cours = array();
for ($i = 0; $i < intval($_POST['counter']); $i++) {
    if (empty($_POST['cours-' . $i])) {
        continue;
    }
    $cours[] = $_POST['cours-' . $i];
}

$data = array(
    'action' => 'modifier_formation_cours',
    'cours' => (implode(', ', $cours)),
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
    header('Location: ../../page.modification_formation?id_fo=' . $_POST['id_fo'] . '');
    exit;
} else {
    return var_dump($response);
}
