<?php

function AddCoursUser($id_cours, $email): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    
    $updateClient = $databaseConnection->prepare("INSERT INTO suivre (id_cours, email) VALUES (:id_cours, :email)");

    $updateClient->execute([
        "id_cours" => htmlspecialchars($id_cours),
        "email" => htmlspecialchars($email)
    ]);
}
