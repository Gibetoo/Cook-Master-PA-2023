<?php

if (!isset($_POST['action']) || empty($_POST['action']) || $_POST['action'] == 'action') {
    header('Location: ../../page.materiels');
    return;
} // Si les champs email et password ne sont pas remplis, on affiche un message d'erreur

if ($_POST['action'] == "supprimer") {
    $url = 'http://127.0.0.1/Projet-Annuel/Database/index?demande=supp&id_ma=' . $_POST['id_ma']; // On définit l'URL du serveur
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
        header('Location: ../../page.materiels');
        exit;
    } else { // Si la création de l'utilisateur a échoué, on affecte un tableau vide à $results
        return $response["error"];
    }
}

if ($_POST['action'] == "modifier") {
    header('Location: ../../page.modification_materiel?id_ma=' . $_POST['id_ma']);
    exit;
}
