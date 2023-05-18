<?php

require_once __DIR__ . "/connection.php";

try {
    $databaseConnection = getDatabaseConnection();
    $databaseConnection->query("DROP TABLE IF EXISTS users;");
    $databaseConnection->query("CREATE TABLE users(id INTEGER PRIMARY KEY AUTO_INCREMENT, email VARCHAR(50) NOT NULL, password CHAR(60) NOT NULL, abonnement VARCHAR(50) NOT NULL, nom VARCHAR(50) NOT NULL, role VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL);");
    echo "Connexion réussie" . PHP_EOL;
} catch (Exception $exception) {
    echo "Une erreur est survenue durant la migration des données" . PHP_EOL;
    echo $exception->getMessage(), "\n";
}
