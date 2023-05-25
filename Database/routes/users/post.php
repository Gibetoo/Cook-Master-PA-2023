<?php

// Récupérer des données depuis le corps de la requête
// Faire une requête SQL pour créer un utilisateur
// Renvoyer une réponse (succès, echec) à l'utilisateur de l'API
ini_set('display_errors', 1);

require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/users/create-user.php";
require_once __DIR__ . "/../../entities/users/create-materiel.php";

try {
    $body = getBody();

    if (isset($body["email"]) || isset($body["password"]) || isset($body["nom"]) || isset($body["prenom"])) {
        createUser($body["email"], $body["password"], $body["nom"], $body["prenom"]);

        $message = "utilisateur créé";

    } else if (isset($body["nom_ma"]) || isset($body["prix"]) || isset($body["description"])) {
        
        createMateriel($body["nom_ma"], $body["description"], $body["prix"]);

        $message = "Materiel créé";

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
