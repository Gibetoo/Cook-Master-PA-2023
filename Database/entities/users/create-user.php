<?php

function createUser(string $email, string $password, string $nom, string $prenom): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
        INSERT INTO users(
            email,
            password,
            nom,
            prenom,
            role,
            abonnement
        ) VALUES (
            :email,
            :password,
            :nom,
            :prenom,
            :role,
            :abonnement
        );
    ");

    $createUserQuery->execute([
        "email" => htmlspecialchars($email),
        "password" => password_hash(htmlspecialchars($password), PASSWORD_BCRYPT),
        "nom" => htmlspecialchars($nom),
        "prenom" => htmlspecialchars($prenom),
        "role" => "user",
        "abonnement" => "Cadet"
    ]);
}
