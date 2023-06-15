<?php 

function supMetier($nom_metier) 
{
    require_once __DIR__ . "/../../database/connection.php";

    try {
        $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données
        $supMQuery = $databaseConnection->prepare("
        DELETE FROM Metier WHERE nom_metier = :nom_metier
    ");

        $supMQuery->execute([
            "nom_metier" => htmlspecialchars($nom_metier)
        ]);
        return  [
            "success" => true,
            "message" => "Le métier a bien été supprimé"];
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
}