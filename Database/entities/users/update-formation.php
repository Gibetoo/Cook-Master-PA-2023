<?php

function updateFormation(string $id_fo, string $nom_fo, string $description, string $prix): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $updateMateriel = $databaseConnection->prepare("UPDATE Formation SET nom_fo = :nom_fo, description = :description, prix = :prix WHERE id_fo = :id_fo");

    $updateMateriel->execute([
        "nom_fo" => htmlspecialchars($nom_fo),
        "description" => htmlspecialchars($description),
        "prix" => htmlspecialchars($prix),
        "id_fo" => htmlspecialchars($id_fo)
    ]);
}

function updateFormationCours(string $id_fo, string $cours): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $updateMateriel = $databaseConnection->prepare("UPDATE Formation SET cours = :cours WHERE id_fo = :id_fo");

    $updateMateriel->execute([
        "cours" => htmlspecialchars($cours),
        "id_fo" => htmlspecialchars($id_fo)
    ]);
}

function AddFormationUser(string $id_fo, string $email): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $updateMateriel = $databaseConnection->prepare("UPDATE Client SET id_fo = :id_fo WHERE email = :email");

    $updateMateriel->execute([
        "id_fo" => htmlspecialchars($id_fo),
        "email" => htmlspecialchars($email)
    ]);
}
