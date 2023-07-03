<?php
session_start();

require_once 'entities/users/verif_connecter.php';
require_once __DIR__ . "/entities/users/get_categorie.php";



?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once 'forms/head.php';
require_once __DIR__ . "/entities/users/get_one_categorie.php";


?>

<body>

    <?php require_once 'forms/header_base_admin.php'; ?>

    <!-- ======= Hero Main ======= -->
    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">

            <h1 class="text-center">Gestion des catégorie</h1>
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
                    $results = getCategorie();
                    

                    
                     foreach ($results as $categorie) { // On parcourt les utilisateurs
                        echo '<tr>';
                        echo '<td></td>';
                        echo '<td class="text-white"><NOBR>' . $local['nom_cat'] . '</NOBR></td>';
                        $adresse = getOneAdresse($local['id_adr']);
                        echo '<td class="text-white"><NOBR>' . $adresse['num_bat_es'] .' '. $adresse['rue_es'] .', '. $adresse['code_postal_es'] .', '. $adresse['ville_es']. '</NOBR></td>';
                     
                        echo '<td><NOBR>';
                        
                            echo '<form action="sup_categorie.php" method="POST">';
                            echo '<button type="submit" value="' . $local['id_cat'] . '" name="id_cat" class="btn btn-danger btn-sm">Supprimer</button>';
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