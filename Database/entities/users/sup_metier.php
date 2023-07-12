<?php
function supMetier($id_metier) 
{
    require_once __DIR__ . "/../../database/connection.php";

    try {
        $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données
        $databaseConnection->beginTransaction();

        // Supprimer les cours réservés liés au cours
        $requeteSuppressionCoursReserves = $databaseConnection->prepare("
            DELETE FROM suivre WHERE id_cours IN (
                SELECT id_cours FROM donner_cours WHERE email_pres IN (
                    SELECT email_pres FROM Prestataire WHERE id_metier = :id_metier
                )
            )
        ");
        $requeteSuppressionCoursReserves->execute([
            'id_metier' => $id_metier
        ]);

        // Supprimer les cours liés au prestataire
        $requeteSuppressionCours = $databaseConnection->prepare("
            DELETE FROM Cours WHERE id_cours IN (
                SELECT id_cours FROM donner_cours WHERE email_pres IN (
                    SELECT email_pres FROM Prestataire WHERE id_metier = :id_metier
                )
            )
        ");
        $requeteSuppressionCours->execute([
            'id_metier' => $id_metier
        ]);

        // Supprimer les prestataires associés au métier
        $requeteSuppressionPrest = $databaseConnection->prepare("
            DELETE FROM Prestataire WHERE id_metier = :id_metier
        ");
        $requeteSuppressionPrest->execute([
            'id_metier' => $id_metier
        ]);

        // Supprimer le métier
        $requeteSuppressionMetier = $databaseConnection->prepare("
            DELETE FROM Metier WHERE id_metier = :id_metier
        ");
        $requeteSuppressionMetier->execute([
            'id_metier' => $id_metier
        ]);

        $databaseConnection->commit();

        echo "Le métier, le prestataire, les cours associés et les cours réservés ont été supprimés avec succès.";
    } catch (PDOException $e) {
        $databaseConnection->rollBack();
        // En cas d'erreur, afficher le message d'erreur
        echo "Erreur lors de la suppression du métier : " . $e->getMessage();
    }
}
