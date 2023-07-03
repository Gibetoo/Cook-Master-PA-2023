<?php
ini_set('display_errors', 1);

if (!isset($_POST['nom_es']) || !isset($_POST['dimension'])|| !isset($_POST['nb_salle']) || !isset($_POST['id_adr']) ) {
    echo "y'a r ici";
    return;
} // Si les champs email et password ne sont pas remplis, on affiche un message d'erreur

if (isset($_POST['nom_es']) && isset($_POST['dimension']) && isset($_POST['nb_salle']) && isset($_POST['id_adr'])) {
    $data = array(
        'nom_es' => $_POST['nom_es'],
        'dimension' => $_POST['dimension'],
        'nb_salle' => $_POST['nb_salle'],
        'id_adr' => $_POST['id_adr']
        
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
    header('Location: http://51.210.241.29/Projet-Annuel/Cook_Master_admin/gestion_local?message=Le local a bien été ajouté&type=success');
} else { // Si la création de l'utilisateur a échoué, on affiche un message d'erreur
    echo "Erreur" . $response["error"];
}
