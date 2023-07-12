<?php

function supCours($id_cours) {
    require_once __DIR__ . "/../../database/connection.php";

    try {
        $databaseConnection = getDatabaseConnection(); 
        $databaseConnection->beginTransaction();

        
        $requeteSuppressionSuivre = $databaseConnection->prepare("
            DELETE FROM suivre WHERE id_cours = :id_cours
        ");
        $requeteSuppressionSuivre->execute(['id_cours' => $id_cours]);

        // Supprimer le cours lui-même
        $requeteSuppressionCours = $databaseConnection->prepare("
            DELETE FROM Cours WHERE id_cours = :id_cours
        ");
        $requeteSuppressionCours->execute(['id_cours' => $id_cours]);

        $databaseConnection->commit();

        echo "Le cours et les enregistrements associés ont été supprimés avec succès.";
    } catch (PDOException $e) {
        $databaseConnection->rollBack();
        echo "Erreur lors de la suppression du cours : " . $e->getMessage();
    }
}
