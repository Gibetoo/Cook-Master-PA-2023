<?php
function getHeure(String $date): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getUsersQuery = $databaseConnection->query("SELECT * FROM Salle WHERE id_salle NOT IN (SELECT id_salle FROM Cours WHERE $date)");
    return $getUsersQuery->fetchAll(PDO::FETCH_ASSOC);
}
