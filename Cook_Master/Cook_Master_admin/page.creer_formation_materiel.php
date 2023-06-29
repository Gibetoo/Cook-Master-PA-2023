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

    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">
            <div class="row">
                <form action="page.choix_prest" method="POST" enctype="multipart/form-data">
                    <h1 class="text-center">Créé une formation</h1>

                    <h2 class="text-center mt-3">Choisir les matériels</h2>

                    <div class="mt-3">
                        <?php
                        $counter = 0;
                        foreach ($results as $materiel) {
                            echo '<div class="form-check mt-3">';
                            echo '<input class="form-check-input" type="checkbox" id="check1" name="materiel-'. $counter .'" value="' . $materiel['nom_ma'] . '" >';
                            echo '<label class="form-check-label">' . $materiel['nom_ma'] . '</label>';
                            echo '</div>';
                            $counter++;
                        };
                        ?>
                    </div>

                    <div class="mt-5 text-center">
                        <button type="submit" class="btn-menu animated fadeInUp scrollto" style="background-color: #cda45e;border-color: #cda45e;">Suivant</button>
                    </div>

                    <input type="hidden" name="nb_materiel" value="<?= $counter?>">
                    <input type="hidden" name="nom_fo" value="<?= $_POST['nom_fo'] ?>">
                    <input type="hidden" name="image" value="<?= $_FILES['image'] ?>">
                    <input type="hidden" name="prix" value="<?= $_POST['prix'] ?>">
                    <input type="hidden" name="description" value="<?= $_POST['description'] ?>">

                    <!-- $count = $_POST['nb_materiel'];

                        for ($i = 0; $i < $count; $i++) {
                            echo $_POST['materiel-' . $i];
                            echo '<br>';
                        } -->

                </form>
            </div>
        </div>

    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>