<?php

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
require_once __DIR__ . "/../../entities/users/create-adresse-lo.php";
require_once __DIR__ . "/../../entities/users/create-local.php";
require_once __DIR__ . "/../../entities/users/create-categorie.php";
require_once __DIR__ . "/../../entities/users/create-recette.php";
require_once __DIR__ . "/../../entities/users/create-cours.php";
require_once __DIR__ . "/../../entities/users/create-formation.php";
require_once __DIR__ . "/../../entities/users/update-formation.php";

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

        updateMateriel($body['id_ma'], $body["nom_ma"], $body["description"], $body["prix"], $body["image"]);

        $message = "Materiel modifié";
    } else if (isset($body["action"]) && ($body["action"]) == "modifier_formation") {

        updateFormation($body['id_fo'], $body["nom_fo"], $body["description"], $body["prix"]);

        $message = "Formation modifié";
    } else if (isset($body["nom_metier"])) {

        createMetier($body["nom_metier"]);

        $message = "Métier créé";
    } else if (isset($body["nom_salle"]) && isset($body["num_salle"]) && isset($body["nb_presonne"]) && isset($body["prix_salle"]) && isset($body["dimension"]) && isset($body["id_es"])) {
        createSalle($body["nom_salle"], $body["num_salle"], $body["nb_presonne"], $body["prix_salle"], $body["dimension"], $body["id_es"]);

        $message = "Salle créé";
    } else if (isset($body["etage"]) && isset($body["num_bat_es"]) && isset($body["rue_es"]) && isset($body["code_postal_es"]) && isset($body["ville_es"]) && isset($body["pays_es"])) {
        createAdresseLo($body["etage"], $body["num_bat_es"], $body["rue_es"], $body["code_postal_es"], $body["ville_es"], $body["pays_es"]);

        $message = "Adresse créé";
    } else if (isset($body["nom_es"]) && isset($body["dimension"]) && isset($body["nb_salle"]) && isset($body["id_adr"])) {
        createLocal($body["nom_es"], $body["dimension"], $body["nb_salle"], $body["id_adr"]);

        $message = "Local créé";
    } else if (isset($body["nom_cat"])) {
        createCategorie($body["nom_cat"]);

        $message = "Catégorie créé";
    } else if (isset($body["nom_recette"]) && isset($body["preparation"]) && isset($body["description"]) && isset($body["categorie"])) {
        createRecette($body["nom_recette"], $body["preparation"], $body["description"], $body["categorie"]);

        $message = "Recette créé";
    } else if (isset($body['nom_cours']) && isset($body['prix_cours']) && isset($body['description_cours']) && isset($body['recettes']) && isset($body['materiels']) && isset($body['pres_cours']) && isset($body['id_salle']) && isset($body['date']) && isset($body['heure'])) {
        createCours($body['nom_cours'], $body['prix_cours'], $body['description_cours'], $body['recettes'], $body['materiels'], $body['pres_cours'], $body['id_salle'], $body['date'], $body['heure']);

        $message = "Cours créé";
    } else if (isset($body['nom_fo']) && isset($body['description']) && isset($body['cours']) && isset($body['prix'])) {
        createFormation($body['nom_fo'], $body['description'], $body['cours'], $body['prix']);

        $message = "Formation créé";
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
