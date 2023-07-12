<?php


require_once __DIR__ . "/entities/users/supp_salle.php";

if (!isset($_POST['id_salle'])) {
    header('location: index?message=Vous devez renseigner une adresse email.&type=error');
    exit;
}

$response = sendsuppSalle($_POST['id_salle']);


if ($response["success"] == true) { // Si la création de l'utilisateur a réussi, on affecte la réponse à $results
    header('location: gestion_salle');
    exit;
} else { // Si la création de l'utilisateur a échoué, on affecte un tableau vide à $results
    header('location: index?message=Une erreur est survenue.&type=error');
    exit;
}

header('location: index?message=Une erreur est survenue lors de la modification des droits d\'utilisateur.&type=error');
exit;

