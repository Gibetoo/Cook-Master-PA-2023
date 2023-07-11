<?php

function getRecettes(): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getUsersQuery = $databaseConnection->query("SELECT * FROM recette;");
    return $getUsersQuery->fetchAll(PDO::FETCH_ASSOC);
}

function getOneRecettes($id_recette): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getUsersQuery = $databaseConnection->prepare("SELECT * FROM recette WHERE id_recette = :id_recette;");
    $getUsersQuery->execute([
        "id_recette" => $id_recette
    ]);
    return $getUsersQuery->fetch(PDO::FETCH_ASSOC);
}