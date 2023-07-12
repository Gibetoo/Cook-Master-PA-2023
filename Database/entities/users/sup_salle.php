<?php 

function supSalle($id_salle) 
{
        require_once __DIR__ . "/../../database/connection.php";
    
        try {
            $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données
            $databaseConnection->beginTransaction();
    
            // Supprimer les réservations liées à la salle
            $requeteSuppressionReservations = $databaseConnection->prepare("
                DELETE FROM suivre WHERE id_cours IN (
                    SELECT id_cours FROM Cours WHERE id_salle = :id_salle
                )
            ");
            $requeteSuppressionReservations->execute([
                'id_salle' => $id_salle
            ]);
    
            // Supprimer les cours associés à la salle
            $requeteSuppressionCours = $databaseConnection->prepare("
                DELETE FROM Cours WHERE id_salle = :id_salle
            ");
            $requeteSuppressionCours->execute([
                'id_salle' => $id_salle
            ]);
    
            // Supprimer la salle
            $requeteSuppressionSalle = $databaseConnection->prepare("
                DELETE FROM Salle WHERE id_salle = :id_salle
            ");
            $requeteSuppressionSalle->execute([
                'id_salle' => $id_salle
            ]);
    
            $databaseConnection->commit();
    
            echo "La salle, les cours associés et les cours réservés ont été supprimés avec succès.";
        } catch (PDOException $e) {
            $databaseConnection->rollBack();
            // En cas d'erreur, afficher le message d'erreur
            echo "Erreur lors de la suppression : " . $e->getMessage();
        }
    }
    