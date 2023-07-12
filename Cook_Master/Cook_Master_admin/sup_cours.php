<?php

require_once __DIR__ . "/entities/users/supp_cours.php";


if (!isset($_POST['id_cours'])) {
    header('location: index?message=Vous devez renseigner une adresse email.&type=error');
    exit;
}


$response = sendsuppCours($_POST['id_cours']);


if ($response["success"] == true) { // Si la création de l'utilisateur a réussi, on affecte la réponse à $results
    header('location: gestion_cours?message=Le cours a bien été supprimé.&type=success');
    exit;
} 


header('location: index?message=Une erreur est survenue.&type=error');
exit;
