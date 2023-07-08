<?php

function savekey($email, $code)
{
    try {
        require_once __DIR__ . "/../../database/connection.php";

        $databaseConnection = getDatabaseConnection();
        $savekeyQuery = $databaseConnection->prepare("
        UPDATE Client SET verification_email = :code WHERE email = :email;

    ");
        $savekeyQuery->execute([
            "code" => htmlspecialchars($code),
            "email" => htmlspecialchars($email)
        ]);

        return  [
            "success" => true,
            "message" => "La clé a bien été enregistré"
        ];
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
}

function change_status($email, $verif)
{
    try {
        require_once __DIR__ . "/../../database/connection.php";

        $databaseConnection = getDatabaseConnection();
        $changeStatusQuery = $databaseConnection->prepare("
        UPDATE Client SET verification_email = :verif WHERE email = :email;

    ");
        $changeStatusQuery->execute([
            "email" => htmlspecialchars($email),
            "verif" => htmlspecialchars($verif)
        ]);

        return  [
            "success" => true,
            "message" => "Le status a bien été changé"
        ];
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
}
