<?php



if (!isset($_POST['nom_fo']) || !isset($_POST['description']) || !isset($_POST['cours']) || !isset($_POST['prix'])) {
    header('Location: ../../page.creer_formation?message=erreur&type=danger');
    exit();
}

$data = array(
    'nom_fo' => $_POST['nom_fo'],
    'description' => $_POST['description'],
    'prix' => $_POST['prix'],
    'cours' => $_POST['cours']
);

$data_string = json_encode($data);

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
    header('Location: https://cook-master.site/Cook_Master_admin/page.formation?message=La formation a bien été ajouté&type=success');
    exit;
} else { // Si la création de l'utilisateur a échoué, on affiche un message d'erreur
    echo "Erreur" . $response["error"];
}