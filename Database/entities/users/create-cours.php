<?php

function createCours($nom_cours, $prix_cours, $description_cours, $recettes, $materiels): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createLocalQuery = $databaseConnection->prepare("
        INSERT INTO Cours_domicile (
            nom_cours,
            prix_cours,
            description_cours,
            recettes,
            materiels
        ) VALUES (
            :nom_cours,
            :prix_cours,
            :description_cours,
            :recettes,
            :materiels
        );
    ");

    $createLocalQuery->execute([
        "nom_cours" => htmlspecialchars($nom_cours),
        "prix_cours" => htmlspecialchars($prix_cours),
        "description_cours" => htmlspecialchars($description_cours),
        "recettes" => htmlspecialchars($recettes),
        "materiels" => htmlspecialchars($materiels)
    ]);
}
