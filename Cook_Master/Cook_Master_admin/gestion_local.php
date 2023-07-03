<?php
session_start();

require_once 'entities/users/verif_connecter.php';
require_once __DIR__ . "/entities/users/get_local.php";
require_once __DIR__ . "/entities/users/get_adresse_lo.php";
ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once 'forms/head.php';
require_once __DIR__ . "/entities/users/get_one_adresse_lo.php";


?>

<body>

    <?php require_once 'forms/header_base_admin.php'; ?>

    <!-- ======= Hero Main ======= -->
    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">

            <h1 class="text-center">Gestion des locaux</h1>
            <?php 
                include "forms/message.php";
                ?>

            <table class="text-white text-center table table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nom du local</th>
                        <th scope="col">Dimension</th>
                        <th scope="col">Nombre de salles</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $results = getLocal();
                    

                    
                     foreach ($results as $local) { // On parcourt les utilisateurs
                        echo '<tr>';
                        echo '<td></td>';
                        echo '<td class="text-white"><NOBR>' . $local['nom_es'] . '</NOBR></td>';
                        echo '<td class="text-white"><NOBR>' . $local['dimension'] . '</NOBR></td>';
                        echo '<td class="text-white"><NOBR>' . $local['nb_salle'] . '</NOBR></td>';
                        $adresse = getOneAdresse($local['id_adr']);
                        echo '<td class="text-white"><NOBR>' . $adresse['num_bat_es'] .' '. $adresse['rue_es'] .', '. $adresse['code_postal_es'] .', '. $adresse['ville_es']. '</NOBR></td>';
                     
                        echo '<td><NOBR>';
                        
                            echo '<form action="sup_local.php" method="POST">';
                            echo '<button type="submit" value="' . $local['id_es'] . '" name="id_es" class="btn btn-danger btn-sm">Supprimer</button>';
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