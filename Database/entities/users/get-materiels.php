<?php

function getMateriel(): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getUsersQuery = $databaseConnection->query("SELECT * FROM Materiels;");
    return $getUsersQuery->fetchAll(PDO::FETCH_ASSOC);
}