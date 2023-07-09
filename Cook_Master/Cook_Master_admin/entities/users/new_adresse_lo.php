<?php

if (!isset($_POST['etage']) || !isset($_POST['num_bat_es'])|| !isset($_POST['rue_es']) || !isset($_POST['code_postal_es']) || !isset($_POST['ville_es']) || !isset($_POST['pays_es']) ) {
    echo "erreur";
    return;
} // Si les champs email et password ne sont pas remplis, on affiche un message d'erreur

if (isset($_POST['etage']) && isset($_POST['num_bat_es']) && isset($_POST['rue_es']) && isset($_POST['code_postal_es']) && isset($_POST['ville_es']) && isset($_POST['pays_es'])) {
    $data = array(
        'etage' => $_POST['etage'],
        'num_bat_es' => $_POST['num_bat_es'],
        'rue_es' => $_POST['rue_es'],
        'code_postal_es' => $_POST['code_postal_es'],
        'ville_es' => $_POST['ville_es'],
        'pays_es' => $_POST['pays_es']
        
    ); // On récupère les données du formulaire
}


$data_string = json_encode($data); // On encode les données en JSON

$url = 'http://127.0.0.1/Projet-Annuel/Database/'; // On définit l'URL du serveur
$ch = curl_init($url); // On initialise CURL
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); // On définit la méthode POST
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string); // On définit les données à envoyer
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // On demande à CURL de nous retourner la réponse
curl_setopt(
    $ch,
    CURLOPT_HTTPHEADER,
    array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string)
    )
); // On définit le header de la requête

$result = curl_exec($ch); // On exécute la requête
curl_close($ch); // On ferme CURL

$response = json_decode($result, true); // On décode la réponse JSON

if ($response["success"] == true) { // Si la création de l'utilisateur a réussi
    header('Location: https://cook-master.site/Cook_Master_admin/gestion_adresse_lo?message=L\'adresse a bien été ajouté&type=success');
} else { // Si la création de l'utilisateur a échoué, on affiche un message d'erreur
    echo "Erreur" . $response["error"];
}
