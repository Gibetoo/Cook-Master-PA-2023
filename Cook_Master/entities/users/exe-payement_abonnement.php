<?php
session_start();

require_once __DIR__ . '/fonction_panier.php';

if (isset($_POST['abonnement']) && !empty($_POST['abonnement'])) {

    $data = array();
    $data[] = array(
        'nom' => $_POST['abonnement'],
        'prix' => $_POST['prix'],
        'quantite' => 1,
    );

    $payement = new StripePayment();

    $payement->startPayment($data, $_SESSION['user']['email'], 'entities/users/verif_paiement_abonnement?abonnement=' .$_POST['abonnement'] .'&', 'page.cestpasbon');

}
