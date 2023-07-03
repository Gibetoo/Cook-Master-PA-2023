<?php

function updateMateriel(string $id_ma,string $nom_ma, string $description, int $prix, string $image): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données

    $updateMateriel = $databaseConnection->prepare("UPDATE Materiel SET nom_ma = :nom_ma, description = :description, prix = :prix, image = :image WHERE id_ma = :id_ma");

    $updateMateriel->execute([
        "nom_ma" => htmlspecialchars($nom_ma),
        "description" => htmlspecialchars($description),
        "prix" => htmlspecialchars($prix),
        "image" => htmlspecialchars($image),
        "id_ma" => htmlspecialchars($id_ma)
    ]);
}
