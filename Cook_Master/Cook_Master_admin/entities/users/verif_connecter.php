<?php
if (!isset($_SESSION['user']['email'])) {
    header('location: https://cook-master.site/Cook_Master_admin/');
    exit;
}
?>