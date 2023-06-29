<?php
function savekey($email, $code)
{
    $url = 'http://127.0.0.1/Projet-Annuel/Database/index?demande=savekey&email=' . $email . '&code=' . $code; // On définit l'URL du serveur
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

    if ($response["success"] == true) { // Si la création de l'utilisateur a réussi, on affecte la réponse à $results
        return $response["message"];
    } else { // Si la création de l'utilisateur a échoué, on affecte un tableau vide à $results
        echo "Ntm y'a rien la " . $response["error"];
        exit();
    }
}