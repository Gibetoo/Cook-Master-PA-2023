<?php
session_start();

require_once __DIR__ . '/fonction_panier.php';

if (isset($_SESSION['user']['panier']) && !empty($_SESSION['user']['panier'])) {

    $data = array();
    foreach ($_SESSION['user']['panier'] as $produit) {
        $data[] = array(
            'nom' => $produit['nom'],
            'prix' => $produit['prix'],
            'quantite' => $produit['quantite'],
        );
    }

    $payement = new StripePayment();

    $payement->startPayment($data, $_SESSION['user']['email'], 'entities/users/verif_paiement_achat', 'page.cestpasbon');
}


