<?php

function getsalle(): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getSalleQuery = $databaseConnection->query("SELECT * FROM Salle;");
    return $getSalleQuery->fetchAll(PDO::FETCH_ASSOC);
    
}

