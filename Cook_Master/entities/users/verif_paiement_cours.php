<?php 
session_start();

require_once __DIR__ . '/fonction_panier.php';
require_once __DIR__ . '/ajout-cours-user.php';

$paiement = new StripePayment();

if (!isset($_GET['?session_id'])) {
    header('Location: https://cook-master.site/?statuspaiemment=probleme_session_id');
    exit;
}

if ($paiement->getPaymentStatus($_GET['?session_id']) === 'paid' && isset($_GET['id_cours']) && !empty($_GET['id_cours'])) {
    $result = AddCoursUser($_GET['id_cours'], $_SESSION['user']['email']);
    var_dump($result);
    // header('Location: https://cook-master.site/page.profil.php?statuspaiemment=success');
    exit;
}

if ($paiement->getPaymentStatus($_GET['?session_id']) === 'paid') {
    header('Location: https://cook-master.site/page.profil.php?statuspaiemment=success');
    exit;
}