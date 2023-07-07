<?php
session_start(); // Assurez-vous que la session est démarrée

$_SESSION['user']['panier'] = array();

unset($_SESSION['user']['panier']);

if ($_GET['statuspaiemment'] === 'success') {
    header('Location: https://cook-master.site/index.php?statuspaiemment=success');
    exit;
}

header('Location: https://cook-master.site/page.panier');

?>
