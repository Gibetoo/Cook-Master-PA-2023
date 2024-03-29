<?php

if (isset($_POST['email']) && !empty($_POST['email'])) {
    setcookie('email', $_POST['email'], time() + (24 * 3600));
}

$url = 'http://127.0.0.1/Projet-Annuel/Database/index?email=' . $_POST['email'] . '&password=' . $_POST['password']; // On définit l'URL du serveur
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
    if ($response["message"]["verification_email"] != "oui") {
        header('location: ../../page.connexion?message=Votre compte n\'est pas activé, veuillez vérifier vos mails&type=danger');
        exit;
    }
    session_start(); // On démarre la session
    $_SESSION['user'] = $response["message"]; // On stocke les données de l'utilisateur dans la session
    header('Location: ../../');
} else { // Si la création de l'utilisateur a échoué, on affiche un message d'erreur
    if ($response["error"] == "Utilisateur non trouvé") {
        header('location: ../../page.connexion?validmail=is-invalid&validpasswd=is-invalid&message=Identifiant ou mot de passe incorrect&type=danger');
        exit;
    } else if ($response["error"] == "Mot de passe incorrect") {
        header('location: ../../page.connexion?validmail=is-invalid&validpasswd=is-invalid&message=Identifiant ou mot de passe incorrect&type=danger');
        exit;
    } else {
        echo "Une erreur est survenue";
    }
}


