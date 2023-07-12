<?php

    $data = array(
        'action' => 'modifier_cours',
        'nom_cours' => $_POST['nom_cours'],
        'description' => $_POST['description'],
        'prix' => $_POST['prix'],
        'date'=> $_POST['date'],
        'heure'=> $_POST['heure'],
        'id_cours' => $_POST['id_cours']
        
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
        header('Location: ../../gestion_cours');
        exit;
    } else { // Si la création de l'utilisateur a échoué, on affecte un tableau vide à $results
        echo "Erreur lors de la modification du cours";
    }

?>