<?php

function supRecette($id_recette) 
{
    require_once __DIR__ . "/../../database/connection.php";

    try {
        $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données

        $databaseConnection->beginTransaction();

        // Supprimer la recette
        $deleteRecetteQuery = $databaseConnection->prepare("
            DELETE FROM recette WHERE id_recette = :id_recette
        ");
        $deleteRecetteQuery->execute([
            "id_recette" => $id_recette
        ]);

        $databaseConnection->commit();

        return [
            "success" => true,
            "message" => "La recette a été supprimée avec succès"
        ];
    } catch (PDOException $e) {
        $databaseConnection->rollBack();
        return [
            "success" => false,
            "message" => "Erreur lors de la suppression de la recette : " . $e->getMessage()
        ];
    }
}
