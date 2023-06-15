<?php 

function supPres($email_prest) 
{
    require_once __DIR__ . "/../../database/connection.php";

    try {
        $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données
        $createUserQuery = $databaseConnection->prepare("
        DELETE FROM Prestataire WHERE email_pres = :email_pres
    ");

        $createUserQuery->execute([
            "email_pres" => htmlspecialchars($email_prest)
        ]);
        return  [
            "success" => true,
            "message" => "Le prestataire a bien été supprimé"];
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
}