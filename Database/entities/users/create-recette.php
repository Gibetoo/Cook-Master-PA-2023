<?php

function createRecette(string $nom_recette, string $preparation, string $description, int $id_cat, string $image): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createRecetteQuery = $databaseConnection->prepare("
        INSERT INTO recette(
            nom_recette,
            preparation,
            description_recette,
            image,
            id_cat
        ) VALUES (
            :nom_recette,
            :preparation,
            :description_recette,
            :image,
            :id_cat
        );
    ");

    $createRecetteQuery->execute([
        "nom_recette" => htmlspecialchars($nom_recette),
        "preparation" => htmlspecialchars($preparation),
        "description_recette" => htmlspecialchars($description),
        "image" => htmlspecialchars($image),
        "id_cat" => intval($id_cat)
    ]);
}