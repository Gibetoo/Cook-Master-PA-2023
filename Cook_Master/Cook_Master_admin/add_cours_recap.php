<?php
session_start();

require_once 'entities/users/verif_connecter.php';
require_once __DIR__ . "/entities/users/get_one_prest.php";
require_once __DIR__ . "/entities/users/get_one_adresse_lo.php";
require_once __DIR__ . "/entities/users/get_one_salle.php";
require_once "../forms/fonction.php";

$pres = getOnePres($_POST['pres_cours']);
$salle = getOneSalle($_POST['id_salle']);

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
                    <h4><?= $_POST['nom_cours'] ?></h4>
                </div>

                <div class="my-5">
                    <h3 style="color: #cda45e;">Description</h3>
                    <h4><?= $_POST['description_cours'] ?></h4>
                </div>

                <div class="row mt-4">

                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                        <div class="d-flex">
                            <div class="me-5">
                                <h3 style="color: #cda45e;">
                                    <NOBR>Recette(s) vu lors du cours</NOBR>
                                </h3>
                                <?php
                                for ($i = 0; $i < intval($_POST['nb_recette']); $i++) {
                                    if (empty($_POST['recette-' . $i])) {
                                        continue;
                                    }
                                    echo "<li><i class='icofont-check-circled'></i> " . $_POST['recette-' . $i] . "</li>";
                                }
                                ?>
                            </div>
                            <div class="me-5">
                                <h3 style="color: #cda45e;">
                                    <NOBR>Les matériels nécéssaires</NOBR>
                                </h3>
                                <?php
                                for ($i = 0; $i < intval($_POST['nb_materiel']); $i++) {
                                    if (empty($_POST['materiel-' . $i])) {
                                        continue;
                                    }
                                    echo "<li><i class='icofont-check-circled'></i> " . $_POST['materiel-' . $i] . "</li>";
                                }
                                ?>
                            </div>
                            <div class="me-5">
                                <h3 style="color: #cda45e;">
                                    <NOBR>Prestataire</NOBR>
                                </h3>
                                <p><?= $pres['nom_pres'] . ' ' . $pres['prenom_pres'] ?>
                                    <NOBR>Email : <?= $pres['email_pres'] ?></NOBR>
                                </p>
                            </div>
                            <div>
                                <h3 style="color: #cda45e;">
                                    <NOBR>Salle</NOBR>
                                </h3>
                                <p>
                                    <NOBR>Nom : <?= $salle['nom_salle'] ?></NOBR><br>
                                    Adresse : <?= $salle['adresse_salle'] ?>
                                </p>
                            </div>
                        </div>

                    </div>
                    <div>
                        <h3 style="color: #cda45e;">
                            <NOBR>Date et heure</NOBR>
                        </h3>
                        <p><?= modif_date($_POST['date'], 'date') . ' à ' . $_POST['heure'] ?></p>
                    </div>
                </div>

                <h2 class="mt-5">
                    <h3 style="color: #cda45e;">
                        Prix :
                    </h3>
                    <p><?= $_POST['prix_cours'] ?> €</p>
                </h2>

            </div>
            <form action="entities/users/new_cours" method="POST">
                <div class="mt-5 text-center">
                    <button type="submit" class="btn btn-secondary mt-3" style="background-color: #cda45e;border-color: #cda45e;border-radius: 50px;font-family: Gabriella;font-size: 20px;">Valider</button>
                </div>

                <!-- ------------------------------------------------------------------------------------ -->

                <input type="hidden" name="nom_cours" value="<?= $_POST['nom_cours']; ?>">
                <input type="hidden" name="prix_cours" value="<?= $_POST['prix_cours']; ?>">
                <input type="hidden" name="description_cours" value="<?= $_POST['description_cours']; ?>">
                <?php
                $recettes = array();
                for ($i = 0; $i < intval($_POST['nb_recette']); $i++) {
                    if (empty($_POST['recette-' . $i])) {
                        continue;
                    }
                    $recettes[] = $_POST['recette-' . $i];
                }
                ?>
                <input type="hidden" name="recettes" value="<?= implode(', ', $recettes); ?>">
                <?php
                $materiels = array();
                for ($i = 0; $i < intval($_POST['nb_materiel']); $i++) {
                    if (empty($_POST['materiel-' . $i])) {
                        continue;
                    }
                    $materiels[] = $_POST['materiel-' . $i];
                }
                ?>
                <input type="hidden" name="materiels" value="<?= implode(', ', $materiels); ?>">

                <input type="hidden" name="pres_cours" value="<?= $_POST['pres_cours']; ?>">
                <input type="hidden" name="id_salle" value="<?= $_POST['id_salle']; ?>">
                <input type="hidden" name="date" value="<?= $_POST['date']; ?>">
                <input type="hidden" name="heure" value="<?= $_POST['heure']; ?>">

                <!-- ------------------------------------------------------------------------------------ -->

            </form>

        </section>
    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>