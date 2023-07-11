<?php 

function supPres($email_prest)
{
    require_once __DIR__ . "/../../database/connection.php";

    try {
        $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données

        // Récupérer les cours liés au prestataire
        $getCoursQuery = $databaseConnection->prepare("
            SELECT id_cours FROM donner_cours WHERE email_pres = :email_pres
        ");
        $getCoursQuery->execute([
            "email_pres" => htmlspecialchars($email_prest)
        ]);
        $coursLiés = $getCoursQuery->fetchAll(PDO::FETCH_COLUMN);

        // Supprimer les cours liés au prestataire
        $deleteCoursQuery = $databaseConnection->prepare("
            DELETE FROM Cours WHERE id_cours = :id_cours
        ");
        foreach ($coursLiés as $coursID) {
            $deleteCoursQuery->execute([
                "id_cours" => $coursID
            ]);
        }

        // Supprimer le prestataire
        $deletePrestQuery = $databaseConnection->prepare("
            DELETE FROM Prestataire WHERE email_pres = :email_pres
        ");
        $deletePrestQuery->execute([
            "email_pres" => htmlspecialchars($email_prest)
        ]);

        return [
            "success" => true,
            "message" => "Le prestataire et les cours liés ont été supprimés avec succès"
        ];
    } catch (Exception $exception) {
        return $exception->getMessage();
    }
}
