<?php

function getOnelocal($id_es): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $sanitizedColumns = [
        "id_es" => htmlspecialchars($id_es), // On sanitize l'email
    ];

    $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données
    $getOnelocal = $databaseConnection->prepare("SELECT * FROM Espaces_louer_ WHERE id_es = :id_es"); // On prépare la requête SQL
    $getOnelocal->execute($sanitizedColumns); // On exécute la requête SQL en passant les colonnes sanitizées en paramètres

    $localData = $getOnelocal->fetch(PDO::FETCH_ASSOC); // On récupère les données de l'utilisateur
    
    if (!$localData) { // Si l'utilisateur n'existe pas
        return ["error" => "Adresse non trouvé"]; // utilisateur non trouvé
    }

    return $localData; // On renvoie les données de l'utilisateur;
}
