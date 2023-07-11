<?php

function supMetier($id_metier) 
{
    require_once __DIR__ . "/../../database/connection.php";

    try {
        $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données
        $databaseConnection->beginTransaction();

        // Récupérer les ID des prestataires associés au métier
        $requetePrestatairesASupprimer = $databaseConnection->prepare("
            SELECT email_pres FROM Prestataire WHERE id_metier = :id_metier
        ");
        $requetePrestatairesASupprimer->execute([
            'id_metier' => $id_metier
        ]);
        $prestatairesASupprimer = $requetePrestatairesASupprimer->fetchAll(PDO::FETCH_COLUMN);

        // Récupérer les ID des cours donnés par les prestataires à supprimer
        $requeteCoursASupprimer = $databaseConnection->prepare("
            SELECT id_cours FROM donner_cours WHERE email_pres IN (" . implode(',', array_fill(0, count($prestatairesASupprimer), '?')) . ")
        ");
        $requeteCoursASupprimer->execute($prestatairesASupprimer);
        $coursASupprimer = $requeteCoursASupprimer->fetchAll(PDO::FETCH_COLUMN);

        // Supprimer les entrées correspondantes dans donner_cours
        if (!empty($coursASupprimer)) {
            $requeteSuppressionDonnerCours = $databaseConnection->prepare("
                DELETE FROM donner_cours WHERE id_cours IN (" . implode(',', array_fill(0, count($coursASupprimer), '?')) . ")
            ");
            $requeteSuppressionDonnerCours->execute($coursASupprimer);
        }

        // Supprimer les cours associés aux prestataires
        $requeteSuppressionCours = $databaseConnection->prepare("
            DELETE FROM Cours WHERE id_cours IN (" . implode(',', array_fill(0, count($coursASupprimer), '?')) . ")
        ");
        $requeteSuppressionCours->execute($coursASupprimer);

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

        echo "Le métier, les prestataires associés et les cours associés ont été supprimés avec succès.";
    } catch (PDOException $e) {
        $databaseConnection->rollBack();
        // En cas d'erreur, afficher le message d'erreur
        echo "Erreur lors de la suppression du métier : " . $e->getMessage();
    }
}
