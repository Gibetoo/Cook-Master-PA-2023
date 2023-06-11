<?php

function updateUser(string $nom, string $prenom, string $email, string $date_naissance, string $num_tel): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données

    if (empty($date_naissance) && empty($num_tel)) {
        $updateUser = $databaseConnection->prepare("UPDATE Client SET nom = :nom, prenom = :prenom WHERE email = :email");

        $updateUser->execute([
            "nom" => htmlspecialchars($nom),
            "prenom" => htmlspecialchars($prenom),
            "email" => htmlspecialchars($email)
        ]);

    } else if (empty($num_tel)) {
        $updateUser = $databaseConnection->prepare("UPDATE Client SET nom = :nom, prenom = :prenom, date_naissance = :date_naissance WHERE email = :email");

        $updateUser->execute([
            "nom" => htmlspecialchars($nom),
            "prenom" => htmlspecialchars($prenom),
            "email" => htmlspecialchars($email),
            "date_naissance" => htmlspecialchars($date_naissance)
        ]);

    } else if (empty($date_naissance)) {
        $updateUser = $databaseConnection->prepare("UPDATE Client SET nom = :nom, prenom = :prenom, num_tel = :num_tel WHERE email = :email");

        $updateUser->execute([
            "nom" => htmlspecialchars($nom),
            "prenom" => htmlspecialchars($prenom),
            "email" => htmlspecialchars($email),
            "num_tel" => htmlspecialchars($num_tel)
        ]);

    } else {
        $updateUser = $databaseConnection->prepare("UPDATE Client SET nom = :nom, prenom = :prenom, date_naissance = :date_naissance, num_tel = :num_tel WHERE email = :email");

        $updateUser->execute([
            "nom" => htmlspecialchars($nom),
            "prenom" => htmlspecialchars($prenom),
            "email" => htmlspecialchars($email),
            "date_naissance" => htmlspecialchars($date_naissance),
            "num_tel" => htmlspecialchars($num_tel)
        ]);

    }

}
