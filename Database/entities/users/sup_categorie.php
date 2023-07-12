<?php 

function supCategorie($id_cat) 
{
    require_once __DIR__ . "/../../database/connection.php";

    try {
        $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données

        $databaseConnection->beginTransaction();

        // Supprimer les recettes liées à la catégorie
        $deleteRecettesQuery = $databaseConnection->prepare("
            DELETE FROM recette WHERE id_cat = :id_cat
        ");
        $deleteRecettesQuery->execute([
            "id_cat" => htmlspecialchars($id_cat)
        ]);

        // Supprimer la catégorie
        $deleteCategorieQuery = $databaseConnection->prepare("
            DELETE FROM Categorie WHERE id_cat = :id_cat
        ");
        $deleteCategorieQuery->execute([
            "id_cat" => htmlspecialchars($id_cat)
        ]);

        $databaseConnection->commit();

        return [
            "success" => true,
            "message" => "La catégorie et les recettes liées ont été supprimées avec succès"
        ];
    } catch (PDOException $e) {
        $databaseConnection->rollBack();
        return [
            "success" => false,
            "message" => "Erreur lors de la suppression de la catégorie : " . $e->getMessage()
        ];
    }
}
