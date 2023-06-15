<?php

function getPrest(): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getPrestQuery = $databaseConnection->query("SELECT * FROM Prestataire;");
    return $getPrestQuery->fetchAll(PDO::FETCH_ASSOC);
    
}

function getIdPrest(string $id): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getIdPrestQuery = $databaseConnection->query("SELECT nom_metier FROM Metier WHERE id_metier = $id;");

    
    return $getIdPrestQuery->fetch(PDO::FETCH_ASSOC);
    
}