<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/users/get-users.php";
require_once __DIR__ . "/../../entities/users/get-one-user.php";
require_once __DIR__ . "/../../entities/users/get-one-user&pass.php";
require_once __DIR__ . "/../../entities/users/get-materiels.php";
require_once __DIR__ . "/../../entities/users/change-droit.php";

try {

    if (isset($_GET['demande']) && isset($_GET['email']) && isset($_GET['droit']) && $_GET['demande'] == 'change_mod') {
        $change = changeDroit($_GET['email'], $_GET['droit']);

        if (isset($change["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $change["error"]
            ]); // On renvoie un code 404 (Not Found) et l'erreur
            die();
        }

        $message = $change;
    } else if (isset($_GET["email"]) && isset($_GET["password"])) { // Si l'API reçoit un email on récupère l'utilisateur
        $users = getOneUserPass($_GET["email"], $_GET["password"]);

        if (isset($users["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $users["error"]
            ]); // On renvoie un code 404 (Not Found) et l'erreur
            die();
        }

        $message = $users;
    } else if (isset($_GET["email"])) {
        $users = getOneUser($_GET["email"]);

        if (isset($users["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $users["error"]
            ]); // On renvoie un code 404 (Not Found) et l'erreur
            die();
        }

        $message = $users;
    } else if (isset($_GET['demande']) && $_GET['demande'] == 'materiels') {

        $materiels = getMateriel();

        $message = $materiels;
    } else { // Si l'API ne reçoit pas d'email et de mot de passe on récupère tous les utilisateurs
        $users = getUsers();

        $message = $users;
    }

    echo jsonResponse(200, [], [
        "success" => true,
        "message" => $message
    ]); // On renvoie un code 200 (OK) et l'utilisateur

} catch (Exception $exception) { // Si une erreur survient on renvoie l'exception
    echo jsonResponse(500, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]); // On renvoie un code 500 (Internal Server Error) et l'erreur
}
