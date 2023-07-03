<?php

function getLocal(): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getUsersQuery = $databaseConnection->query("SELECT * FROM Espaces_louer_;");
    return $getUsersQuery->fetchAll(PDO::FETCH_ASSOC);
}