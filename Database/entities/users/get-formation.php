<?php

function getFormation(): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getFormation = $databaseConnection->query("SELECT * FROM Formation;");
    return $getFormation->fetchAll(PDO::FETCH_ASSOC);
}

function getFormationById(string $id_fo): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getFormationById = $databaseConnection->prepare("SELECT * FROM Formation WHERE id_fo = :id_fo;");
    $getFormationById->execute([
        "id_fo" => htmlspecialchars($id_fo)
    ]);
    return $getFormationById->fetch(PDO::FETCH_ASSOC);
}

function getFormationUser($email): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getFormationUser = $databaseConnection->prepare("SELECT id_fo FROM Client WHERE email = :email;");
    $getFormationUser->execute([
        "email" => htmlspecialchars($email)
    ]);
    return $getFormationUser->fetch(PDO::FETCH_ASSOC);
}
