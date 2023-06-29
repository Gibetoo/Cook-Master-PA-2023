<?php

require_once __DIR__ . "/entities/users/supp_pres.php";

if (!isset($_POST['email_pres'])) {
    header('location: index?message=Vous devez renseigner une adresse email.&type=error');
    exit;
}

$response = sendsuppPres($_POST['email_pres']);

if ($response["success"] == true) { // Si la création de l'utilisateur a réussi, on affecte la réponse à $results
    header('location: gestion_prest?message=Le prestataire a bien été supprimé.&type=success');
    exit;
} else { // Si la création de l'utilisateur a échoué, on affecte un tableau vide à $results
    var_dump($response);
    exit;
}


header('location: index?message=Une erreur est survenue lors de la modification des droits d\'utilisateur.&type=error');
exit;
