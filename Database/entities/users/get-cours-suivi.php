<?php

function getCoursSuivi($email): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $sanitizedColumns = [
        "email" => htmlspecialchars($email), // On sanitize l'email
    ];

    $databaseConnection = getDatabaseConnection();
    $getCoursSuivi = $databaseConnection->prepare("SELECT * FROM suivre WHERE email = :email");
    $getCoursSuivi->execute($sanitizedColumns);

    $CoursSuivi = $getCoursSuivi->fetchAll(PDO::FETCH_ASSOC);

    return $CoursSuivi;
}