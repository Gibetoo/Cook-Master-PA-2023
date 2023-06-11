<?php
if (!isset($_SESSION['user']['email'])) {
    header('location: /Projet-Annuel/Cook_Master_admin/');
    exit;
}
?>