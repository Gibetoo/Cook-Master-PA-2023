<?php

if (isset($_POST['domicile'])) {
    $data = $_POST;

    $redirectUrl = '../../add_cours_recap';

    $redirectUrl .= '?' . http_build_query($data);

    header("Location: $redirectUrl");
    exit;
} else if (isset($_POST['local'])) {
    header('Location: ../../add_cours_locaux');
} else {
    header('Location: ../../add_cours_materiel');
}
