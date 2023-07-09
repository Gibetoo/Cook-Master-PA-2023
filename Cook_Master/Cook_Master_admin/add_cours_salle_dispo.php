<?php
session_start();

ini_set('display_errors', 1);

require_once 'entities/users/verif_connecter.php';

require_once __DIR__ . "/entities/users/verif_date_salle.php";
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
                <form action="entities/users/verif_date_salle" method="POST">
                    <h1 class="text-center">Ajouter un Cours</h1>
                    <h2 class="text-center mt-3">Selectionner la salle</h2>

                    <?php
                    $count = 0;
                    foreach ($results as $salle) { ?>
                        <div>
                            <input type="checkbox" id="salle" name="salle" value="<?= $count ?>">
                            <label for="salle"><?= $salle['nom_salle'] ?></label>
                        </div>
                    <?php
                        $count++;
                    } ?>

                    <input type="hidden" name="nom_cours" value="<?= $_POST['nom_cours']; ?>">
                    <input type="hidden" name="prix_cours" value="<?= $_POST['prix_cours']; ?>">
                    <input type="hidden" name="description_cours" value="<?= $_POST['description_cours']; ?>">
                    <input type="hidden" name="pres_cours" value="<?= $_POST['pres_cours'] ?>">
                    <input type="hidden" name="nb_recette" value="<?= $counter_recette ?>">
                </form>
            </div>
        </div>

    </main><!-- End Main -->

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>