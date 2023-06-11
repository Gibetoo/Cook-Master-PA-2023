<?php

function createPrestataire(string $nom_pres, string $prenom_pres, int $number, string $email_pres, string $password_pres , int $id_metier, string $photo_pres, string $diplome): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createPrestataireQuery = $databaseConnection->prepare("
        INSERT INTO Prestataire(
            nom_pres,
            prenom_pres,
            num_tel_pres,
            email_pres,
            password_pres,
            id_metier,
            photo_pres,
            fiche

        ) VALUES (
            :nom_pres,
            :prenom_pres,
            :num_tel_pres,
            :email_pres,
            :password_pres,
            :id_metier,
            :photo_pres,
            :fiche
            
        );
    ");

    $createPrestataireQuery->execute([
        "nom_pres" => htmlspecialchars($nom_pres),
        "prenom_pres" => htmlspecialchars($prenom_pres),
        "email_pres" => htmlspecialchars($email_pres),
        "password_pres" => password_hash(htmlspecialchars($password_pres), PASSWORD_BCRYPT),
        "num_tel_pres" => htmlspecialchars($number),
        "id_metier" => intval($id_metier),
        "photo_pres" => htmlspecialchars($photo_pres),
        "fiche" => htmlspecialchars($diplome)

    ]);
}