<?php

function savekey($email, $code)
{
    try {
        require_once __DIR__ . "/../../database/connection.php";

        $databaseConnection = getDatabaseConnection();
        $savekeyQuery = $databaseConnection->prepare("
        INSERT INTO Client SET verification_email = :code WHERE email = :email;
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
