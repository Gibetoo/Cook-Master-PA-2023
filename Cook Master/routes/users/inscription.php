<?php 

if (!isset($_POST['email']) || !isset($_POST['password'])) {
    echo "Erreur lors de la création de l'utilisateur";
    return;
}

$url = 'http://10.211.55.6/Projet-Annuel/Cook%20Master%20admin/Database/routes/users/post.php';
$data = array('email' => $_POST['email'], 'password' => $_POST['password']);
$data_string = json_encode($data);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string))
);

$result = curl_exec($ch);
curl_close($ch);

$response = json_decode($result, true);

if ($response['success'] == true) {
    header("Location: ../../index.php");
} else {
    echo "Erreur lors de la création de l'utilisateur";
}