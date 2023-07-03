<?php

function getUrlImage($files)
{

    if (!empty($files)) {
        if ($files['error'] == 0) {

            $maxSize = 500000;
            $validExt = [
                'image/jpeg',
                'image/png',
                'image/gif'
            ];

            if ($files['size'] > $maxSize) {
                header('location: ../page.materiels.php?message=Le fichier est trop lourd !.&type=danger');
                exit;
            }

            $fileName = $files['name'];

            if (!in_array($files['type'], $validExt)) {
                header('location: ../page.materiels.php?message=Le fichier n\'est pas valide !&type=danger');
                exit;
            }

            $chemin = 'upload';
            if (!file_exists($chemin)) {
                mkdir($chemin);
            }

            $chemin2 = '../../../Cook_Master/entities/users/upload';
            if (!file_exists($chemin2)) {
                mkdir($chemin2);
            }

            $array = explode('.', $fileName);
            $extension = end($array);
            $filename = 'image-' . time() . '.' . $extension;
            $destination = $chemin . '/' . $filename;
            $destination2 = $chemin2 . '/' . $filename;
            move_uploaded_file($files['tmp_name'], $destination);
            copy($destination, $destination2);
            
            return $filename;
        }
    }
}
