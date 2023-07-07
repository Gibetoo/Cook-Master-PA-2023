<?php 
session_start();

ini_set('display_errors', 1);

require_once __DIR__ . '/fonction_panier.php';
require_once __DIR__ . '/update-abonnement.php';

$paiement = new StripePayment();

if (!isset($_GET['?session_id'])) {
    header('Location: https://cook-master.site/?statuspaiemment=probleme_session_id');
    exit;
}

if ($paiement->getPaymentStatus($_GET['?session_id']) === 'paid' && isset($_GET['abonnement']) && !empty($_GET['abonnement'])) {
    UpdateAbonnement($_GET['abonnement'], $_SESSION['user']['email']);
    header('Location: https://cook-master.site/page.profil.php?statuspaiemment=success');
    exit;
}

if ($paiement->getPaymentStatus($_GET['?session_id']) === 'paid') {
    
    header('Location: https://cook-master.site/page.profil.php?statuspaiemment=success');
    exit;
}