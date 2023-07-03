<?php
session_start();

require_once 'entities/users/verif_connecter.php';
require_once __DIR__ . "/entities/users/get_adresse_lo.php";

?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once 'forms/head.php';
/* require_once __DIR__ . "/entities/users/get_prest.php" */;
?>

<body>

    <?php require_once 'forms/header_base_admin.php'; ?>

    <!-- ======= Hero Main ======= -->
    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">

            <h1 class="text-center">Gestion des Adresses</h1>

            <table class="text-white text-center table table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Numero d'étage</th>
                        <th scope="col">Numero du bâtiment</th>
                        <th scope="col">Rue</th>
                        <th scope="col">Code postal</th>
                        <th scope="col">Ville</th>
                        <th scope="col">Pays</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $results = getAdresseLo();
                    
                     foreach ($results as $adresse) { // On parcourt les utilisateurs
                        echo '<tr>';
                        echo '<td></td>';
                        echo '<td class="text-white"><NOBR>' . $adresse['etage'] . '</NOBR></td>';
                        echo '<td class="text-white"><NOBR>' . $adresse['num_bat_es'] . '</NOBR></td>';
                        echo '<td class="text-white"><NOBR>' . $adresse['rue_es'] . '</NOBR></td>';
                        echo '<td class="text-white"><NOBR>' . $adresse['code_postal_es'] . '</NOBR></td>';
                        echo '<td class="text-white"><NOBR>' . $adresse['ville_es'] . '</NOBR></td>'; 
                        echo '<td class="text-white"><NOBR>' . $adresse['pays_es'] . '</NOBR></td>';
                        echo '<td><NOBR>';

                        
                            echo '<form action="sup_adresse_lo.php" method="POST">';
                            echo '<button type="submit" value="' . $adresse['id_adr'] . '" name="id_adr" class="btn btn-danger btn-sm">Supprimer</button>';
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