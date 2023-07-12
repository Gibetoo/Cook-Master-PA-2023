<?php
session_start();

require_once 'entities/users/verif_connecter.php';
require_once __DIR__ . "/entities/users/get_salle.php";
require_once __DIR__ . "/entities/users/get_one_local.php";

ini_set('display_errors', 1);

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

            <h1 class="text-center">Gestion des salles</h1>

            <table class="text-white text-center table table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nom de la salle</th>
                        <th scope="col">Numéro de la salle</th>
                        <th scope="col">Nombre de personne</th>
                        <th scope="col">Prix de la salle</th>
                        <th scope="col">Dimension</th>
                        <th scope="col">Local</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $results = getSalle();
                     foreach ($results as $salle) { // On parcourt les utilisateurs
                        echo '<tr>';
                        echo '<td></td>';
                        echo '<td class="text-white"><NOBR>' . $salle['nom_salle'] . '</NOBR></td>';
                        echo '<td class="text-white"><NOBR>' . $salle['num_salle'] . '</NOBR></td>';
                        echo '<td class="text-white"><NOBR>' . $salle['nb_personne'] . '</NOBR></td>';
                        echo '<td class="text-white"><NOBR>' . $salle['prix_salle'] . '</NOBR></td>';
                        echo '<td class="text-white"><NOBR>' . $salle['dimension'] . '</NOBR></td>';
                        $local = getOneLocal($salle['id_es']);
                        echo '<td class="text-white"><NOBR>' . $local['nom_es'] .'</NOBR></td>';
                     
                        echo '<td><NOBR>';
                        
                            echo '<form action="sup_salle.php" method="POST">';
                            echo '<button type="submit" value="' . $salle['id_salle'] . '" name="id_salle" class="btn btn-danger btn-sm">Supprimer</button>';
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