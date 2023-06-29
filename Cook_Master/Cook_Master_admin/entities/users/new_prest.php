<?php

require_once __DIR__ . "/get_prest.php";






if (!isset($_POST['nom_pres']) && !empty($_POST['nom_pres']) || 
!isset($_POST['prenom_pres']) && !empty($_POST['prenom_pres']) ||
!isset($_POST['num_tel_pres']) && !empty($_POST['num_tel_pres']) ||
!isset($_POST['email_pres']) && !empty($_POST['email_pres']) || 
!isset($_POST['metier']) && !empty($_POST['metier']) || $_POST['metier'] == "null" ||
!isset($_POST['photo_pres']) && !empty($_POST['photo_pres']) || 
!isset($_POST['fiche']) && !empty($_POST['fiche'])) {
    
    header('Location: https://cook-master.site/Cook_Master_admin/add_prest?message=Veuillez remplir tous les champs&type=warning');
    exit;
} // Si les champs email et password ne sont pas remplis, on affiche un message d'erreur




if (!empty($_FILES['photo_pres'])) {
    if ($_FILES['photo_pres']['error'] == 0) {

        $maxSize = 500000;
        $validExt = [
            'image/jpeg',
            'image/png',
            'image/gif'
        ];

        if ($_FILES['photo_pres']['size'] > $maxSize) {
            header('location: ../add_prest.php?message=Le fichier est trop lourd !.&type=danger');
            exit;
        }

        $fileName = $_FILES['photo_pres']['name'];

        if (!in_array($_FILES['photo_pres']['type'], $validExt)) {
            header('location: ../add_prest.php?message=Le fichier n\'est pas valide !&type=danger');
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
        move_uploaded_file($_FILES['photo_pres']['tmp_name'], $destination);
    }
}


if (!empty($_FILES['fiche'])) {
    if ($_FILES['fiche']['error'] == 0) {

        $maxSizef = 1073741824;
        $validExtf = [
            'application/pdf'
        ];

        if ($_FILES['fiche']['size'] > $maxSizef) {
            header('location: ../add_prest.php?message=Le fichier est trop lourd !.&type=danger');
            exit;
        }

        $fileNamef = $_FILES['fiche']['name'];

        if (!in_array($_FILES['fiche']['type'], $validExtf)) {
            header('location: ../add_prest.php?message=Le fichier n\'est pas valide !&type=danger');
            exit;
        }

        $cheminfile = 'upload_fiche';
        if (!file_exists($cheminfile)) {
            mkdir($cheminfile);
        }

        $arrayf = explode('.', $fileNamef);
        $extensionf = end($arrayf);
        $filenamef = 'fiche-' . time() . '.' . $extensionf;
        $destinationf = $cheminfile . '/' . $filenamef;
        move_uploaded_file($_FILES['fiche']['tmp_name'], $destinationf);
    }
}



$emailPres = htmlspecialchars($_POST['email_pres']);

$emailExists = false;
foreach ($results as $prest)
    if ($prest['email_pres'] === $emailPres) {
        $emailExists = true;
        break;
    }


if ($emailExists) {
    // L'e-mail existe déjà, afficher un message d'erreur
    header('location: https://cook-master.site/Cook_Master_admin/add_prest?message=Cet email est déjà utilisé !&type=danger');
    // Vous pouvez également rediriger l'utilisateur vers une autre page ou effectuer une autre action ici
} else {

    // Génération du mot de passe aléatoire
    $length = 10; // Longueur du mot de passe
    $randomBytes = random_bytes($length);
    $password = bin2hex($randomBytes);


        
    

    

    if (isset($_POST['nom_pres']) && isset($_POST['prenom_pres']) && isset($_POST['num_tel_pres']) && isset($_POST['email_pres']) && isset($_POST['metier']) && isset($_FILES['photo_pres']) && isset($_FILES['fiche'])) {
        $data = array(
            'nom_pres' => $_POST['nom_pres'],
            'prenom_pres' => $_POST['prenom_pres'],
            'num_tel_pres' => $_POST['num_tel_pres'],
            'email_pres' => $_POST['email_pres'],
            'password_pres' => $password,
            'metier' => $_POST['metier'],
            'photo_pres' => $filename,
            'fiche' => $filenamef

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
        // Envoi du mot de passe par e-mail
     $to = $_POST['email_pres'];
     $subject = 'Votre nouveau mot de passe';
     $message = 'Voici votre nouveau mot de passe : ' . $password;
 
     // En-têtes de l'e-mail
     require "mail.php";
     // Envoi de l'e-mail
     $mailSent = sendmail($subject,$message,$to);
        header('Location: https://cook-master.site/Cook_Master_admin/gestion_prest?message=Le prestataire a bien été ajouté&type=success');
        exit;
    } else { // Si la création de l'utilisateur a échoué, on affiche un message d'erreur
        echo "Erreur" . $response["error"];
    }
}
