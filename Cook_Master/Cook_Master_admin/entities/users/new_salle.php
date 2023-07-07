<?php
ini_set('display_errors', 1);

if (!isset($_POST['nom_salle']) || !isset($_POST['num_salle']) || !isset($_POST['nb_presonne']) || !isset($_POST['prix_salle'])|| !isset($_POST['dimension']) || !isset($_POST['id_es']) ) {
    echo "Erreur";
    return;
} // Si les champs email et password ne sont pas remplis, on affiche un message d'erreur


if (isset($_POST['nom_salle']) && isset($_POST['num_salle']) && isset($_POST['nb_presonne']) && isset($_POST['prix_salle']) && isset($_POST['dimension']) && isset($_POST['id_es'])) {
    $data = array(
        'nom_salle' => $_POST['nom_salle'],
        'num_salle' => $_POST['num_salle'],
        'nb_presonne' => $_POST['nb_presonne'],
        'prix_salle' => $_POST['prix_salle'],
        'dimension' => $_POST['dimension'],
        'id_es' => $_POST['id_es'],
        
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
Var_dump($result);

$response = json_decode($result, true); // On décode la réponse JSON
var_dump($response);
if ($response["success"] == true) { // Si la création de l'utilisateur a réussi
    header('Location: https://cook-master.site/Cook_Master_admin/gestion_salle?message=La salle a bien été ajouté&type=success');
} else { // Si la création de l'utilisateur a échoué, on affiche un message d'erreur
    echo "Erreur" . $response["error"];
}
