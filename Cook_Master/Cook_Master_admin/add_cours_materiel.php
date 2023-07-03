<?php
session_start();

require_once 'entities/users/verif_connecter.php';
require_once __DIR__ . "/entities/users/get_materiels.php";
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
                <form action="add_cours_recette" method="POST">
                    <h1 class="text-center">Ajouter un Cours</h1>
                    <h2 class="text-center mt-3">Selectionner le(s) matériel(s) nécessaire</h2>

                    <div class="mt-3">
                        <?php
                        $counter_materiel = 0;
                        foreach ($results as $materiel) {
                            echo '<div class="form-check mt-3">';
                            echo '<input class="form-check-input" type="checkbox" id="check1" name="materiel-' . $counter_materiel . '" value="' . $materiel['nom_ma'] . '" >';
                            echo '<label class="form-check-label">' . $materiel['nom_ma'] . '</label>';
                            echo '</div>';
                            $counter++;
                        };
                        ?>
                    </div>

                    <div class="mt-5 text-center">
                        <button type="submit" class="btn-menu animated fadeInUp scrollto" style="background-color: #cda45e;border-color: #cda45e;">Ajouter</button>
                    </div>
                    <input type="hidden" name="nom_cours" value="<?= $_POST['nom_cours']; ?>">
                    <input type="hidden" name="prix" value="<?= $_POST['prix']; ?>">
                    <input type="hidden" name="description" value="<?= $_POST['description']; ?>">
                    <input type="hidden" name="image_cours" value="<?= $_FILES['image_cours']; ?>">
                    <input type="hidden" name="nb_materiel" value="<?= $counter_materiel ?>">
                </form>
            </div>
        </div>

    </main><!-- End Main -->

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>