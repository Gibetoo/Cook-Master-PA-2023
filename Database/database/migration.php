<?php

require_once __DIR__ . "/connection.php";

try {

    $databaseConnection = getDatabaseConnection();
    $databaseConnection->query("DROP TABLE IF EXISTS Materiels;");
    $databaseConnection->query(
        "CREATE TABLE Materiels(
            id INTEGER PRIMARY KEY AUTO_INCREMENT, 
            nom_ma VARCHAR(50) NOT NULL,
            description VARCHAR(50) NOT NULL, 
            prix VARCHAR(4) NOT NULL
        );"
    );
    echo "Connexion réussie" . PHP_EOL;

} catch (Exception $exception) {
    echo "Une erreur est survenue durant la migration des données" . PHP_EOL;
    echo $exception->getMessage(), "\n";
}
