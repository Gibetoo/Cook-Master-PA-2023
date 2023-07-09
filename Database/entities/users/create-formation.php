<?php

function createFormation($nom_fo, $description, $cours, $prix)
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createLocalQuery = $databaseConnection->prepare("
        INSERT INTO Formation (
            nom_fo,
            description,
            cours,
            prix
        ) VALUES (
            :nom_fo,
            :description,
            :cours,
            :prix
        );
    ");

    $createLocalQuery->execute([
        "nom_fo" => htmlspecialchars($nom_fo),
        "description" => htmlspecialchars($description),
        "cours" => htmlspecialchars($cours),
        "prix" => htmlspecialchars($prix)
    ]);


}