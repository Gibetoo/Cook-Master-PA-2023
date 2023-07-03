<?php 

function supMateriel($id_ma) 
{
    require_once __DIR__ . "/../../database/connection.php";

    try {
        $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données
        $createUserQuery = $databaseConnection->prepare("
        DELETE FROM Materiel WHERE id_ma = :id_ma
    ");

        $createUserQuery->execute([
            "id_ma" => htmlspecialchars($id_ma)
        ]);
        return  [
            "success" => true,
            "message" => "Le matériel a bien été supprimé"
        ];
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
}