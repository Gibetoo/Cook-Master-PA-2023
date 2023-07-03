<?php
session_start();

require_once 'entities/users/verif_connecter.php';

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
                            <div>
                                <h3 style="color: #cda45e;">
                                    <NOBR>Prestataire</NOBR>
                                </h3>
                                <p><?= $_GET['pres_cours'] ?></p>
                            </div>
                        </div>

                        <h2 class="mt-5">
                            Prix : <?= $_GET['prix_cours'] ?> €
                        </h2>
                    </div>
                </div>
            </div>

            <div class="mt-5 text-center">
                <button type="submit" class="btn-menu animated fadeInUp scrollto" style="background-color: #cda45e;border-color: #cda45e;">Ajouter</button>
            </div>

        </section>
    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>


<!-- <input type="hidden" name="nom_cours" value="<?= $_POST['nom_cours']; ?>">
<input type="hidden" name="prix" value="<?= $_POST['prix_cours']; ?>">
<input type="hidden" name="description" value="<?= $_POST['description_cours']; ?>">
<input type="hidden" name="image_cours" value="<?= $_FILES['image_cours']; ?>">
<input type="hidden" name="pres_cours" value="<?= $_POST['pres_cours'] ?>">
<input type="hidden" name="nb_recette" value="<?= $_POST['nb_recette'] ?>">
<?php
for ($i = 0; $i < $_POST['nb_recette']; $i++) {
    echo "<input type='hidden' name='nb_recette' value=" . $_POST['recette-' . $i] . ">";
}
?>
<input type="hidden" name="nb_materiel" value="<?= $_POST['nb_materiel'] ?>">
<?php
for ($i = 0; $i < $_POST['nb_materiel']; $i++) {
    echo "<input type='hidden' name='nb_recette' value=" . $_POST['materiel-' . $i] . ">";
}
?> -->