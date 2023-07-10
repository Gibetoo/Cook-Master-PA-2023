<?php

function calendar($id_salle): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $sanitizedColumns = [
        "id_salle" => htmlspecialchars($id_salle), // On sanitize l'email
    ];

    $databaseConnection = getDatabaseConnection(); // On récupère la connexion à la base de données
    $calendar = $databaseConnection->prepare("SELECT date, heure FROM Cours WHERE id_salle = :id_salle"); // On prépare la requête SQL
    $calendar->execute($sanitizedColumns); // On exécute la requête SQL en passant les colonnes sanitizées en paramètres

    $calendarData = $calendar->fetchAll(PDO::FETCH_ASSOC); // On récupère les données de l'utilisateur

    $events = [];
    foreach ($calendarData as $dateTime) {
        $date = $dateTime['date'];
        $heure = $dateTime['heure'];

        $event = [
            'title' => 'Cours',
            'start' => $date . 'T' . $heure,
        ];
        $events[] = $event;
    }

    return $calendarData;
}
