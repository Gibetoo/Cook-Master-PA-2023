<?php

function getOneRecette(string $id_recette): array
{
    $url = 'http://localhost/Projet-Annuel/Database/index?demande=one_recette&id_recette=' . $id_recette;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt(
        $ch,
        CURLOPT_HTTPHEADER,
        array(
            'Content-Type: application/json'
        )
    );

    $result = curl_exec($ch);
    curl_close($ch);

    $response = json_decode($result, true);

    if ($response["success"] == true) {
        return $response["message"];
    } else {
        return [];
    }
}
