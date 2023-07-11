<?php
session_start();
require_once 'entities/users/verif_connecter.php';
require_once 'entities/users/get_cours.php';
?>

<!DOCTYPE html>
<html>
<?php require_once 'forms/head.php';
?>

<body>
    <?php require_once 'forms/header_base_admin.php'; ?>
    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">
            <div class="row">
                <form action="entities/users/modifier_formation_cours.php" method="POST" enctype="multipart/form-data">
                    <h1 class="text-center">Créé une formation</h1>

                    <h2 class="text-center mt-3">Choisir le(s) cour(s)</h2>

                    <div class="mt-4">
                        <?php
                        $counter = 0;
                        foreach ($results as $cours) {
                            echo '<div class="form-check mt-3">';
                            echo '<input class="form-check-input" type="checkbox" id="check1" name="cours-' . $counter . '" value="' . $cours['nom_cours'] . '" >';
                            echo '<label class="form-check-label">' . $cours['nom_cours'] . '</label>';
                            echo '</div>';
                            $counter++;
                        };
                        ?>
                        <div class="mt-5 text-center">
                            <button type="submit" class="btn-menu animated fadeInUp scrollto" style="background-color: #cda45e;border-color: #cda45e;">Suivant</button>
                        </div>
                    </div>
                    <input type="hidden" name="id_fo" class="form-control" id="exampleFormControlInput1" value="<?= $_GET['id_fo'] ?>">
                    <input type="hidden" name="counter" class="form-control" id="exampleFormControlInput1" value="<?= $counter ?>">
                </form>
            </div>
        </div>
    </main>
    <?php require_once 'forms/footer.php'; ?>
</body>

</html>