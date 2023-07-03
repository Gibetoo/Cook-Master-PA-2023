<?php 

function supLocal($id_es) 
{
    require_once __DIR__ . "/../../database/connection.php";
    try {
        $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données
        // Désactiver les contraintes de clés étrangères
        $databaseConnection->exec("SET FOREIGN_KEY_CHECKS=0");

        // Supprimer les salles associées à l'établissement
        $requeteSuppressionSalle = $databaseConnection->prepare("DELETE FROM Salle WHERE id_es = :id_es");
        $requeteSuppressionSalle->execute([
            'id_es' => htmlspecialchars($id_es)
        ]);

        // Supprimer l'établissement
        $requeteSuppressionEtablissement = $databaseConnection->prepare("DELETE FROM Espaces_louer_ WHERE id_es = :id_es");
        $requeteSuppressionEtablissement->execute([
            'id_es' => htmlspecialchars($id_es)
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