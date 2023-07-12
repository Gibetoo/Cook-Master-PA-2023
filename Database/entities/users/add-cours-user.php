<?php

function AddCoursUser($id_cours, $email): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    
    $updateClient = $databaseConnection->prepare("UPDATE Client SET id_cours = :id_cours WHERE email = :email");

    $updateClient->execute([
        "id_cours" => htmlspecialchars($id_cours),
        "email" => htmlspecialchars($email)
    ]);
}