<?php

function getOneUserPass($email, $password): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $sanitizedColumns = [
        "email" => htmlspecialchars($email), // On sanitize l'email
    ];

    $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données
    $getOneUser = $databaseConnection->prepare("SELECT * FROM users WHERE email = :email"); // On prépare la requête SQL
    $getOneUser->execute($sanitizedColumns); // On exécute la requête SQL en passant les colonnes sanitizées en paramètres

    $userData = $getOneUser->fetch(PDO::FETCH_ASSOC); // On récupère les données de l'utilisateur
    
    if (!$userData) { // Si l'utilisateur n'existe pas
        return ["error" => "Utilisateur non trouvé"]; // utilisateur non trouvé
    }

    if (!password_verify($password, $userData["password"])) { // Si le mot de passe ne correspond pas
        return ["error" => "Mot de passe incorrect"];
    }

    return $userData; // On renvoie les données de l'utilisateur;
}