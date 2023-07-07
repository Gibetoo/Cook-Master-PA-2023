<?php
session_start();

require_once 'entities/users/verif_connecter.php';
require_once __DIR__ . "/entities/users/get_adresse_lo.php";

$results = getAdresseLo();

?>

<!DOCTYPE html>
<html lang="en">

<?php require_once 'forms/head.php'; ?>

<body>

    <?php require_once 'forms/header_base_admin.php'; ?>

    <!-- ======= Hero Main ======= -->
    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">
            <div class="row">
                <form action="add_cours_salle" method="GET">
                    <h1 class="text-center">Ajouter un Cours</h1>
                    <h2 class="text-center mt-4">Selectionner le local pour le cours</h2>

                    <table class="text-white text-center table table-striped mt-4">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">
                                    <NOBR>Numero d'étage</NOBR>
                                </th>
                                <th scope="col">
                                    <NOBR>Numero du bâtiment</NOBR>
                                </th>
                                <th scope="col">Rue</th>
                                <th scope="col">
                                    <NOBR>Code postal</NOBR>
                                </th>
                                <th scope="col">Ville</th>
                                <th scope="col">Pays</th>
                                <th scope="col">Selectionner</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($results as $adresse) {
                                echo '<tr>';
                                echo '<td></td>';
                                echo '<td class="text-white"><NOBR>' . $adresse['etage'] . '</NOBR></td>';
                                echo '<td class="text-white"><NOBR>' . $adresse['num_bat_es'] . '</NOBR></td>';
                                echo '<td class="text-white"><NOBR>' . $adresse['rue_es'] . '</NOBR></td>';
                                echo '<td class="text-white"><NOBR>' . $adresse['code_postal_es'] . '</NOBR></td>';
                                echo '<td class="text-white"><NOBR>' . $adresse['ville_es'] . '</NOBR></td>';
                                echo '<td class="text-white"><NOBR>' . $adresse['pays_es'] . '</NOBR></td>';
                                echo '<td><NOBR>';
                                echo '<button type="submit" value="' . $adresse['id_adr'] . '" name="id_adr" class="btn-menu animated fadeInUp scrollto" style="background-color: #cda45e;border-color: #cda45e;" >Ajouter</button>';
                                echo '</NOBR></td>';
                            }  ?>
                            </tr>
                        </tbody>
                    </table>

                    <input type="hidden" name="nom_cours" value="<?= $_GET['nom_cours']; ?>">
                    <input type="hidden" name="prix_cours" value="<?= $_GET['prix_cours']; ?>">
                    <input type="hidden" name="description_cours" value="<?= $_GET['description_cours']; ?>">
                    <input type="hidden" name="pres_cours" value="<?= $_GET['pres_cours'] ?>">
                    <?php
                    $counter_recette = intval($_GET['nb_recette']);
                    for ($i = 0; $i < intval($_GET['nb_recette']); $i++) {
                        if (empty($_GET['recette-' . $i])) {
                            $counter_recette = $i;
                            continue;
                        }
                        echo "<input type='hidden' name='recette-" . $i . "' value='" . $_GET['recette-' . $i] . "'>";
                    }
                    ?>
                    <input type="hidden" name="nb_recette" value="<?= $counter_recette ?>">
                    <?php
                    $counter_materiel = intval($_GET['nb_materiel']);
                    for ($i = 0; $i < intval($_GET['nb_materiel']); $i++) {
                        if (empty($_GET['materiel-' . $i])) {
                            $counter_materiel = $i;
                            continue;
                        }
                        echo "<input type='hidden' name='materiel-" . $i ."' value='" . $_GET['materiel-' . $i] . "'>";
                    }
                    ?>
                    <input type="hidden" name="nb_materiel" value="<?= $counter_materiel ?>">
                </form>
            </div>
        </div>

    </main><!-- End Main -->

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>