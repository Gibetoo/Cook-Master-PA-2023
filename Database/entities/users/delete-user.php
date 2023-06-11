<?php

function deleteUser(string $email): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $deleteUserQuery = $databaseConnection->prepare("DELETE FROM Client WHERE email = :email;");

    $deleteUserQuery->execute([
        "email" => $email
    ]);
}
