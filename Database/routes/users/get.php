<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/users/get-users.php";
require_once __DIR__ . "/../../entities/users/get-one-user.php";
require_once __DIR__ . "/../../entities/users/get-one-user&pass.php";
require_once __DIR__ . "/../../entities/users/get-materiels.php";
require_once __DIR__ . "/../../entities/users/change-droit.php";
require_once __DIR__ . "/../../entities/users/change-ban.php";
require_once __DIR__ . "/../../entities/users/sup_user.php";
require_once __DIR__ . "/../../entities/users/sup_materiel.php";
require_once __DIR__ . "/../../entities/users/get-prest.php";
require_once __DIR__ . "/../../entities/users/get-formation.php";
require_once __DIR__ . "/../../entities/users/get-metier.php";
require_once __DIR__ . "/../../entities/users/sup_prest.php";
require_once __DIR__ . "/../../entities/users/change-ban-prest.php";
require_once __DIR__ . "/../../entities/users/get-one-prest.php";
require_once __DIR__ . "/../../entities/users/sup_metier.php";


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
    } else if (isset($_GET['demande']) && isset($_GET['email']) && isset($_GET['ban']) && $_GET['demande'] == 'change_ban') {
        $ban = changeBan($_GET['ban'], $_GET['email']);

        if (isset($change["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $ban["error"]
            ]); // On renvoie un code 404 (Not Found) et l'erreur
            die();
        }

        $message = $ban;
    } else if (isset($_GET['demande']) && isset($_GET['email']) && $_GET['demande'] == 'supp') {
        $supp = supUser($_GET['email']);

        if (isset($supp["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $supp["error"]
            ]); // On renvoie un code 404 (Not Found) et l'erreur
            die();
        }

        $message = $supp;
    } else if (isset($_GET['demande']) && isset($_GET['id_ma']) && $_GET['demande'] == 'supp') {
        $supp = supMateriel($_GET['id_ma']);

        if (isset($supp["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $supp["error"]
            ]); // On renvoie un code 404 (Not Found) et l'erreur
            die();
        }

        $message = $supp;
    } else if (isset($_GET["email"]) && isset($_GET["password"]) && isset($_GET["droit"])) { // Si l'API reçoit un email on récupère l'utilisateur
        $users = getOneUserPass($_GET["email"], $_GET["password"]);

        if (isset($users["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $users["error"]
            ]); // On renvoie un code 404 (Not Found) et l'erreur
            die();
        }

        $message = $users;
    
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
    } else if (isset($_GET['demande']) && isset($_GET['id_ma']) && $_GET['demande'] == 'materiels') {

        $materiels = getMaterielById($_GET['id_ma']);

        if (isset($materiels["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $materiels["error"]
            ]); // On renvoie un code 404 (Not Found) et l'erreur
            die();
        }

        $message = $materiels;
    } else if (isset($_GET['demande']) && $_GET['demande'] == 'materiels') {

        $materiels = getMateriel();

        if (isset($materiels["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $materiels["error"]
            ]); // On renvoie un code 404 (Not Found) et l'erreur
            die();
        }

        $message = $materiels;
    } else if (isset($_GET['demande']) && $_GET['demande'] == 'formation') {

        $formation = getFormation();

        if (isset($formation["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $formation["error"]
            ]); // On renvoie un code 404 (Not Found) et l'erreur
            die();
        }

        $message = $formation;

    } else if (isset($_GET['demande']) && $_GET['demande'] == 'prestataires') {

        $prest = getPrest();

        $message = $prest;

    } else if (isset($_GET['demande']) && isset($_GET['id_metier']) && $_GET['demande'] == 'prestataire') {

        $prest = getIdPrest($_GET['id_metier']);

        $message = $prest;

    }else if (isset($_GET['demande']) && $_GET['demande'] == 'metier') {

        $metier = getMetier();

        $message = $metier;

    }else if (isset($_GET['demande']) && isset($_GET['nom_metier']) && $_GET['demande'] == 'supp_metier') {
        $supp_metier = supMetier($_GET['nom_metier']);

        if (isset($supp_metier["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $supp_metier["error"]
            ]); // On renvoie un code 404 (Not Found) et l'erreur
            die();
        }

        $message = $supp_metier;
    } else if (isset($_GET['demande']) && isset($_GET['email_pres']) && $_GET['demande'] == 'supp_pres') {
        $supp_pres = supPres($_GET['email_pres']);

        if (isset($supp["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $supp["error"]
            ]); // On renvoie un code 404 (Not Found) et l'erreur
            die();
        }

        $message = $supp_pres;
    } else if (isset($_GET["email_pres"])) {
        $users = getOnePres($_GET["email_pres"]);

        if (isset($users["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $users["error"]
            ]); // On renvoie un code 404 (Not Found) et l'erreur
            die();
        }

        $message = $users;
    } else if (isset($_GET['demande']) && isset($_GET['email_prest']) && isset($_GET['ban']) && $_GET['demande'] == 'change_ban_prest') {
        $ban = changeBanPrest($_GET['ban'], $_GET['email_prest']);

        if (isset($change["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $ban["error"]
            ]); // On renvoie un code 404 (Not Found) et l'erreur
            die();
        }

        $message = $ban;
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
