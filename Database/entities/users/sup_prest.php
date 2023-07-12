<?php
function supPres($email_pres) 
{
    require_once __DIR__ . "/../../database/connection.php";

    try {
        $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données

        $databaseConnection->beginTransaction();

        // Supprimer les cours liés au prestataire
        $deleteCoursQuery = $databaseConnection->prepare("
            DELETE FROM Cours WHERE id_cours IN (
                SELECT id_cours FROM donner_cours WHERE email_pres = :email_pres
            )
        ");
        $deleteCoursQuery->execute([
            'email_pres' => $email_pres
        ]);

        // Supprimer les réservations liées au prestataire
        $deleteReservationsQuery = $databaseConnection->prepare("
            DELETE FROM suivre WHERE id_cours IN (
                SELECT id_cours FROM donner_cours WHERE email_pres = :email_pres
            )
        ");
        $deleteReservationsQuery->execute([
            'email_pres' => $email_pres
        ]);

        // Supprimer le prestataire
        $deletePrestQuery = $databaseConnection->prepare("
            DELETE FROM Prestataire WHERE email_pres = :email_pres
        ");
        $deletePrestQuery->execute([
            'email_pres' => $email_pres
        ]);

        $databaseConnection->commit();

        return [
            "success" => true,
            "message" => "Le prestataire, les cours liés et les réservations ont été supprimés avec succès"
        ];
    } catch (PDOException $e) {
        $databaseConnection->rollBack();
        return [
            "success" => false,
            "message" => "Erreur lors de la suppression du prestataire : " . $e->getMessage()
        ];
    }
}
