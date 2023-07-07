<?php

function UpdateAbonnement($abonnement, $email): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données

    $updateClient = $databaseConnection->prepare("UPDATE Client SET abonnement = :abonnement WHERE email = :email");

    $updateClient->execute([
        "abonnement" => htmlspecialchars($abonnement),
        "email" => htmlspecialchars($email)
    ]);
}
