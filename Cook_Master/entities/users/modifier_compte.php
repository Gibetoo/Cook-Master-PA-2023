<?php

ini_set('display_errors', 1);

if (!isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['email'])) {
    echo "Erreur lors de la modification de l'utilisateur";
    return;
} // Si les champs email et password ne sont pas remplis, on affiche un message d'

if (isset($_POST['date_naissance']) && isset($_POST['num_tel']) && !empty($_POST['date_naissance']) && !empty($_POST['num_tel'])) {
    $data = array(
        'action' => 'modifier_compte',
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'email' => $_POST['email'],
        'date_naissance' => $_POST['date_naissance'],
        'num_tel' => $_POST['num_tel']
    ); // On récupère les données du formulaire
} else if (isset($_POST['date_naissance']) && !empty($_POST['date_naissance'])) {
    $data = array(
        'action' => 'modifier_compte',
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'email' => $_POST['email'],
        'date_naissance' => $_POST['date_naissance']
    ); // On récupère les données du formulaire
} else if (isset($_POST['num_tel']) && !empty($_POST['num_tel'])) {
    $data = array(
        'action' => 'modifier_compte',
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'email' => $_POST['email'],
        'num_tel' => $_POST['num_tel']
    ); // On récupère les données du formulaire
} else {
    $data = array(
        'action' => 'modifier_compte',
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'email' => $_POST['email']
    ); // On récupère les données du formulaire
}


$data_string = json_encode($data); // On encode les données en JSON

var_dump($data_string);

$url = 'http://127.0.0.1/Projet-Annuel/Database/'; // On définit l'URL du serveur
$ch = curl_init($url); // On initialise CURL
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); // On définit la méthode POST
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string); // On définit les données à envoyer
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // On demande à CURL de nous retourner la réponse
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json', 
        'Content-Length: ' . strlen($data_string))
); // On définit le header de la requête

$result = curl_exec($ch); // On exécute la requête
curl_close($ch); // On ferme CURL

$response = json_decode($result, true); // On décode la réponse JSON

if ($response["success"] == true) { // Si la création de l'utilisateur a réussi
    header('Location: https://cook-master.site/page.profil');
} else { // Si la création de l'utilisateur a échoué, on affiche un message d'erreur
    echo "Erreur " . $response["error"];
}