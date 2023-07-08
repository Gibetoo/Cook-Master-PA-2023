<?php

function createRecette(string $nom_recette, string $preparation, string $description, int $id_cat): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createRecetteQuery = $databaseConnection->prepare("
        INSERT INTO recette(
            nom_recette,
            preparation,
            description_recette,
            id_cat
        ) VALUES (
            :nom_recette,
            :preparation,
            :description_recette,
            :id_cat
        );
    ");

    $createRecetteQuery->execute([
        "nom_recette" => htmlspecialchars($nom_recette),
        "preparation" => htmlspecialchars($preparation),
        "description_recette" => htmlspecialchars($description),
        "id_cat" => intval($id_cat),

    ]);
}