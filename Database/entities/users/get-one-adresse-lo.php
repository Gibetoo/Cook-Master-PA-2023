<?php

function getOneAdresseLo($id_adr): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $sanitizedColumns = [
        "id_adr" => htmlspecialchars($id_adr), // On sanitize l'email
    ];

    $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données
    $getOneAdresseLo = $databaseConnection->prepare("SELECT * FROM Adresse_es WHERE id_adr = :id_adr"); // On prépare la requête SQL
    $getOneAdresseLo->execute($sanitizedColumns); // On exécute la requête SQL en passant les colonnes sanitizées en paramètres

    $adresseData = $getOneAdresseLo->fetch(PDO::FETCH_ASSOC); // On récupère les données de l'utilisateur
    
    if (!$adresseData) { // Si l'utilisateur n'existe pas
        return ["error" => "Adresse non trouvé"]; // utilisateur non trouvé
    }

    return $adresseData; // On renvoie les données de l'utilisateur;
}