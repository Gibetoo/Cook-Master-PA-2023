<?php

require_once __DIR__ . "/entities/users/supp_categorie.php";

if (!isset($_POST['id_cat'])) {
    header('location: index?message=Vous devez renseigner une adresse email.&type=error');
    exit;
}


$response = sendsuppCategorie($_POST['id_cat']);


if ($response["success"] == true) { // Si la création de l'utilisateur a réussi, on affecte la réponse à $results
    header('location: gestion_categorie');
    exit;
} else { // Si la création de l'utilisateur a échoué, on affecte un tableau vide à $results
    var_dump($response);
    exit;
}


header('location: index?message=Une erreur est survenue lors de la modification des droits d\'utilisateur.&type=error');
exit;
