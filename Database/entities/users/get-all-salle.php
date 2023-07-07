<?php

function getAllSalle($heure_debut, $heure_fin, $date, $id_es): array{
    require_once __DIR__ . "/../../database/connection.php";

    $sanitizedColumns = [
        
        "heure_debut" => htmlspecialchars($heure_debut),
        "heure_fin" => htmlspecialchars($heure_fin),
        "date" => htmlspecialchars($date),
        "id_es" => htmlspecialchars($id_es), // On sanitize l'email

    ];


    $databaseConnection = getDatabaseConnection();
    $getSalleQuery = $databaseConnection->query("SELECT * FROM Salle WHERE id_es = :id_es AND heure_debut = :heure_debut AND heure_fin = :heure_fin AND date = :date;");
    $getSalleQuery->execute($sanitizedColumns);
    $salledata = $getSalleQuery->fetch(PDO::FETCH_ASSOC);

    if (!$salledata) { // Si l'utilisateur n'existe pas
        return ["error" => "Salle indisponible à ces horaires non trouvé"]; // utilisateur non trouvé
    }

    return $salledata; // On renvoie les données de l'utilisateur;


}