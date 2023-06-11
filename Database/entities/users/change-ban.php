<?php

function changeBan($ban, $email)
{

    require_once __DIR__ . "/../../database/connection.php";

    try {
        $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données
        $createUserQuery = $databaseConnection->prepare("
        UPDATE Client SET ban = :ban WHERE email = :email
    ");

        $createUserQuery->execute([
            "ban" => htmlspecialchars($ban),
            "email" => htmlspecialchars($email)
        ]);
        return  [
            "success" => true,
            "message" => "L'utilisateur a bien été ban"];
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
}
