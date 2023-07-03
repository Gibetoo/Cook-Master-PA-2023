<?php

ini_set('display_errors', 1);

require_once __DIR__ . "/entities/users/get_ban_prest.php";

if (!isset($_POST['email_pres'])) {
    header('location: index?message=Vous devez renseigner une adresse email.&type=error');
    exit;
}

$url = 'http://127.0.0.1/Projet-Annuel/Database/index?email_pres=' . $_POST['email_pres']; // On définit l'URL du serveur
$ch = curl_init($url); // On initialise CURL
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); // On définit la méthode GET
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // On demande à CURL de nous retourner la réponse
curl_setopt(
    $ch,
    CURLOPT_HTTPHEADER,
    array(
        'Content-Type: application/json'
    )
); // On définit le header de la requête

$result = curl_exec($ch); // On exécute la requête
curl_close($ch); // On ferme CURL

$response = json_decode($result, true); // On décode la réponse JSON

$ban = $response["message"]["ban"];

if ($ban == '0') {
    $ban = '1';
} else {
    $ban = '0';
}

$response = sendbanprest($ban, $_POST['email_pres']);

if ($response["success"] == true) { // Si la création de l'utilisateur a réussi, on affecte la réponse à $results
    header('location: gestion_prest');
    exit;
} else { // Si la création de l'utilisateur a échoué, on affecte un tableau vide à $results
    var_dump($response);
    exit;
}


header('location: index?message=Une erreur est survenue lors de la modification des droits d\'utilisateur.&type=error');
exit;
