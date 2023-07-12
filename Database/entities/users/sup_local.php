<?php 

function supLocal($id_es) 
{
    require_once __DIR__ . "/../../database/connection.php";

    try {
        $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données
        $databaseConnection->beginTransaction();

        // Récupérer les salles associées au local
        $requeteSalles = $databaseConnection->prepare("SELECT id_salle FROM Salle WHERE id_es = :id_es");
        $requeteSalles->execute([
            'id_es' => $id_es
        ]);
        $salles = $requeteSalles->fetchAll(PDO::FETCH_COLUMN);

        // Supprimer les cours associés aux salles
        $requeteSuppressionCours = $databaseConnection->prepare("DELETE FROM Cours WHERE id_salle IN (" . implode(',', array_fill(0, count($salles), '?')) . ")");
        $requeteSuppressionCours->execute($salles);

        // Supprimer les entrées de suivi des cours
        $requeteSuppressionSuivi = $databaseConnection->prepare("DELETE FROM suivre WHERE id_cours IN (SELECT id_cours FROM Cours WHERE id_salle IN (" . implode(',', array_fill(0, count($salles), '?')) . "))");
        $requeteSuppressionSuivi->execute($salles);

        // Supprimer les salles associées au local
        $requeteSuppressionSalles = $databaseConnection->prepare("DELETE FROM Salle WHERE id_es = :id_es");
        $requeteSuppressionSalles->execute([
            'id_es' => $id_es
        ]);

        // Supprimer le local
        $requeteSuppressionLocal = $databaseConnection->prepare("DELETE FROM Local WHERE id_es = :id_es");
        $requeteSuppressionLocal->execute([
            'id_es' => $id_es
        ]);

        $databaseConnection->commit();

        echo "Le local, les salles associées et les cours ont été supprimés avec succès.";
    } catch (PDOException $e) {
        $databaseConnection->rollBack();
        // En cas d'erreur, afficher le message d'erreur
        echo "Erreur lors de la suppression du local : " . $e->getMessage();
    }
}

   
