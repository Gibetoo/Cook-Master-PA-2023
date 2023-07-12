<?php
session_start();

require_once __DIR__ . '/fonction_panier.php';
require_once __DIR__ . '/ajout-formation-user.php';
require_once "../../Cook_Master_admin/entities/users/mail.php";
require_once "inscription-formation.php";

$paiement = new StripePayment();

if (!isset($_GET['?session_id'])) {
    header('Location: https://cook-master.site/?statuspaiemment=probleme_session_id');
    exit;
}

if ($paiement->getPaymentStatus($_GET['?session_id']) === 'paid' && isset($_GET['id_fo']) && !empty($_GET['id_fo'])) {
    AddFormationUser($_GET['id_fo'], $_SESSION['user']['email']);
    header('Location: https://cook-master.site/page.profil?statuspaiemment=success');
    sendmailpdf($html, $_SESSION['user']['email'], $_SESSION['user']['prenom'] . ' ' . $_SESSION['user']['nom'], 'Confirmation de paiement de la formation');
    exit;
}
