<?php

function changeBanPrest($ban, $email_pres)
{

    require_once __DIR__ . "/../../database/connection.php";

    try {
        $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données
        $banPrestQuery = $databaseConnection->prepare("
        UPDATE Prestataire SET ban = :ban WHERE email_pres = :email_pres
    ");

        $banPrestQuery->execute([
            "ban" => htmlspecialchars($ban),
            "email_pres" => htmlspecialchars($email_pres)
        ]);
        return  [
            "success" => true,
            "message" => "Le prestataire a bien été ban"];
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
}
