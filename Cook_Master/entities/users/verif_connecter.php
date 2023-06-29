<?php
if (!isset($_SESSION['user']['email'])) {
    if (!isset($_SESSION['user']['email_pres'])) {
        header('location: /');
        exit;
    }
}
