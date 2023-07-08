<?php

function createLocal(string $nom_es, float $dimension, int $nb_salle, int $id_adr): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createLocalQuery = $databaseConnection->prepare("
        INSERT INTO Espaces_louer_(
            nom_es,
            dimension,
            nb_salle,
            id_adr
            

        ) VALUES (
            :nom_es,
            :dimension,
            :nb_salle,
            :id_adr
        );
    ");

    $createLocalQuery->execute([
        "nom_es" => htmlspecialchars($nom_es),
        "dimension" => htmlspecialchars($dimension),
        "nb_salle" => htmlspecialchars($nb_salle),
        "id_adr" => intval($id_adr)
    ]);
}