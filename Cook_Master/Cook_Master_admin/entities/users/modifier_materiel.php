<?php

if (!empty($_FILES['image'])) {
        if ($_FILES['image']['error'] == 0) {

            $maxSize = 500000;
            $validExt = [
                'image/jpeg',
                'image/png',
                'image/gif'
            ];

            if ($_FILES['image']['size'] > $maxSize) {
                header('location: ../page.materiels?message=Le fichier est trop lourd !.&type=danger');
                exit;
            }

            $fileName = $_FILES['image']['name'];

            if (!in_array($_FILES['image']['type'], $validExt)) {
                header('location: ../page.materiels?message=Le fichier n\'est pas valide !&type=danger');
                exit;
            }

            $chemin = 'upload';
            if (!file_exists($chemin)) {
                mkdir($chemin);
            }

            $array = explode('.', $fileName);
            $extension = end($array);
            $filename = 'image-' . time() . '.' . $extension;
            $destination = $chemin . '/' . $filename;
            move_uploaded_file($_FILES['image']['tmp_name'], $destination);
        }
    }

    if (empty($_FILES['image'])) {
        $filename = $_POST['ancienne_image'];
    }

    $data = array(
        'action' => 'modifier_materiel',
        'nom_ma' => $_POST['nom_ma'],
        'description' => $_POST['description'],
        'prix' => $_POST['prix'],
        'image' => $filename
    ); // On récupère les données du formulaire

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

    if ($response["success"] == true) { // Si la création de l'utilisateur a réussi, on affecte la réponse à $results
        header('Location: ../../page.materiels');
        exit;
    } else { // Si la création de l'utilisateur a échoué, on affecte un tableau vide à $results
        return var_dump($response);
    }

?>