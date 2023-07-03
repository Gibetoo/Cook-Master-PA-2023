<?php 

function supCategorie($id_cat) 
{
    require_once __DIR__ . "/../../database/connection.php";

    try {
        $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données
        $createUserQuery = $databaseConnection->prepare("
        DELETE FROM Categorie WHERE id_cat = :id_cat
    ");

        $createUserQuery->execute([
            "id_cat" => htmlspecialchars($id_cat)
        ]);
        return  [
            "success" => true,
            "message" => "La catégories a bien été supprimé"
        ];
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
}