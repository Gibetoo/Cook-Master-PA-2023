<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/users/get-users.php";
require_once __DIR__ . "/../../entities/users/get-one-user.php";

try {

    if (isset($_GET["email"]) && isset($_GET["password"])) { // Si l'API reçoit un email on récupère l'utilisateur
        $users = getOneUser($_GET["email"], $_GET["password"]);

        if (isset($users["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $users["error"]
            ]); // On renvoie un code 404 (Not Found) et l'erreur
            die();
        }

    } else { // Si l'API ne reçoit pas d'email et de mot de passe on récupère tous les utilisateurs
        $users = getUsers();
    }

    if ($users != []) { // Si l'utilisateur existe on le renvoie
        echo jsonResponse(200, [], [
            "success" => true,
            "user" => $users
        ]); // On renvoie un code 200 (OK) et l'utilisateur
        die();
    }
} catch (Exception $exception) { // Si une erreur survient on renvoie l'exception
    echo jsonResponse(500, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]); // On renvoie un code 500 (Internal Server Error) et l'erreur
}
