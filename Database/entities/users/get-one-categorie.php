<?php

function getOneCategorie($id_cat): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $sanitizedColumns = [
        "id_cat" => htmlspecialchars($id_cat), // On sanitize l'email
    ];

    $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données
    $getOneCategorie = $databaseConnection->prepare("SELECT * FROM Categorie WHERE id_cat = :id_cat"); // On prépare la requête SQL
    $getOneCategorie->execute($sanitizedColumns); // On exécute la requête SQL en passant les colonnes sanitizées en paramètres

    $categorieData = $getOneCategorie->fetch(PDO::FETCH_ASSOC); // On récupère les données de l'utilisateur
    
    if (!$categorieData) { // Si l'utilisateur n'existe pas
        return ["error" => "Adresse non trouvé"]; // utilisateur non trouvé
    }

    return $categorieData; // On renvoie les données de l'utilisateur;
}