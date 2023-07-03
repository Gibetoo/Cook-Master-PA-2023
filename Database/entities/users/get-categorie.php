<?php

function getCategorie(): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getUsersQuery = $databaseConnection->query("SELECT * FROM Categorie;");
    return $getUsersQuery->fetchAll(PDO::FETCH_ASSOC);
}