<?php
session_start();

ini_set('display_errors', 1);

require_once 'entities/users/verif_connecter.php';
require_once __DIR__ . "/entities/users/get_recette.php";
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
                <form action="add_cours_materiel" method="POST">
                    <h1 class="text-center">Ajouter un Cours</h1>
                    <h2 class="text-center mt-3">Selectionner le(s) recette(s) nécessaire</h2>
                    <div class="mt-3">
                        <?php
                        $counter_recette = 0;
                        foreach ($results as $recette) {
                            echo '<div class="form-check mt-3">';
                            echo '<input class="form-check-input" type="checkbox" id="check1" name="recette-' . $counter_recette . '" value="' . $recette['nom_recette'] . '" >';
                            echo '<label class="form-check-label">' . $recette['nom_recette'] . '</label>';
                            echo '</div>';
                            $counter_recette++;
                        };
                        ?>
                    </div>

                    <div class="mt-5 text-center">
                        <button type="submit" class="btn-menu animated fadeInUp scrollto" style="background-color: #cda45e;border-color: #cda45e;">Ajouter</button>
                    </div>
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