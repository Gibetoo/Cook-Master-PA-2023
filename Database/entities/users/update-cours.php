<?php

function updateCours(string $nom_cours, string $description, string $prix, string $date, string $heure, string $id_cours): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $updateMateriel = $databaseConnection->prepare("UPDATE Cours SET nom_cours = :nom_cours, description = :description, prix = :prix, date = :date, heure = :heure WHERE id_cours = :id_cours");

    $updateMateriel->execute([
        "nom_cours" => htmlspecialchars($nom_cours),
        "description" => htmlspecialchars($description),
        "prix" => htmlspecialchars($prix),
        "date" => htmlspecialchars($date),
        "heure" => htmlspecialchars($heure),
        "id_cours" => htmlspecialchars($id_cours)
    ]);
}

/* function updateFormationCours(string $id_fo, string $cours): void
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
} */
