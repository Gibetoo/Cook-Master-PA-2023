<?php
session_start();
require_once 'entities/users/verif_connecter.php';
?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once 'forms/head.php';
?>

<body>

    <?php 
    require_once 'forms/header_base_admin.php';
    require_once 'entities/users/get_recette.php';
    ?>

    <!-- ======= Hero Main ======= -->
    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">

            <h1 class="text-center">Gestion des recettes</h1>
            <?php 
                include "forms/message.php";
            ?>
            <table class="text-white text-center table table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Catégorie</th>
                        <th scope="col"><NOBR>Nom de la recette</NOBR></th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        
                        foreach ($results as $recette) { // On parcourt les utilisateurs
                        echo '<tr>';
                        echo '<td></td>';
                        if ($recette['id_cat'] == 1) {
                            $cat = "Entrée";
                        }
                        if ($recette['id_cat'] == 2) {
                            $cat = "Plat";
                        }
                        if ($recette['id_cat'] == 3) {
                            $cat = "Dessert";
                        }
                        echo '<td class="text-white"><NOBR>' . $cat . '</NOBR></td>';
                        echo '<td class="text-white"><NOBR>' . $recette['nom_recette']. '</NOBR></td>';
                        echo '<td><NOBR>';
                            echo '<form action="sup_recette.php" method="POST">';
                            echo '<button type="submit" value="' . $recette['id_recette'] . '" name="id_recette" class="btn btn-danger btn-sm">Supprimer</button>';
                            echo '</form>';
                        echo '</NOBR></td>';
                        echo '</tr>';
                    }?>
                </tbody>
            </table>
        </div>
    </main><!-- End Main -->

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>