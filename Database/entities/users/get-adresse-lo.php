<?php

function getAdresse(): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getUsersQuery = $databaseConnection->query("SELECT * FROM Adresse_es;");
    return $getUsersQuery->fetchAll(PDO::FETCH_ASSOC);
}
