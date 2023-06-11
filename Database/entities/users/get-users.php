<?php

function getUsers(): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getUsersQuery = $databaseConnection->query("SELECT * FROM Client;");
    return $getUsersQuery->fetchAll(PDO::FETCH_ASSOC);
}
