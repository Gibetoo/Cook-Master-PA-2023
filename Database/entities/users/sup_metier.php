<?php 

function supMetier($id_metier) 
{
    require_once __DIR__ . "/../../database/connection.php";

try {
        $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données
        // Désactiver les contraintes de clés étrangères
        $databaseConnection->exec("SET FOREIGN_KEY_CHECKS=0");

        // Supprimer les salles associées à l'établissement
        $requeteSuppressionPrest = $databaseConnection->prepare("DELETE FROM Prestataire WHERE id_metier = :id_metier");
        $requeteSuppressionPrest->execute([
            'id_metier' => htmlspecialchars($id_metier)
        ]);

        // Supprimer l'établissement
        $requeteSuppressionMetier = $databaseConnection->prepare("DELETE FROM Metier WHERE id_metier = :id_metier");
        $requeteSuppressionMetier->execute([
            'id_metier' => htmlspecialchars($id_metier)
        ]);

        echo "Le local et les salles associées ont été supprimés avec succès.";
    } catch (PDOException $e) {
        // En cas d'erreur, afficher le message d'erreur
        echo "Erreur lors de la suppression du local : " . $e->getMessage();
    } finally {
        // Réactiver les contraintes de clés étrangères
        $databaseConnection->exec("SET FOREIGN_KEY_CHECKS=1");
    }
}