<?php
session_start();

require_once 'entities/users/verif_connecter.php';

?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once 'forms/head.php';
require_once 'entities/users/get_formation.php';

?>

<body>

    <?php require_once 'forms/header_base_admin.php'; ?>


    <main id="main">
        <section class="materiels">
            <div class="container mt-4">

                <h1>Gestion des Formations</h1>

                <div class="row">

                    <?php
                    foreach ($results as $formation) {
                        echo '<div class="col-lg-4 mt-4">';
                        echo '<div class="card" style="background-color: #404040;height: 750px;">';
                        echo '<div class="container">';
                        echo '<div class="mx-5 mt-5 p-3" style="background-color: #CDA45E;border-radius: 15px;">';
                        echo '<img src="entities/users/upload/' . $formation['image'] . '" class="card-img-top" alt="...">';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="card-body text-center mt-3 mb-3 d-flex flex-column">';
                        echo '<h4 class="card-title">' . $formation['nom_fo'] . '</h4>';
                        echo '<p class="card-text">' . $formation['description'] . '</p>';
                        echo '<h4 class="card-title">Cours</h4>';
                        echo '<p class="card-text">' . $formation['cours'] . '</p>';
                        echo '<div class="mt-auto">';
                        echo '<div class="container px-5">';
                        echo '<h5 class="card-text">' . $formation['prix'] . ' €</h5>';
                        echo '<form action="entities/users/option_formation.php" method="POST">';
                        echo '<input type="hidden" name="id_ma" value="' . $formation['id_ma'] . '">';
                        echo '<select class="form-select" id="sel1" name="action" style="color: white;border-color: grey;background-color: grey;">';
                        echo '<option selected value="action">Action</option>';
                        echo '<option value="modifier">Modifier</option>';
                        echo '<option value="supprimer">Supprimer</option>';
                        echo '</select>';
                        echo '<button class="btn btn-secondary mt-3" style="background-color: grey;color: white;font-family: Gabriella;">Selectionner</button>';
                        echo '</form>';
                        echo '</div>';
                        echo '</div>';
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