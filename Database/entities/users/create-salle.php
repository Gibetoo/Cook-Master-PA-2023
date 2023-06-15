<?php

function createSalle(string $nom_salle, int $num_salle, int $nb_presonne, float $prix_salle, float $dimension): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createSalleQuery = $databaseConnection->prepare("
        INSERT INTO Salle(
            nom_salle,
            num_salle,
            nb_personne,
            prix_salle,
            dimension,
            

        ) VALUES (
            :nom_salle,
            :num_salle,
            :nb_presonne,
            :prix_salle,
            :dimension,
        );
    ");

    $createSalleQuery->execute([
        "nom_salle" => htmlspecialchars($nom_salle),
        "num_salle" => htmlspecialchars($num_salle),
        "nb_presonne" => htmlspecialchars($nb_presonne),
        "prix_salle" => htmlspecialchars($prix_salle),
        "dimension" => htmlspecialchars($dimension),
        

    ]);
}