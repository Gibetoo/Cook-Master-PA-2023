<?php
session_start();

require_once 'entities/users/verif_connecter.php';


?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once 'forms/head.php';
require_once __DIR__ . "/entities/users/get_categorie.php";
$result = getCategorie();

?>

<body>

    <?php require_once 'forms/header_base_admin.php';
    ?>

    <!-- ======= Hero Main ======= -->
    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">

            <h1 class="text-center">Gestion des Catégories</h1>
            <?php 
                include "forms/message.php";
            ?>
            <table class="text-white text-center table table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nom de la catégorie</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        
                        foreach ($result as $categorie) { // On parcourt les utilisateurs
                        echo '<tr>';
                        echo '<td></td>';
                        echo '<td class="text-white"><NOBR>' . $categorie['nom_cat'] . '</NOBR></td>';
                        echo '<td><NOBR>';
                            echo '<form action="sup_categorie.php" method="POST">';
                            echo '<button type="submit" value="' . $categorie['id_cat'] . '" name="id_cat" class="btn btn-danger btn-sm">Supprimer</button>';
                            echo '</form>';
                        echo '</NOBR></td>';
                    }?>
                    </tr>
                </tbody>
            </table>
        </div>
    </main><!-- End Main -->

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>