<?php

require_once __DIR__ . "/entities/users/supp_local.php";


if (!isset($_POST['id_es'])) {
    header('location: index?message=Vous devez renseigner une adresse email.&type=error');
    exit;
}


$response = sendsuppLocal($_POST['id_es']);


if ($response["success"] == true) { // Si la création de l'utilisateur a réussi, on affecte la réponse à $results
    header('location: gestion_local?message=Le local a bien été supprimé.&type=success');
    exit;
} 


header('location: index?message=Une erreur est survenue lors de la modification des droits d\'utilisateur.&type=error');
exit;
