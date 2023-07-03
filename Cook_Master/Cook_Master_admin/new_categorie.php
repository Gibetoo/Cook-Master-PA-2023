<?php
ini_set('display_errors', 1);

if (!isset($_POST['nom_cat']) && !isset($_POST['description_cat'])) {
    header('Location: https://cook-master.site/Cook_Master_admin/add_prest?message=Veuillez remplir tous les champs&type=warning');
    exit;
    
} // Si les champs email et password ne sont pas remplis, on affiche un message d'erreur

if (isset($_POST['nom_cat']) && !empty($_POST['nom_cat']) && isset($_POST['description_cat']) && !empty($_POST['description_cat'])) {
    $data = array(
        'nom_cat' => $_POST['nom_cat'],
        'description_cat' => $_POST['description_cat']
        
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
    header('Location: https://cook-master.site/Cook_Master_admin/gestion_metier?message=Le metier a bien été ajouté&type=success');
} else { // Si la création de l'utilisateur a échoué, on affiche un message d'erreur
    echo "Erreur" . $response["error"];
}