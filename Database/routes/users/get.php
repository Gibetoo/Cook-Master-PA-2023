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
require_once __DIR__ . "/../../entities/users/get-adresse-lo.php";
require_once __DIR__ . "/../../entities/users/sup_adresse_lo.php";
require_once __DIR__ . "/../../entities/users/get-local.php";
require_once __DIR__ . "/../../entities/users/get-one-adresse-lo.php";
require_once __DIR__ . "/../../entities/users/sup_local.php";
require_once __DIR__ . "/../../entities/users/get-salle.php";
require_once __DIR__ . "/../../entities/users/get-one-local.php";
require_once __DIR__ . "/../../entities/users/sup_salle.php";
require_once __DIR__ . "/../../entities/users/savekey.php";
require_once __DIR__ . "/../../entities/users/get-cours.php";
require_once __DIR__ . "/../../entities/users/get-categorie.php";
require_once __DIR__ . "/../../entities/users/get-recettes.php";
require_once __DIR__ . "/../../entities/users/get-one-categorie.php";
require_once __DIR__ . "/../../entities/users/sup_categorie.php";

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
    } else if (isset($_GET['demande']) && $_GET['demande'] == 'recettes') {

        $recettes = getRecettes();

        if (isset($materiels["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $recettes["error"]
            ]); // On renvoie un code 404 (Not Found) et l'erreur
            die();
        }

        $message = $recettes;
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

    } else if (isset($_GET['demande']) && $_GET['demande'] == 'cours') {

        $Cours = getCours();

        if (isset($Cours["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $Cours["error"]
            ]); // On renvoie un code 404 (Not Found) et l'erreur
            die();
        }

        $message = $Cours;

    } else if (isset($_GET['demande']) && $_GET['demande'] == 'prestataires') {

        $prest = getPrest();

        $message = $prest;

    } else if (isset($_GET['demande']) && isset($_GET['id_metier']) && $_GET['demande'] == 'prestataire') {

        $prestid = getIdPrest($_GET['id_metier']);

        $message = $prestid;

    }else if (isset($_GET['demande']) && $_GET['demande'] == 'metier') {

        $metier = getMetier();

        $message = $metier;

    }else if (isset($_GET['demande']) && isset($_GET['id_metier']) && $_GET['demande'] == 'supp_metier') {
        $supp_metier = supMetier($_GET['id_metier']);

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

        if (isset($supp_pres["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $supp_pres["error"]
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

        if (isset($ban["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $ban["error"]
            ]); // On renvoie un code 404 (Not Found) et l'erreur
            die();
        }

        $message = $ban;
    } else if (isset($_GET['demande']) && $_GET['demande'] == 'adresse_lo') {

        $adresse = getAdresse();

        if (isset($adresse["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $adresse["error"]
            ]); // On renvoie un code 404 (Not Found) et l'erreur
            die();
        }

        $message = $adresse;
    }else if (isset($_GET['demande']) && isset($_GET['id_adr']) && $_GET['demande'] == 'supp_adresse_lo') {
        $supp_adresse = supAdresselo($_GET['id_adr']);

        if (isset($supp_adresse["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $supp_adresse["error"]
            ]); // On renvoie un code 404 (Not Found) et l'erreur
            die();
        }

        $message = $supp_adresse;
    }else if (isset($_GET['demande']) && $_GET['demande'] == 'local') {

        $local = getLocal();

        if (isset($local["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $local["error"]
            ]); // On renvoie un code 404 (Not Found) et l'erreur
            die();
        }

        $message = $local;
    } else if (isset($_GET['demande']) && isset($_GET['id_adr']) && $_GET['demande'] == 'one_adresse_lo') {

        $oneAdresse = getOneAdresseLo($_GET['id_adr']);

        $message = $oneAdresse;

    }else if (isset($_GET['demande']) && isset($_GET['id_es']) && $_GET['demande'] == 'supp_local') {
        $supp_local = supLocal($_GET['id_es']);

        if (isset($supp_local["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $supp_local["error"]
            ]); // On renvoie un code 404 (Not Found) et l'erreur
            die();
        }

        $message = $supp_local;
    }else if (isset($_GET['demande']) && $_GET['demande'] == 'salle') {

        $salle = getsalle();

        if (isset($salle["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $salle["error"]
            ]); // On renvoie un code 404 (Not Found) et l'erreur
            die();
        }

        $message = $salle;
    }else if (isset($_GET['demande']) && isset($_GET['id_es']) && $_GET['demande'] == 'one_local') {

        $oneLocal = getOnelocal($_GET['id_es']);

        $message = $oneLocal;

    }else if (isset($_GET['demande']) && isset($_GET['id_salle']) && $_GET['demande'] == 'supp_salle') {
        $supp_salle = supSalle($_GET['id_salle']);

        if (isset($supp_salle["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $supp_salle["error"]
            ]); // On renvoie un code 404 (Not Found) et l'erreur
            die();
        }

        $message = $supp_salle;
    } else if (isset($_GET['demande']) && isset($_GET['email']) && isset($_GET['code']) && $_GET['demande'] == 'savekey') {
        $savekey = savekey($_GET['email'], $_GET['code']);

        if (isset($savekey["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $savekey["error"]
            ]); // On renvoie un code 404 (Not Found) et l'erreur
            die();
        }

        $message = $savekey;
    }else if (isset($_GET['demande']) && $_GET['demande'] == 'categorie') {

        $categorie = getCategorie();

        $message = $categorie;

    }else if (isset($_GET['demande']) && isset($_GET['id_cat']) && $_GET['demande'] == 'one_categorie') {

        $oneCategorie = getOneCategorie($_GET['id_cat']);

        $message = $oneCategorie;

    }else if (isset($_GET['demande']) && isset($_GET['id_cat']) && $_GET['demande'] == 'supp_categorie') {
        $supp_categorie = supCategorie($_GET['id_cat']);

        if (isset($supp_categorie["error"])) { // Si l'utilisateur n'existe pas
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $supp_categorie["error"]
            ]); // On renvoie un code 404 (Not Found) et l'erreur
            die();
        }

        $message = $supp_categorie;
    }else { // Si l'API ne reçoit pas d'email et de mot de passe on récupère tous les utilisateurs
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
