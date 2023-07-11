<?php 

function supAdresselo($id_adr) 
{
    require_once __DIR__ . "/../../database/connection.php";

    try {
        $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données
        $databaseConnection->beginTransaction();

        // Récupérer les ID des cours associés à la salle qui sera supprimée
        $requeteCoursASupprimer = $databaseConnection->prepare("
            SELECT id_cours FROM Cours WHERE id_salle IN (
                SELECT id_salle FROM Salle WHERE id_es IN (
                    SELECT id_es FROM Espaces_louer_ WHERE id_adr = :id_adr
                )
            )
        ");
        $requeteCoursASupprimer->execute([
            'id_adr' => htmlspecialchars($id_adr)
        ]);
        $coursASupprimer = $requeteCoursASupprimer->fetchAll(PDO::FETCH_COLUMN);

        // Supprimer les entrées correspondantes dans donner_cours
        if (!empty($coursASupprimer)) {
            $requeteSuppressionDonnerCours = $databaseConnection->prepare("
                DELETE FROM donner_cours WHERE id_cours IN (" . implode(',', $coursASupprimer) . ")"
            );
            $requeteSuppressionDonnerCours->execute();
        }

        // Supprimer les cours prévus
        $requeteSuppressionCours = $databaseConnection->prepare("
            DELETE FROM Cours WHERE id_salle IN (
                SELECT id_salle FROM Salle WHERE id_es IN (
                    SELECT id_es FROM Espaces_louer_ WHERE id_adr = :id_adr
                )
            )
        ");
        $requeteSuppressionCours->execute([
            'id_adr' => htmlspecialchars($id_adr)
        ]);

        // Supprimer les salles associées à l'établissement
        $requeteSuppressionSalle = $databaseConnection->prepare("
            DELETE FROM Salle WHERE id_es IN (
                SELECT id_es FROM Espaces_louer_ WHERE id_adr = :id_adr
            )
        ");
        $requeteSuppressionSalle->execute([
            'id_adr' => htmlspecialchars($id_adr)
        ]);

        // Supprimer l'établissement
        $requeteSuppressionEtablissement = $databaseConnection->prepare("
            DELETE FROM Espaces_louer_ WHERE id_adr = :id_adr
        ");
        $requeteSuppressionEtablissement->execute([
            'id_adr' => htmlspecialchars($id_adr)
        ]);

        // Supprimer l'adresse
        $requeteSuppressionAdresse = $databaseConnection->prepare("
            DELETE FROM Adresse_es WHERE id_adr = :id_adr
        ");
        $requeteSuppressionAdresse->execute([
            'id_adr' => htmlspecialchars($id_adr)
        ]);

        $databaseConnection->commit();

        echo "L'adresse, l'établissement, les salles et les cours prévus ont été supprimés avec succès.";
    } catch (PDOException $e) {
        $databaseConnection->rollBack();
        // En cas d'erreur, afficher le message d'erreur
        echo "Erreur lors de la suppression : " . $e->getMessage();
    }
}

