<?php 
session_start();

require_once __DIR__ . '/fonction_panier.php';

$paiement = new StripePayment();

if (!isset($_GET['session_id'])) {
    header('Location: https://cook-master.site/?statuspaiemment=error');
    exit;
}

if ($paiement->getPaymentStatus($_GET['session_id']) === 'paid') {
    $_SESSION['user']['panier_tmp'] = array();
    $_SESSION['user']['panier_tmp'] = $_SESSION['user']['panier'];
    $_SESSION['user']['panier_tmp']['dateTime'] = date("d-m-Y");
    header('Location: sup.panier.php?statuspaiemment=success');
    exit;
}