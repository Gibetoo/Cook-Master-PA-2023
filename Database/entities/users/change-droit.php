<?php

function changeDroit($email, $role)
{

    require_once __DIR__ . "/../../database/connection.php";

    try {
        $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données
        $createUserQuery = $databaseConnection->prepare("
        UPDATE users SET role = :role WHERE email = :email
    ");

        $createUserQuery->execute([
            "role" => htmlspecialchars($role),
            "email" => htmlspecialchars($email)
        ]);
        return  [
            "success" => true,
            "message" => "L'utilisateur a bien été modifié"];
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
}
