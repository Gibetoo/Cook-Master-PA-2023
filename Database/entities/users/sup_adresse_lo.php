<?php 

function supAdresselo($id_adr) 
{
    require_once __DIR__ . "/../../database/connection.php";

    try {
        $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données
        $databaseConnection->beginTransaction();
        // Supprimer les salles associées au local
        $requeteSuppressionSalle = $databaseConnection->prepare("DELETE FROM Salle WHERE id_es IN (SELECT id_es FROM Espaces_louer_ WHERE id_adr = :id_adr)");
        $requeteSuppressionSalle->execute([
            'id_adr' => htmlspecialchars($id_adr)
        ]);

        // Supprimer l'établissement
        $requeteSuppressionEtablissement = $databaseConnection->prepare("DELETE FROM Espaces_louer_ WHERE id_adr = :id_adr");
        $requeteSuppressionEtablissement->execute([
            'id_adr' => htmlspecialchars($id_adr)
        ]);
        $requeteSuppressionAdresse = $databaseConnection->prepare("DELETE FROM Adresse_es WHERE id_adr = :id_adr");
        $requeteSuppressionAdresse->execute([
            'id_adr' => htmlspecialchars($id_adr)
        ]);
        $databaseConnection->commit();

        echo "L'adresse, le local et les salles associées ont été supprimés avec succès.";
    } catch (PDOException $e) {
        $databaseConnection->rollBack();
        // En cas d'erreur, afficher le message d'erreur
        echo "Erreur lors de la suppression du local : " . $e->getMessage();
    }   
}
