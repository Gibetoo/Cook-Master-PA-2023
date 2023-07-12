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
    header('Location: https://cook-master.site/?message=Le paiement a bien été effectué. Vous avez accès au cours.');
    exit;
}