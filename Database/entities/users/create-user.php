<?php

function createUser(string $email, string $password): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
        INSERT INTO users(
            email,
            password
        ) VALUES (
            :email,
            :password
        );
    ");

    $createUserQuery->execute([
        "email" => htmlspecialchars($email),
        "password" => password_hash(htmlspecialchars($password), PASSWORD_BCRYPT)
    ]);
}
