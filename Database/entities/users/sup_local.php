<?php

function supLocal($id_es)
{
    require_once __DIR__ . "/../../database/connection.php";



        try {
            $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données
            $databaseConnection->beginTransaction();
    
            // Récupérer les ID des salles associées au local
            $requeteSallesASupprimer = $databaseConnection->prepare("
                SELECT id_salle FROM Salle WHERE id_es = :id_es
            ");
            $requeteSallesASupprimer->execute([
                'id_es' => $id_es
            ]);
            $sallesASupprimer = $requeteSallesASupprimer->fetchAll(PDO::FETCH_COLUMN);
    
            // Récupérer les ID des cours associés aux salles
            $requeteCoursASupprimer = $databaseConnection->prepare("
                SELECT id_cours FROM Cours WHERE id_salle IN (" . implode(',', array_fill(0, count($sallesASupprimer), '?')) . ")
            ");
            $requeteCoursASupprimer->execute($sallesASupprimer);
            $coursASupprimer = $requeteCoursASupprimer->fetchAll(PDO::FETCH_COLUMN);
    
            // Supprimer les réservations liées aux cours
            if (!empty($coursASupprimer)) {
                $requeteSuppressionReservations = $databaseConnection->prepare("
                    DELETE FROM suivre WHERE id_cours IN (" . implode(',', array_fill(0, count($coursASupprimer), '?')) . ")
                ");
                $requeteSuppressionReservations->execute($coursASupprimer);
            }
    
            // Supprimer les cours réservés associés aux cours
            if (!empty($coursASupprimer)) {
                $requeteSuppressionCoursReserves = $databaseConnection->prepare("
                    DELETE FROM suivre WHERE id_cours IN (" . implode(',', array_fill(0, count($coursASupprimer), '?')) . ")
                ");
                $requeteSuppressionCoursReserves->execute($coursASupprimer);
            }
    
            // Supprimer les cours associés aux salles
            $requeteSuppressionCours = $databaseConnection->prepare("
                DELETE FROM Cours WHERE id_salle IN (" . implode(',', array_fill(0, count($sallesASupprimer), '?')) . ")
            ");
            $requeteSuppressionCours->execute($sallesASupprimer);
    
            // Supprimer les salles associées au local
            $requeteSuppressionSalles = $databaseConnection->prepare("
                DELETE FROM Salle WHERE id_es = :id_es
            ");
            $requeteSuppressionSalles->execute([
                'id_es' => $id_es
            ]);
    
            // Supprimer le local
            $requeteSuppressionLocal = $databaseConnection->prepare("
                DELETE FROM Espaces_louer_ WHERE id_es = :id_es
            ");
            $requeteSuppressionLocal->execute([
                'id_es' => $id_es
            ]);
    
            $databaseConnection->commit();
    
            echo "Le local, les salles, les cours et les cours réservés associés ont été supprimés avec succès.";
        } catch (PDOException $e) {
            $databaseConnection->rollBack();
            // En cas d'erreur, afficher le message d'erreur
            echo "Erreur lors de la suppression : " . $e->getMessage();
        }
}
