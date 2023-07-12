<?php
function supPres($id_metier) 
{
    require_once __DIR__ . "/../../database/connection.php";

    try {
        $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données

        $databaseConnection->beginTransaction();

        // Supprimer les cours liés aux prestataires
        $deleteCoursQuery = $databaseConnection->prepare("
            DELETE FROM Cours WHERE id_cours IN (
                SELECT id_cours FROM donner_cours WHERE email_pres IN (
                    SELECT email_pres FROM Prestataire
                )
            )
        ");
        $deleteCoursQuery->execute();

        // Supprimer les réservations liées aux cours
        $deleteReservationsQuery = $databaseConnection->prepare("
            DELETE FROM suivre WHERE id_cours IN (
                SELECT id_cours FROM donner_cours WHERE email_pres IN (
                    SELECT email_pres FROM Prestataire
                )
            )
        ");
        $deleteReservationsQuery->execute();

        // Supprimer les prestataires
        $deletePrestQuery = $databaseConnection->prepare("
            DELETE FROM Prestataire
        ");
        $deletePrestQuery->execute();

        // Supprimer le métier
        $deleteMetierQuery = $databaseConnection->prepare("
            DELETE FROM Metier WHERE id_metier = :id_metier
        ");
        $deleteMetierQuery->execute([
            'id_metier' => $id_metier
        ]);

        $databaseConnection->commit();

        return [
            "success" => true,
            "message" => "Le métier, les prestataires, les cours liés et les réservations ont été supprimés avec succès"
        ];
    } catch (PDOException $e) {
        $databaseConnection->rollBack();
        return [
            "success" => false,
            "message" => "Erreur lors de la suppression du métier : " . $e->getMessage()
        ];
    }
}
