<?php

if (isset($_POST['nom_cours']) && isset($_POST['prix_cours']) && isset($_POST['description_cours']) && isset($_POST['recettes']) && isset($_POST['materiels']) && isset($_POST['pres_cours']) && isset($_POST['id_salle']) && isset($_POST['date']) && isset($_POST['heure'])) {
    $data = array(
        'nom_cours' => $_POST['nom_cours'],
        'prix_cours' => $_POST['prix_cours'],
        'description_cours' => $_POST['description_cours'],
        'recettes' => $_POST['recettes'],
        'materiels' => $_POST['materiels'],
        'pres_cours' => $_POST['pres_cours'],
        'id_salle' => $_POST['id_salle'],
        'date' => $_POST['date'],
        'heure' => $_POST['heure']

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
    header('Location: https://cook-master.site/Cook_Master_admin/page.cours&recette?message=Le local a bien été ajouté&type=success');
} else { // Si la création de l'utilisateur a échoué, on affiche un message d'erreur
    echo "Erreur" . $response["error"];
}
