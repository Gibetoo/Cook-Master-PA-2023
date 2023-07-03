<?php 

function supSalle($id_salle) 
{
    require_once __DIR__ . "/../../database/connection.php";

    try {
        $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données
        $supSalleQuery = $databaseConnection->prepare("
        DELETE FROM Salle WHERE id_salle = :id_salle
    ");

        $supSalleQuery->execute([
            "id_salle" => htmlspecialchars($id_salle)
        ]);
        return  [
            "success" => true,
            "message" => "La salle a bien été supprimé"];
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
}