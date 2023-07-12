<?php
session_start();

require_once __DIR__ . '/entities/users/verif_connecter.php';
require_once __DIR__ . "/entities/users/get_cours.php";
require_once __DIR__ . "/entities/users/get_one_salle.php";

?>

<!DOCTYPE html>
<html>

<?php
require_once 'forms/head.php';
?>

<body>

    <?php require_once 'forms/header_base_admin.php'; ?>


    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">

            <h1 class="text-center">Gestion des cours</h1>
            <?php
            include "forms/message.php";
            ?>

            <table class="text-white text-center table table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nom du cours</th>
                        <th scope="col">prix</th>
                        <th scope="col">date</th>
                        <th scope="col">heure</th>
                        <th scope="col">Description</th>
                        <th scope="col">salle</th>
                        <th scope="col">Supprimer</th>
                        <th scope="col">Modifier</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($results as $cours) {
                        echo '<tr>';
                        echo '<td></td>';
                        echo '<td class="text-white"><NOBR>' . $cours['nom_cours'] . '</NOBR></td>';
                        echo '<td class="text-white"><NOBR>' . $cours['prix'] . '</NOBR></td>';
                        echo '<td class="text-white"><NOBR>' . $cours['date'] . '</NOBR></td>';
                        echo '<td class="text-white"><NOBR>' . $cours['heure'] . '</NOBR></td>';
                        echo '<td class="text-white"><NOBR>' . $cours['description'] . '</NOBR></td>';
                        $salle = getOneSalle($cours['id_salle']);
                        echo '<td class="text-white"><NOBR>' . $salle['nom_salle'] . '</NOBR></td>';
                        echo '<td><NOBR>';
                        echo '<form action="sup_cours.php" method="POST">';
                        echo '<button type="submit" value="' . $cours['id_cours'] . '" name="id_cours" class="btn btn-danger btn-sm">Supprimer</button>';
                        echo '</form>';
                        echo '</NOBR></td>';
                        echo '<td><NOBR>';
                        echo '<form action="page.modification_cours" method="POST">';
                        echo '<button type="submit" value="' . $cours['id_cours'] . '" name="id_cours" class="btn btn-danger btn-sm">Modifier</button>';
                        echo '</form>';
                        echo '</NOBR></td>';
                        echo '</tr>';
                    }
                    ?>

                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>