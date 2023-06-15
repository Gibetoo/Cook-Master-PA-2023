<?php

// Récupérer des données depuis le corps de la requête
// Faire une requête SQL pour créer un utilisateur
// Renvoyer une réponse (succès, echec) à l'utilisateur de l'API
ini_set('display_errors', 1);

require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/users/create-user.php";
require_once __DIR__ . "/../../entities/users/create-materiel.php";
require_once __DIR__ . "/../../entities/users/create-prest.php";
require_once __DIR__ . "/../../entities/users/update-user.php";
require_once __DIR__ . "/../../entities/users/update-materiel.php";
require_once __DIR__ . "/../../entities/users/create-metier.php";
require_once __DIR__ . "/../../entities/users/create-salle.php";

try {
    $body = getBody();

    if (isset($body["email"]) && isset($body["password"]) && isset($body["nom"]) && isset($body["prenom"])) {
        createUser($body["email"], $body["password"], $body["nom"], $body["prenom"]);

        $message = "utilisateur créé";
    } else if (isset($body["email_pres"]) && isset($body["password_pres"]) && isset($body["nom_pres"]) && isset($body["prenom_pres"]) && isset($body["num_tel_pres"]) && isset($body["metier"]) && isset($body["photo_pres"])) {
        createPrestataire($body["nom_pres"], $body["prenom_pres"], $body["num_tel_pres"], $body["email_pres"], $body["password_pres"], $body["metier"], $body["photo_pres"], $body["fiche"]);

        $message = "Prestataire créé";
    } else if (isset($body["nom_ma"]) && isset($body["prix"]) && isset($body["description"]) && isset($body["image"])) {

        createMateriel($body["nom_ma"], $body["description"], $body["prix"], $body["image"]);

        $message = "Materiel créé";
    } else if (isset($body["action"]) && ($body["action"]) == "modifier_compte") {

        updateUser($body["nom"], $body["prenom"], $body["email"], $body["date_naissance"], $body["num_tel"]);

        $message = "Compte modifié";
    } else if (isset($body["action"]) && ($body["action"]) == "modifier_materiel") {

        updateMateriel($body['id_ma'] ,$body["nom_ma"], $body["description"], $body["prix"], $body["image"]);

        $message = "Materiel modifié";
    }else if (isset($body["nom_metier"])) {

        createMetier($body["nom_metier"]);

        $message = "Métier créé";
    }else if (isset($body["nom_salle"]) && isset($body["num_salle"]) && isset($body["nb_presonne"]) && isset($body["prix_salle"]) && isset($body["dimension"])) {
        createSalle($body["nom_salle"], $body["num_salle"], $body["nb_presonne"], $body["prix_salle"], $body["dimension"]);

        $message = "Salle créé";
    }

    echo jsonResponse(200, [], [
        "success" => true,
        "message" => $message
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}