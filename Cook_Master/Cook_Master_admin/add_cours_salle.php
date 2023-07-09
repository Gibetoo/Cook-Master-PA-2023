<?php
session_start();

ini_set('display_errors', 1);

require_once 'entities/users/verif_connecter.php';

// require_once __DIR__ . "/entities/users/get_salle_dispo.php";
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
                <form action="add_cours_salle_dispo" method="POST">
                    <h1 class="text-center">Ajouter un Cours</h1>
                    <h2 class="text-center mt-3">Selectionner la salle</h2>
                    <div class="mt-3">
                        <div class="form-group">
                            <h4 class="text-center mt-4">Selectionner une date pour le cours</h4>
                            <label for="date">Sélectionnez une date :</label>
                            <input type="date" id="date" class="form-control" name="date">
                        </div>
                        <div class="mt-5 text-center">
                            <button type="submit" class="btn-menu animated fadeInUp scrollto" style="background-color: #cda45e;border-color: #cda45e;">Ajouter</button>
                        </div>
                        <?php
                        /* $counter_recette = 0;
                        foreach ($results as $recette) {
                            echo '<div class="form-check mt-3">';
                            echo '<input class="form-check-input" type="checkbox" id="check1" name="recette-' . $counter_recette . '" value="' . $recette['nom_recette'] . '" >';
                            echo '<label class="form-check-label">' . $recette['nom_recette'] . '</label>';
                            echo '</div>';
                            $counter_recette++;
                        }; */
                        ?>
                    </div>

                    <input type="hidden" name="nom_cours" value="<?= $_GET['nom_cours']; ?>">
                    <input type="hidden" name="prix_cours" value="<?= $_GET['prix_cours']; ?>">
                    <input type="hidden" name="description_cours" value="<?= $_GET['description_cours']; ?>">
                    <input type="hidden" name="pres_cours" value="<?= $_GET['pres_cours'] ?>">
                    <!-- <input type="hidden" name="nb_recette" value="<?= $counter_recette ?>"> -->
                </form>
            </div>
        </div>

    </main><!-- End Main -->

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>