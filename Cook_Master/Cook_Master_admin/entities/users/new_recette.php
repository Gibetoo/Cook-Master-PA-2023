<?php

if (
    !isset($_POST['nom_recette']) && !empty($_POST['nom_recette']) ||
    !isset($_POST['preparation']) && !empty($_POST['preparation']) ||
    !isset($_POST['description']) && !empty($_POST['description']) ||
    !isset($_POST['categorie']) && !empty($_POST['categorie']) || $_POST['categorie'] == "null"
) {
    header('Location: https://cook-master.site/Cook_Master_admin/add_recette?message=Veuillez remplir tous les champs&type=warning');
    exit;
} // Si les champs email et password ne sont pas remplis, on affiche un message d'erreur

if (!empty($_FILES['image'])) {
    if ($_FILES['image']['error'] == 0) {

        $maxSize = 500000;
        $validExt = [
            'image/jpeg',
            'image/png',
            'image/gif'
        ];

        if ($_FILES['image']['size'] > $maxSize) {
            header('location: ../add_recette.php?message=Le fichier est trop lourd !.&type=danger');
            exit;
        }

        $fileName = $_FILES['image']['name'];

        if (!in_array($_FILES['image']['type'], $validExt)) {
            header('location: ../add_recette.php?message=Le fichier n\'est pas valide !&type=danger');
            exit;
        }

        $chemin = 'upload-recette';
        if (!file_exists($chemin)) {
            mkdir($chemin);
        }

        $chemin2 = '../../../entities/users/upload-recette';
        if (!file_exists($chemin2)) {
            mkdir($chemin2);
        }

        $array = explode('.', $fileName);
        $extension = end($array);
        $filename = $_POST['nom_recette'] . '.' . $extension;
        $destination = $chemin . '/' . $filename;
        $destination2 = $chemin2 . '/' . $filename;
        move_uploaded_file($_FILES['image']['tmp_name'], $destination);
        copy($destination, $destination2);
    }
}


if (isset($_POST['nom_recette']) && isset($_POST['preparation']) && isset($_POST['description']) && isset($_POST['categorie'])) {
    $data = array(
        'nom_recette' => $_POST['nom_recette'],
        'preparation' => $_POST['preparation'],
        'description' => $_POST['description'],
        'categorie' => $_POST['categorie'],
        'image' => $filename
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
    header('Location: https://cook-master.site/Cook_Master_admin/gestion_recette?message=La recette a bien été ajouté&type=success');
} else { // Si la création de l'utilisateur a échoué, on affiche un message d'erreur
    echo "Erreur" . $response["error"];
}
