<?php
session_start();

require_once 'entities/users/verif_connecter.php';

?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once 'forms/head.php';
require_once 'entities/users/get_materiels.php';

?>

<body>

    <?php require_once 'forms/header_base_admin.php'; ?>


    <main id="main">
        <section id="materiels" class="materiels">
            <div class="container mt-4">

                <h1>Nos matériels</h1>

                <div class="row">

                    <div class="text-center my-5">
                        <a type="submit" href="page.creer_materiel.php" class="btn bg-white btn-bg">Ajouter un nouveau matériel</a>
                    </div>
                    <?php

                    foreach ($results as $materiel) {
                        echo '<div class="col-lg-4 mt-4">';
                        echo '<div class="card" style="background-color: #404040;">';
                        echo '<div class="container">';
                        echo '<div class="m-5 p-3" style="background-color: #CDA45E;border-radius: 15px;">';
                        echo '<img src="assets/img/Cook_Junior.png" class="card-img-top" alt="...">';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="card-body text-center">';
                        echo '<h5 class="card-title">' . $materiel['nom_ma'] . '</h5>';
                        echo '<p class="card-text">' . $materiel['description'] . '</p>';
                        echo '<a href="#" class="btn btn-secondary" style="color: black;font-family: Gabriella;">Selectionner</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }; ?>

                </div>
            </div>
        </section>
    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>