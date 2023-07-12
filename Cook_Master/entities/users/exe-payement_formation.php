<?php
session_start();

require_once __DIR__ . '/fonction_panier.php';
require_once __DIR__ . '/get-formation-user.php';

$formation = getFormationUser($_SESSION['user']['email']);

if ($formation == NULL) {
    header('Location: https://cook-master.site/?message=Vous avez déjà une formation');
    exit;
}

if (isset($_GET['nom_fo']) && !empty($_GET['nom_fo'])) {

    $data = array();
    $data[] = array(
        'nom' => $_GET['nom_fo'],
        'prix' => $_GET['prix'],
        'quantite' => 1
    );

    $payement = new StripePayment();

    $payement->startPayment($data, $_SESSION['user']['email'], 'entities/users/verif_paiement_formation?id_fo=' . $_GET['id_fo'] . '&', 'page.cestpasbon');
}
