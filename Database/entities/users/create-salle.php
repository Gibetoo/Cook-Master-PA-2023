<?php

function createSalle(string $nom_salle, int $num_salle, int $nb_presonne, float $prix_salle, float $dimension, int $id_es): void
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
            id_es
            

        ) VALUES (
            :nom_salle,
            :num_salle,
            :nb_presonne,
            :prix_salle,
            :dimension,
            :id_es
        );
    ");

    $createSalleQuery->execute([
        "nom_salle" => htmlspecialchars($nom_salle),
        "num_salle" => htmlspecialchars($num_salle),
        "nb_presonne" => htmlspecialchars($nb_presonne),
        "prix_salle" => htmlspecialchars($prix_salle),
        "dimension" => htmlspecialchars($dimension),
        "id_es" => htmlspecialchars($id_es)
        

    ]);
}