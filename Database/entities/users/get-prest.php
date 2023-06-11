<?php

function getPrest(): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getPrestQuery = $databaseConnection->query("SELECT * FROM Prestataire;");
    return $getPrestQuery->fetchAll(PDO::FETCH_ASSOC);
}
