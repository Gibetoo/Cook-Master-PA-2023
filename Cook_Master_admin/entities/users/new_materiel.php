<?php


if (!isset($_POST['nom_ma']) || !isset($_POST['prix']) || empty($_POST['nom_ma']) || empty($_POST['prix']) || !isset($_FILES['image']) || empty($_FILES['image'])) {
    header('Location: ../../page.creer_materiel');
    return;
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
            header('location: ../page.materiels.php?message=Le fichier est trop lourd !.&type=danger');
            exit;
        }

        $fileName = $_FILES['image']['name'];

        if (!in_array($_FILES['image']['type'], $validExt)) {
            header('location: ../page.materiels.php?message=Le fichier n\'est pas valide !&type=danger');
            exit;
        }

        $chemin = 'upload';
        if (!file_exists($chemin)) {
            mkdir($chemin);
        }

        $chemin2 = '../../../Cook_Master/entities/users/upload';
        if (!file_exists($chemin2)) {
            mkdir($chemin2);
        }

        $array = explode('.', $fileName);
        $extension = end($array);
        $filename = 'image-' . time() . '.' . $extension;
        $destination = $chemin . '/' . $filename;
        $destination2 = $chemin2 . '/' . $filename;
        move_uploaded_file($_FILES['image']['tmp_name'], $destination);
        copy($destination, $destination2);
    }
}

if (isset($_POST['description'])) {
    $data = array(
        'nom_ma' => $_POST['nom_ma'],
        'prix' => $_POST['prix'],
        'description' => $_POST['description'],
        'image' => $filename
    ); // On récupère les données du formulaire
} else {
    $data = array(
        'nom_ma' => $_POST['nom_ma'],
        'prix' => $_POST['prix'],
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
    header('Location: ../../page.materiels');
} else { // Si la création de l'utilisateur a échoué, on affiche un message d'erreur
    echo "Erreur" . $response["error"];
}
