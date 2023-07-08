<?php

ini_set('display_errors', 1);

require_once __DIR__ . "/../../Cook_Master_admin/entities/users/get_users.php";
require_once __DIR__ . "/savekey.php";
require_once "../../Cook_Master_admin/entities/users/mail.php";


if (!isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['nom']) || !isset($_POST['prenom'])|| !isset($_POST['conf_password'])) {
    header('location: /page.inscription.php?message=Veuillez remplir tous les champs.&type=danger');
    exit;
} // Si les champs email et password ne sont pas remplis, on affiche un message d'erreur


$uppercase = preg_match('@[A-Z]@', $_POST['password']);
$lowercase = preg_match('@[a-z]@', $_POST['password']);
$number = preg_match('@[0-9]@', $_POST['password']);

//On applique les contraintes dans un if
if (!$uppercase || !$lowercase || !$number || strlen($_POST['password']) < 8) {
    header('location: /page.inscription.php?message=Le mot de passe doit contenir au moins 8 caractères, composé d\'une majuscule, une minuscule et un chiffre.&type=danger');
    exit;
}

if ($_POST['conf_password'] != $_POST['password']) {
    header('location: /page.inscription.php?message=Merci de vérifier la saisie de votre mot de passes.&type=danger');
    exit;
}

$email = htmlspecialchars($_POST['email']);

$emailExists = false;
foreach ($results as $user)
    if ($user['email'] === $email) {
        $emailExists = true;
        break;
    }


if ($emailExists) {
    // L'e-mail existe déjà, afficher un message d'erreur
    header('location: https://cook-master.site/page.inscription.php?message=Cet email est déjà utilisé !&type=danger');
    // Vous pouvez également rediriger l'utilisateur vers une autre page ou effectuer une autre action ici
} else{

$data = array(
    'email' => $_POST['email'],
    'password' => $_POST['password'],
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom']
); // On récupère les données du formulaire

$data_string = json_encode($data); // On encode les données en JSON

$url = 'http://127.0.0.1/Projet-Annuel/Database/'; // On définit l'URL du serveur
$ch = curl_init($url); // On initialise CURL
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST"); // On définit la méthode POST
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string); // On définit les données à envoyer
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // On demande à CURL de nous retourner la réponse
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json', 
        'Content-Length: ' . strlen($data_string))
); // On définit le header de la requête

$result = curl_exec($ch); // On exécute la requête
curl_close($ch); // On ferme CURL

$response = json_decode($result, true); // On décode la réponse JSON

if ($response["success"] == true) { // Si la création de l'utilisateur a réussi
    function getRandomKey($n)
{
    // Stockez toutes les lettres possibles dans une chaîne.
    $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomKey = '';

    // Générez un index aléatoire de 0 à la longueur de la chaîne -1.
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($str) - 1);
        $randomKey .= $str[$index];
    }

    return $randomKey;
}

    $code = getRandomKey(25);
    $reponse = savekey($_POST['email'],$code);

    $sujet = 'Activation de votre compte';

    require_once "message_inscrit.php";

    header('Location: https://cook-master.site/?message=Votre compte à bien été enregistrée, vous allez recevoir un mail pour valider votre compte et pouvoir vous connecter&type=success');
    sendmail($sujet, $message, $_POST['email']);
    exit();
} else {
    echo "Erreur " . $response["error"];
    exit();
}
}