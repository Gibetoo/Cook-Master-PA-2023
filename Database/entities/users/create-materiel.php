<?php

function createMateriel(string $nom, string $description, int $prix): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
        INSERT INTO Materiels(
            nom_ma,
            description,
            prix
        ) VALUES (
            :nom_ma,
            :description,
            :prix
        );
    ");

    $createUserQuery->execute([
        "nom_ma" => htmlspecialchars($nom),
        "description" => htmlspecialchars($description),
        "prix" => $prix
    ]);
}