<?php

function getMetier(): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getUsersQuery = $databaseConnection->query("SELECT * FROM Metier;");
    return $getUsersQuery->fetchAll(PDO::FETCH_ASSOC);
}
