<?php
function modif_date($date, $format)
{
    $timestamp = strtotime($date);
    if ($format == 'date_heure') {
        $newDate = date("d-m-Y H:i:s", $timestamp);
    }
    if ($format == 'date') {
        $newDate = date("d-m-Y", $timestamp);
    }

    return $newDate;
}
