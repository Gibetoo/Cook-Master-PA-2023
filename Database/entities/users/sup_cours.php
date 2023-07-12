<?php

function supCours($id_cours) {

    require_once __DIR__ . "/../../database/connection.php";

    try {
        $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données
        $databaseConnection->beginTransaction();

        // Supprimer les réservations liées au cours
        $requeteSuppressionReservations = $databaseConnection->prepare("
            DELETE FROM suivre WHERE id_cours = :id_cours
        ");
        $requeteSuppressionReservations->execute([
            'id_cours' => $id_cours
        ]);

        // Supprimer le cours
        $requeteSuppressionCours = $databaseConnection->prepare("
            DELETE FROM Cours WHERE id_cours = :id_cours
        ");
        $requeteSuppressionCours->execute([
            'id_cours' => $id_cours
        ]);

        $databaseConnection->commit();

        echo "Le cours et les réservations associées ont été supprimés avec succès.";
    } catch (PDOException $e) {
        $databaseConnection->rollBack();
        // En cas d'erreur, afficher le message d'erreur
        echo "Erreur lors de la suppression : " . $e->getMessage();
    }
}

