<?php 
session_start();

ini_set('display_errors', 1);

require_once __DIR__ . '/fonction_panier.php';

$paiement = new StripePayment();

if (!isset($_GET['session_id'])) {
    header('Location: https://cook-master.site/?statuspaiemment=error');
    exit;
}

if ($paiement->getPaymentStatus($_GET['session_id']) === 'paid') {
    
    header('Location: sup.panier.php?statuspaiemment=success');
    exit;
}