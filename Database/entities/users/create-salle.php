<?php

function createSalle(string $nom_salle, int $num_salle, int $nb_presonne, float $prix_salle, float $dimension, int $id_es): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    /* $sql = "SELECT COUNT(*) AS nombre_salles FROM Salle WHERE id_es = :id_es";
    $result = $databaseConnection->query($sql);

if ($result !== false) {
    $rows = $result->fetchAll();
    $nombre_salles_actuel = count($rows);
} else {
    $nombre_salles_actuel = 0;
}

$sql = "SELECT nb_salle FROM Espaces_louer_ WHERE id_es = :id_es";
$result = $databaseConnection->query($sql);

if ($result !== false) {
    
    $rows = $result->fetchAll();
    $nombre_salles_max = count($rows);
} else {
    $nombre_salles_max = 0;
}


if ($nombre_salles_actuel >= $nombre_salles_max) {
    echo "Vous avez atteint le nombre maximum de salles pour cet espace";
} else { */
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
/* } */