<?php

function supAdresselo($id_adr)
{
    require_once __DIR__ . "/../../database/connection.php";

    try {
        $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données
        $databaseConnection->beginTransaction();

        // Supprimer les réservations liées aux cours
        $requeteSuppressionReservations = $databaseConnection->prepare("
            DELETE FROM suivre WHERE id_cours IN (
                SELECT id_cours FROM Cours WHERE id_salle IN (
                    SELECT id_salle FROM Salle WHERE id_es IN (
                        SELECT id_es FROM Espaces_louer_ WHERE id_adr = :id_adr
                    )
                )
            )
        ");
        $requeteSuppressionReservations->execute([
            'id_adr' => $id_adr
        ]);

        // Supprimer les cours associés aux salles
        $requeteSuppressionCours = $databaseConnection->prepare("
            DELETE FROM Cours WHERE id_salle IN (
                SELECT id_salle FROM Salle WHERE id_es IN (
                    SELECT id_es FROM Espaces_louer_ WHERE id_adr = :id_adr
                )
            )
        ");
        $requeteSuppressionCours->execute([
            'id_adr' => $id_adr
        ]);

        // Supprimer les salles associées à l'adresse
        $requeteSuppressionSalle = $databaseConnection->prepare("
            DELETE FROM Salle WHERE id_es IN (
                SELECT id_es FROM Espaces_louer_ WHERE id_adr = :id_adr
            )
        ");
        $requeteSuppressionSalle->execute([
            'id_adr' => $id_adr
        ]);

        // Supprimer les locaux associés à l'adresse
        $requeteSuppressionEspaces_louer_ = $databaseConnection->prepare("
            DELETE FROM Espaces_louer_ WHERE id_adr = :id_adr
        ");
        $requeteSuppressionEspaces_louer_->execute([
            'id_adr' => $id_adr
        ]);

        // Supprimer l'adresse
        $requeteSuppressionAdresse = $databaseConnection->prepare("
            DELETE FROM Adresse_es WHERE id_adr = :id_adr
        ");
        $requeteSuppressionAdresse->execute([
            'id_adr' => $id_adr
        ]);

        $databaseConnection->commit();

        return [
            "success" => true,
            "message" => "L'adresse, les locaux, les salles, les cours et les réservations ont été supprimés avec succès"
        ];
    } catch (PDOException $e) {
        $databaseConnection->rollBack();
        return [
            "success" => false,
            "message" => "Erreur lors de la suppression de l'adresse : " . $e->getMessage()
        ];
    }
}
