<?php

function getCours(): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getUsersQuery = $databaseConnection->query("SELECT * FROM Cours_domicile;");
    return $getUsersQuery->fetchAll(PDO::FETCH_ASSOC);
}