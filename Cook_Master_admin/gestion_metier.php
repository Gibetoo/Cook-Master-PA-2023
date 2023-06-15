<?php
session_start();

require_once 'entities/users/verif_connecter.php';
require_once __DIR__ . "/entities/users/get_metier.php";

?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once 'forms/head.php';
require_once __DIR__ . "/entities/users/get_prest.php";
?>

<body>

    <?php /* require_once 'forms/header_base_admin.php'; */ ?>

    <!-- ======= Hero Main ======= -->
    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">

            <h1 class="text-center">Gestion des métiers</h1>

            <table class="text-white text-center table table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nom</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $results = getMetier();
                    
                     foreach ($results as $metier) { // On parcourt les utilisateurs
                        echo '<tr>';
                        echo '<td></td>';
                        echo '<td class="text-white"><NOBR>' . $metier['nom_metier'] . '</NOBR></td>';
                        echo '<td><NOBR>';
                        
                            echo '<form action="sup_user.php" method="POST">';
                            echo '<button type="submit" value="' . $metier['nom_metier'] . '" name="nom_metier" class="btn btn-danger btn-sm">Supprimer</button>';
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