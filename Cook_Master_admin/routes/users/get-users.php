<?php

$url = 'http://10.211.55.6/Projet-Annuel/Database/index'; // On définit l'URL du serveur
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

if ($response["success"] == true) { // Si la création de l'utilisateur a réussi
    session_start(); // On démarre la session
    $_SESSION['user'] = $response["user"]; // On stocke les données de l'utilisateur dans la session
    header('Location: http://10.211.55.6/Projet-Annuel/Cook%20Master/');
} else { // Si la création de l'utilisateur a échoué, on affiche un message d'erreur
    if ($response["error"] == "Utilisateur non trouvé") {
        header('location: ../../page.connexion?validmail=is-invalid');
        exit;
    } else if ($response["error"] == "Mot de passe incorrect") {
        header('location: ../../page.connexion?validpasswd=is-invalid');
        exit;
    } else {
        echo "Une erreur est survenue";
    }
}
