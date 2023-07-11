<?php

function createCours($nom_cours, $prix_cours, $description_cours, $recettes, $materiels, $pres_cours, $id_salle, $date, $heure): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createLocalQuery = $databaseConnection->prepare("
        INSERT INTO Cours (
            nom_cours,
            prix,
            description,
            recette,
            materiels,
            id_salle,
            date,
            heure
        ) VALUES (
            :nom_cours,
            :prix,
            :description,
            :recette,
            :materiels,
            :id_salle,
            :date,
            :heure
        );
    ");

    $createLocalQuery->execute([
        "nom_cours" => htmlspecialchars($nom_cours),
        "prix" => htmlspecialchars($prix_cours),
        "description" => htmlspecialchars($description_cours),
        "recette" => htmlspecialchars($recettes),
        "materiels" => htmlspecialchars($materiels),
        "id_salle" => htmlspecialchars($id_salle),
        "date" => htmlspecialchars($date),
        "heure" => htmlspecialchars($heure),
    ]);


    // Récupérer l'ID du dernier cours inséré
    $id_cours = $databaseConnection->lastInsertId();

    // Insérer l'e-mail du prestataire dans la table Donner_cours
    $createDonnerCoursQuery = $databaseConnection->prepare("
        INSERT INTO donner_cours (
            email_pres,
            id_cours
        ) VALUES (
            :email_pres,
            :id_cours
        );
    ");

    $createDonnerCoursQuery->execute([
        "email_pres" => htmlspecialchars($pres_cours),
        "id_cours" => $id_cours
    ]);
}

