<?php
session_start();

require_once "../../Cook_Master_admin/entities/users/mail.php";

$_SESSION['user']['panier'] = array();

unset($_SESSION['user']['panier']);

require_once 'facture.php';

if ($_GET['statuspaiemment'] === 'success') {
    header('Location: https://cook-master.site/page.valide_commande?statuspaiemment=success');
    sendmailpdf($html, $_SESSION['user']['email'], $_SESSION['user']['prenom'] . ' ' . $_SESSION['user']['nom']);
    exit;
}

header('Location: https://cook-master.site/page.panier');
exit;
?>
