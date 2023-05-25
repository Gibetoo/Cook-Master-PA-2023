<?php

require_once "entities/users/get_mod_droit.php";

if (!isset($_POST['email'])) {
    header('location: index?message=Vous devez renseigner une adresse email.&type=error');
    exit;
}

try {

    $url = 'http://localhost/Projet-Annuel/Database/index?email=' . $_POST['email']; // On définit l'URL du serveur
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

    $droit = $response["message"]["role"];
} catch (Exception $e) {
    header('location: index?message=Une erreur est survenue lors de la modification des droits d\'utilisateur.&type=error');
    exit;
}

if ($droit == 'user') {
    $droit = 'admin';
} else {
    $droit = 'user';
}

$response = sendMod_droit($droit, $_POST['email']);

if ($response["success"] == true) { // Si la création de l'utilisateur a réussi, on affecte la réponse à $results
    header('location: gestion_utilisateurs');
    exit;
} else { // Si la création de l'utilisateur a échoué, on affecte un tableau vide à $results
    var_dump($response);
    exit;
}


header('location: index?message=Une erreur est survenue lors de la modification des droits d\'utilisateur.&type=error');
exit;

?>