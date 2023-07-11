<?php

require_once __DIR__ . "/entities/users/supp_metier.php";

if (!isset($_POST['id_metier'])) {
    header('location: index?message=Vous devez renseigner une adresse email.&type=error');
    exit;
}

$response = sendsuppMetier($_POST['id_metier']);
header('location: gestion_metier');
exit;
