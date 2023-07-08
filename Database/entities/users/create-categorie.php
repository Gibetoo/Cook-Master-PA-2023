<?php

function createCategorie(string $nom_cat): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createCategorieQuery = $databaseConnection->prepare("
        INSERT INTO Categorie(
            nom_cat
        ) VALUES (
            :nom_cat
        );
    ");

    $createCategorieQuery->execute([
        "nom_cat" => htmlspecialchars($nom_cat)
    ]);
}
