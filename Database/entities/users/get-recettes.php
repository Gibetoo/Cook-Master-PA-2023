<?php

function getRecettes(): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getUsersQuery = $databaseConnection->query("SELECT * FROM recette;");
    return $getUsersQuery->fetchAll(PDO::FETCH_ASSOC);
}

function getRecetteById(string $id_ma): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getUsersQuery = $databaseConnection->prepare("SELECT * FROM Recette WHERE id_ma = :id_ma;");
    $getUsersQuery->execute([
        "id_ma" => htmlspecialchars($id_ma)
    ]);
    return $getUsersQuery->fetch(PDO::FETCH_ASSOC);
}