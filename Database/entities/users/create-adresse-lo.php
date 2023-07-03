<?php

function createAdresseLo(int $etage, int $num_bat_es, string $rue_es, int $code_postal_es, string $ville_es, string $pays_es): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createSalleQuery = $databaseConnection->prepare("
        INSERT INTO Adresse_es(
            etage,
            num_bat_es,
            rue_es,
            code_postal_es,
            ville_es,
            pays_es
            

        ) VALUES (
            :etage,
            :num_bat_es,
            :rue_es,
            :code_postal_es,
            :ville_es,
            :pays_es
        );
    ");

    $createSalleQuery->execute([
        "etage" => htmlspecialchars($etage),
        "num_bat_es" => htmlspecialchars($num_bat_es),
        "rue_es" => htmlspecialchars($rue_es),
        "code_postal_es" => htmlspecialchars($code_postal_es),
        "ville_es" => htmlspecialchars($ville_es),
        "pays_es" => htmlspecialchars($pays_es)
        

    ]);
}