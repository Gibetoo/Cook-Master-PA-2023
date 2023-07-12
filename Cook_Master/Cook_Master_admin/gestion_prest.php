<?php
session_start();

require_once 'entities/users/verif_connecter.php';
require_once __DIR__ . "/entities/users/get_idprest.php";


?>

<!DOCTYPE html>
<html>

<?php
require_once 'forms/head.php';
require_once __DIR__ . "/entities/users/get_prest.php";


?>

<body>

    <?php require_once 'forms/header_base_admin.php';
    ?>

    <!-- ======= Hero Main ======= -->
    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">

            <h1 class="text-center">Gestion des prestataires</h1>
            <?php 
                include "forms/message.php";
            ?>
            <table class="text-white text-center table table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Email</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Métier</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        
                        foreach ($results as $prest) { // On parcourt les utilisateurs
                        echo '<tr>';
                        echo '<td></td>';
                        echo '<td class="text-white"><NOBR>' . $prest['email_pres'] . '</NOBR></td>';
                        echo '<td class="text-white"><NOBR>' . $prest['prenom_pres'] . '</NOBR></td>';
                        echo '<td class="text-white"><NOBR>' . $prest['nom_pres'] . '</NOBR></td>';
                        $metier = getidPrest($prest['id_metier']);
                        echo '<td class="text-white"><NOBR>' . $metier . '</NOBR></td>';
                        echo '<td><NOBR>';
                            echo '<form action="sup_prest.php" method="POST">';
                            echo '<button type="submit" value="' . $prest['email_pres'] . '" name="email_pres" class="btn btn-danger btn-sm">Supprimer</button>';
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