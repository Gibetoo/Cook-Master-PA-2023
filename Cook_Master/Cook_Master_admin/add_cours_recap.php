<?php
session_start();

require_once 'entities/users/verif_connecter.php';
require_once __DIR__ . "/entities/users/get_one_prest.php";
require_once __DIR__ . "/entities/users/get_one_adresse_lo.php";


$pres = getOnePres($_GET['pres_cours']);
$adresse = getOneAdresse($_GET['id_adr']);

ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once 'forms/head.php';

?>

<body>

    <?php require_once 'forms/header_base_admin.php'; ?>


    <main id="main">
        <section id="materiels" class="materiels">
            <div class="container mt-4">
                <h1 class="text-center" style="color: #cda45e;">Récapitulatif du cours</h1>
                <div class="my-5">
                    <h2 class="mt-4" style="color: #cda45e;">Titre du cours</h2>
                    <h4><?= $_GET['nom_cours'] ?></h4>
                </div>

                <div class="my-5">
                    <h3 style="color: #cda45e;">Description</h3>
                    <h4><?= $_GET['description_cours'] ?></h4>
                </div>

                <div class="row mt-4">

                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                        <div class="d-flex">
                            <div class="me-5">
                                <h3 style="color: #cda45e;">
                                    <NOBR>Recette(s) vu lors du cours</NOBR>
                                </h3>
                                <?php
                                for ($i = 0; $i < intval($_GET['nb_recette']); $i++) {
                                    if (empty($_GET['recette-' . $i])) {
                                        continue;
                                    }
                                    echo "<li><i class='icofont-check-circled'></i> " . $_GET['recette-' . $i] . "</li>";
                                }
                                ?>
                            </div>
                            <div class="me-5">
                                <h3 style="color: #cda45e;">
                                    <NOBR>Les matériels nécéssaires</NOBR>
                                </h3>
                                <?php
                                for ($i = 0; $i < intval($_GET['nb_materiel']); $i++) {
                                    if (empty($_GET['materiel-' . $i])) {
                                        continue;
                                    }
                                    echo "<li><i class='icofont-check-circled'></i> " . $_GET['materiel-' . $i] . "</li>";
                                }
                                ?>
                            </div>
                            <div class="me-5">
                                <h3 style="color: #cda45e;">
                                    <NOBR>Prestataire</NOBR>
                                </h3>
                                <p><?= $pres['nom'] . ' ' . $pres['prenom'] ?>
                                    <NOBR>Email : <?= $pres['email'] ?></NOBR>
                                </p>
                            </div>
                            <?php if (isset($_GET['id_adr'])) { ?>
                                <div>
                                    <h3 style="color: #cda45e;">
                                        <NOBR>Adresse local Cook Master</NOBR>
                                    </h3>
                                    <p><?php echo '<p>' . $adresse['num_bat_es'] . ' ' . $adresse['rue_es']. ', ' . $adresse['code_postal_es']. ', ' .$adresse['ville_es']. ', ' .$adresse['pays_es']. 
                                    '<br>'.'Etage N° : ' .$adresse['etage'].
                                    '</p>' ?></p>
                                    
                                </div>
                            <?php } ?>
                            <div>

                            </div>
                        </div>
                    </div>
                </div>

                <h2 class="mt-5">
                    <h3 style="color: #cda45e;">
                        Prix :
                    </h3>
                    <p><?= $_GET['prix_cours'] ?> €</p>
                </h2>

            </div>
            <form action="entities/users/new_cours" method="POST">
                <div class="mt-5 text-center">
                    <button type="submit" class="btn btn-secondary mt-3" style="background-color: #cda45e;border-color: #cda45e;border-radius: 50px;font-family: Gabriella;font-size: 20px;">Valider</button>
                </div>

                <!-- ------------------------------------------------------------------------------------ -->

                <input type="hidden" name="nom_cours" value="<?= $_GET['nom_cours']; ?>">
                <input type="hidden" name="prix_cours" value="<?= $_GET['prix_cours']; ?>">
                <input type="hidden" name="description_cours" value="<?= $_GET['description_cours']; ?>">
                <?php
                $recettes = array();
                for ($i = 0; $i < intval($_GET['nb_recette']); $i++) {
                    if (empty($_GET['recette-' . $i])) {
                        continue;
                    }
                    $recettes[] = $_GET['recette-' . $i];
                }
                ?>
                <input type="hidden" name="recettes" value="<?= implode(', ', $recettes); ?>">
                <?php
                $materiels = array();
                for ($i = 0; $i < intval($_GET['nb_materiel']); $i++) {
                    if (empty($_GET['materiel-' . $i])) {
                        continue;
                    }
                    $materiels[] = $_GET['materiel-' . $i];
                }
                ?>
                <input type="hidden" name="materiels" value="<?= implode(', ', $materiels); ?>">

                <input type="hidden" name="pres_cours" value="<?= $_GET['pres_cours']; ?>">

                <!-- ------------------------------------------------------------------------------------ -->

            </form>

        </section>
    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>