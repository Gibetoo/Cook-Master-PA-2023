<?php

function getCours(): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getUsersQuery = $databaseConnection->query("SELECT * FROM Cours;");
    return $getUsersQuery->fetchAll(PDO::FETCH_ASSOC);
}

function getOneCours(string $id_cours): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getUsersQuery = $databaseConnection->query("SELECT * FROM Cours WHERE id_cours = $id_cours;");
    return $getUsersQuery->fetch(PDO::FETCH_ASSOC);
}