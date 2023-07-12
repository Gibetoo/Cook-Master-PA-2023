<?php
session_start();

require_once __DIR__ . '/fonction_panier.php';

if (isset($_POST['id_cours']) && !empty($_POST['id_cours'])) {

    $data = array();
    $data[] = array(
        'nom' => $_POST['nom_cours'],
        'prix' => $_POST['prix'],
        'quantite' => 1
    );

    $payement = new StripePayment();

    $payement->startPayment($data, $_SESSION['user']['email'], 'entities/users/verif_paiement_cours?id_cours=' . $_POST['id_cours'] . '&', 'page.cestpasbon');
}
