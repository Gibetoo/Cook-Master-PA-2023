<?php
session_start();

ini_set('display_errors', 1);

require_once __DIR__ . '/entities/users/verif_connecter.php';
require_once __DIR__ . "/entities/users/get_cours.php";

?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once 'forms/head.php';
?>

<body>

    <?php require_once 'forms/header_base_admin.php'; ?>

    <!-- ======= Hero Main ======= -->
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
                        <th scope="col">date et heure</th>
                        <th scope="col">Description</th>
                        <th scope="col">salle</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (count($results) == 0) {
                        echo "<tr><td colspan='5'></td></tr>";
                        echo "<tr><td colspan='5'>Aucun cours</td></tr>";
                        echo "<tr><td colspan='5'></td></tr>";
                    };

                    foreach ($results as $cours) { // On parcourt les utilisateurs
                        echo '<tr>';
                        echo '<td></td>';
                        echo '<td class="text-white"><NOBR>' . $cours['nom_cours'] . '</NOBR></td>';
                        echo '<td class="text-white"><NOBR>' . $cours['prix'] . '</NOBR></td>';
                        echo '<td class="text-white"><NOBR>' . $cours['date'] . '</NOBR></td>';
                        echo '<td class="text-white"><NOBR>' . $cours['description'] . '</NOBR></td>';
                        echo '<td class="text-white"><NOBR>' . $cours['id_salle'] . '</NOBR></td>';
                        echo '<td><NOBR>';
                        echo '<form action="sup_local.php" method="POST">';
                        echo '<button type="submit" value="' . $cours['id_cours'] . '" name="id_es" class="btn btn-danger btn-sm">Supprimer</button>';
                        echo '</form>';
                        echo '</NOBR></td>';
                    }  ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </main><!-- End Main -->

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>