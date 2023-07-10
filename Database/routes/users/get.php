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
require_once __DIR__ . "/../../entities/users/get-all-salle.php";
require_once __DIR__ . "/../../entities/users/update-abonnement.php";
require_once __DIR__ . "/../../entities/users/get-date-salle.php";
require_once __DIR__ . "/../../entities/users/calendar.php";
require_once __DIR__ . "/../../entities/users/get-one-salle.php";



try {

    if (isset($_GET['demande']) && isset($_GET['email']) && isset($_GET['droit']) && $_GET['demande'] == 'change_mod') {
        $change = changeDroit($_GET['email'], $_GET['droit']);

        if (isset($change["error"])) {
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $change["error"]
            ]);
            die();
        }

        $message = $change;
    } else if (isset($_GET['demande']) && isset($_GET['email']) && isset($_GET['ban']) && $_GET['demande'] == 'change_ban') {
        $ban = changeBan($_GET['ban'], $_GET['email']);

        if (isset($change["error"])) {
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $ban["error"]
            ]);
            die();
        }

        $message = $ban;
    } else if (isset($_GET['demande']) && isset($_GET['email']) && $_GET['demande'] == 'supp') {
        $supp = supUser($_GET['email']);

        if (isset($supp["error"])) {
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $supp["error"]
            ]);
            die();
        }

        $message = $supp;
    } else if (isset($_GET['demande']) && isset($_GET['id_ma']) && $_GET['demande'] == 'supp') {
        $supp = supMateriel($_GET['id_ma']);

        if (isset($supp["error"])) {
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $supp["error"]
            ]);
            die();
        }

        $message = $supp;
    } else if (isset($_GET["email"]) && isset($_GET["password"]) && isset($_GET["droit"])) {
        $users = getOneUserPass($_GET["email"], $_GET["password"]);

        if (isset($users["error"])) {
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $users["error"]
            ]);
            die();
        }

        $message = $users;
    } else if (isset($_GET["email"]) && isset($_GET["password"])) {
        $users = getOneUserPass($_GET["email"], $_GET["password"]);

        if (isset($users["error"])) {
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $users["error"]
            ]);
            die();
        }

        $message = $users;
    } else if (isset($_GET['demande']) && isset($_GET['email'])  && isset($_GET['abonnement']) && $_GET['demande'] == 'change_abo') {

        UpdateAbonnement($_GET['abonnement'], $_GET['email']);

        $message = "Abonnement changé";
    } else if (isset($_GET["email"]) && isset($_GET['demande']) && $_GET['demande'] == 'user') {
        $users = getOneUser($_GET["email"]);

        if (isset($users["error"])) {
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $users["error"]
            ]);
            die();
        }

        $message = $users;
    } else if (isset($_GET['demande']) && isset($_GET['id_ma']) && $_GET['demande'] == 'materiels') {

        $materiels = getMaterielById($_GET['id_ma']);

        if (isset($materiels["error"])) {
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $materiels["error"]
            ]);
            die();
        }

        $message = $materiels;
    } else if (isset($_GET['demande']) && $_GET['demande'] == 'materiels') {

        $materiels = getMateriel();

        if (isset($materiels["error"])) {
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $materiels["error"]
            ]);
            die();
        }

        $message = $materiels;
    } else if (isset($_GET['demande']) && $_GET['demande'] == 'recettes') {

        $recettes = getRecettes();

        if (isset($materiels["error"])) {
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $recettes["error"]
            ]);
            die();
        }

        $message = $recettes;
    } else if (isset($_GET['demande']) && $_GET['demande'] == 'formation') {

        $formation = getFormation();

        if (isset($formation["error"])) {
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $formation["error"]
            ]);
            die();
        }

        $message = $formation;
    } else if (isset($_GET['demande']) && $_GET['demande'] == 'cours') {

        $Cours = getCours();

        if (isset($Cours["error"])) {
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $Cours["error"]
            ]);
            die();
        }

        $message = $Cours;
    } else if (isset($_GET['demande']) && $_GET['demande'] == 'prestataires') {

        $prest = getPrest();

        $message = $prest;
    } else if (isset($_GET['demande']) && isset($_GET['id_metier']) && $_GET['demande'] == 'prestataire') {

        $prestid = getIdPrest($_GET['id_metier']);

        $message = $prestid;
    } else if (isset($_GET['demande']) && $_GET['demande'] == 'metier') {

        $metier = getMetier();

        $message = $metier;
    } else if (isset($_GET['demande']) && isset($_GET['id_metier']) && $_GET['demande'] == 'supp_metier') {
        $supp_metier = supMetier($_GET['id_metier']);

        if (isset($supp_metier["error"])) {
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $supp_metier["error"]
            ]);
            die();
        }

        $message = $supp_metier;
    } else if (isset($_GET['demande']) && isset($_GET['email_pres']) && $_GET['demande'] == 'supp_pres') {
        $supp_pres = supPres($_GET['email_pres']);

        if (isset($supp_pres["error"])) {
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $supp_pres["error"]
            ]);
            die();
        }

        $message = $supp_pres;
    } else if (isset($_GET['demande']) && isset($_GET["email_pres"]) && $_GET['demande'] == 'one-prestataires') {
        $users = getOnePres($_GET["email_pres"]);

        if (isset($users["error"])) {
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $users["error"]
            ]);
            die();
        }

        $message = $users;
    } else if (isset($_GET['demande']) && isset($_GET['email_prest']) && isset($_GET['ban']) && $_GET['demande'] == 'change_ban_prest') {
        $ban = changeBanPrest($_GET['ban'], $_GET['email_prest']);

        if (isset($ban["error"])) {
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $ban["error"]
            ]);
            die();
        }

        $message = $ban;
    } else if (isset($_GET['demande']) && $_GET['demande'] == 'adresse_lo') {

        $adresse = getAdresse();

        if (isset($adresse["error"])) {
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $adresse["error"]
            ]);
            die();
        }

        $message = $adresse;
    } else if (isset($_GET['demande']) && isset($_GET['id_adr']) && $_GET['demande'] == 'supp_adresse_lo') {
        $supp_adresse = supAdresselo($_GET['id_adr']);

        if (isset($supp_adresse["error"])) {
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $supp_adresse["error"]
            ]);
            die();
        }

        $message = $supp_adresse;
    } else if (isset($_GET['demande']) && $_GET['demande'] == 'local') {

        $local = getLocal();

        if (isset($local["error"])) {
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $local["error"]
            ]);
            die();
        }

        $message = $local;
    } else if (isset($_GET['demande']) && isset($_GET['id_adr']) && $_GET['demande'] == 'one_adresse_lo') {

        $oneAdresse = getOneAdresseLo($_GET['id_adr']);

        $message = $oneAdresse;
    } else if (isset($_GET['demande']) && isset($_GET['id_es']) && $_GET['demande'] == 'supp_local') {
        $supp_local = supLocal($_GET['id_es']);

        if (isset($supp_local["error"])) {
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $supp_local["error"]
            ]);
            die();
        }

        $message = $supp_local;
    } else if (isset($_GET['demande']) && $_GET['demande'] == 'salle') {

        $salle = getsalle();

        if (isset($salle["error"])) {
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $salle["error"]
            ]);
            die();
        }

        $message = $salle;
    } else if (isset($_GET['demande']) && isset($_GET['id_es']) && $_GET['demande'] == 'one_local') {

        $oneLocal = getOnelocal($_GET['id_es']);

        $message = $oneLocal;
    } else if (isset($_GET['demande']) && isset($_GET['id_salle']) && $_GET['demande'] == 'supp_salle') {
        $supp_salle = supSalle($_GET['id_salle']);

        if (isset($supp_salle["error"])) {
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $supp_salle["error"]
            ]);
            die();
        }

        $message = $supp_salle;
    } else if (isset($_GET['demande']) && isset($_GET['email']) && isset($_GET['code']) && $_GET['demande'] == 'savekey') {
        $savekey = savekey($_GET['email'], $_GET['code']);

        if (isset($savekey["error"])) {
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $savekey["error"]
            ]);
            die();
        }

        $message = $savekey;
    } else if (isset($_GET['demande']) && isset($_GET['email']) && isset($_GET['verif']) && $_GET['demande'] == 'change_verif') {
        $verif = change_status($_GET['email'], $_GET['verif']);

        if (isset($verif["error"])) {
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $verif["error"]
            ]);
            die();
        }

        $message = $verif;
    } else if (isset($_GET['demande']) && $_GET['demande'] == 'categorie') {

        $categorie = getCategorie();

        $message = $categorie;
    } else if (isset($_GET['demande']) && isset($_GET['id_cat']) && $_GET['demande'] == 'one_categorie') {

        $oneCategorie = getOneCategorie($_GET['id_cat']);

        $message = $oneCategorie;
    } else if (isset($_GET['demande']) && isset($_GET['id_cat']) && $_GET['demande'] == 'supp_categorie') {
        $supp_categorie = supCategorie($_GET['id_cat']);

        if (isset($supp_categorie["error"])) {
            echo jsonResponse(404, [], [
                "success" => false,
                "error" => $supp_categorie["error"]
            ]);
            die();
        }

        $message = $supp_categorie;
    } else if (isset($_GET['demande'])  && isset($_GET['id_salle']) && $_GET['demande'] == 'one_salle') {

        $oneSalle = getOneSalle($_GET['id_salle']);

        $message = $oneSalle;
    }else if (isset($_GET['demande'])&& $_GET['demande'] == 'get_date') {

        $date = getHeure($_GET['date']);

        $message = $date;
    } else if (isset($_GET['demande']) && isset($_GET['id_salle']) && $_GET['demande'] == 'calendar') {
        $calendar = calendar($_GET['id_salle']);

        $message = $calendar;
    }else {
        $users = getUsers();

        $message = $users;
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
