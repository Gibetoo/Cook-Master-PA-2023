<?php

function createMetier(string $nomM): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createMetierQuery = $databaseConnection->prepare("
        INSERT INTO Metier(
            nom_metier
        ) VALUES (
            :nom_metier
        );
    ");

    $createMetierQuery->execute([
        "nom_metier" => htmlspecialchars($nomM),
    ]);
}