<?php
session_start();

require_once 'entities/users/verif_connecter.php';
require_once __DIR__ . "/entities/users/get_prest.php";

?>

<!DOCTYPE html>
<html lang="en">

<?php require_once 'forms/head.php'; ?>

<body>

    <?php require_once 'forms/header_base_admin.php'; ?>

    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">
            <div class="row">
                <form action="entities/users/page.confirmation_formation" method="POST" enctype="multipart/form-data">
                    <h1 class="text-center">Créé une formation</h1>

                    <h2 class="text-center mt-3">Choisir le prestataire</h2>

                    <div class="mt-3">
                        <?php
                        $counter = 0;
                        foreach ($results as $prest) {
                            echo '<div class="form-check mt-3">';
                            echo '<input class="form-check-input" type="checkbox" id="check1" name="prest-' . $counter . '" value="' . $prest['nom_pres'] . '" >';
                            echo '<label class="form-check-label">' . $prest['nom_pres'] . '</label>';
                            echo '</div>';
                            $counter++;
                        };
                        ?>
                    

                </form>
            </div>
        </div>

    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>