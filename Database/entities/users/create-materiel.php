<?php

function createMateriel(string $nom, string $description, int $prix, string $image): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
        INSERT INTO Materiel(
            nom_ma,
            description,
            prix,
            image
        ) VALUES (
            :nom_ma,
            :description,
            :prix,
            :image
        );
    ");

    $createUserQuery->execute([
        "nom_ma" => htmlspecialchars($nom),
        "description" => htmlspecialchars($description),
        "prix" => $prix,
        "image" => htmlspecialchars($image)
    ]);
}