<?php

function getFormationUser($email)
{
    $url = 'http://localhost/Projet-Annuel/Database/index?demande=formation_user&email=' . $email; // On définit l'URL du serveur
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
        return [];
    }
}
