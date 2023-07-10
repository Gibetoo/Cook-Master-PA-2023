<?php

function getOneSalle($id_salle): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $sanitizedColumns = [
        "id_salle" => htmlspecialchars($id_salle), // On sanitize l'email
    ];

    $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données
    $getOneSalle = $databaseConnection->prepare("SELECT * FROM Salle WHERE id_salle = :id_salle"); // On prépare la requête SQL
    $getOneSalle->execute($sanitizedColumns); // On exécute la requête SQL en passant les colonnes sanitizées en paramètres

    $salleData = $getOneSalle->fetch(PDO::FETCH_ASSOC); // On récupère les données de l'utilisateur
    
    if (!$salleData) { // Si l'utilisateur n'existe pas
        return ["error" => "Adresse non trouvé"]; // utilisateur non trouvé
    }

    return $salleData; // On renvoie les données de l'utilisateur;
}