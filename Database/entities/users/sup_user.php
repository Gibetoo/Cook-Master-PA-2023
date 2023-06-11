<?php 

function supUser($email) 
{
    require_once __DIR__ . "/../../database/connection.php";

    try {
        $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données
        $createUserQuery = $databaseConnection->prepare("
        DELETE FROM Client WHERE email = :email
    ");

        $createUserQuery->execute([
            "email" => htmlspecialchars($email)
        ]);
        return  [
            "success" => true,
            "message" => "L'utilisateur a bien été supprimé"];
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
}