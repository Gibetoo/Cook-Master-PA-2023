<?php

function getDatabaseConnection(): PDO
{
    require_once __DIR__ . "/settings.php";

    $databaseConnection = new PDO(
        "$databaseDialect:host=$databaseHostname;dbname=$databaseName",
        $databaseUsername,
        $databasePassword
    );

    return $databaseConnection;
}
