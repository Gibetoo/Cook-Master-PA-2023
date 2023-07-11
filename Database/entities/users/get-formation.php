<?php

function getFormation(): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getUsersQuery = $databaseConnection->query("SELECT * FROM Formation;");
    return $getUsersQuery->fetchAll(PDO::FETCH_ASSOC);
}

function getFormationById(string $id_fo): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getUsersQuery = $databaseConnection->prepare("SELECT * FROM Formation WHERE id_fo = :id_fo;");
    $getUsersQuery->execute([
        "id_fo" => htmlspecialchars($id_fo)
    ]);
    return $getUsersQuery->fetch(PDO::FETCH_ASSOC);
}