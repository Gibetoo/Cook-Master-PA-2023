<?php

function getRecettes(): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getUsersQuery = $databaseConnection->query("SELECT * FROM recette;");
    return $getUsersQuery->fetchAll(PDO::FETCH_ASSOC);
}

function getOneRecette(string $id_recette): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getOneRecette = $databaseConnection->query("SELECT * FROM recette WHERE id_recette = $id_recette;");

    return $getOneRecette->fetch(PDO::FETCH_ASSOC);
}
