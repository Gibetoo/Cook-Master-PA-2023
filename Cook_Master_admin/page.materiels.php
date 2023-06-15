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
                        echo '<div class="card" style="background-color: #404040;height: 750px;">';
                        echo '<div class="container">';
                        echo '<div class="mx-5 mt-5 p-3 text-center" style="background-color: white;border-radius: 15px;">';
                        echo '<img src="entities/users/upload/' . $materiel['image'] . '" style="height: 150px;width: auto;" class="card-img-top" alt="...">';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="card-body text-center mt-3 mb-3 d-flex flex-column">';
                        echo '<h4 class="card-title">' . $materiel['nom_ma'] . '</h4>';
                        echo '<p class="card-text">' . $materiel['description'] . '</p>';
                        echo '<h5 class="card-text">' . $materiel['prix'] . ' €</h5>';
                        echo '<div class="mt-auto">';
                        echo '<div class="container px-5">';
                        echo '<form action="entities/users/option_materiel.php" method="POST">';
                        echo '<input type="hidden" name="id_ma" value="' . $materiel['id_ma'] . '">';
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


<!-- <div class="col-lg-4">
            <div class="card" style="background-color: #404040;">
              <div class="container">
                <div class="mx-5 mt-5 p-3" style="background-color: #CDA45E;border-radius: 15px;">
                  <img src="assets/img/Cook_Cadet.png" class="card-img-top" alt="...">
                </div>
              </div>
              <div class="card-body text-center mt-3 mb-3">
                <div class="container">
                  <p class="card-text">Le grade cadet est un abonnement gratuit sur notre site, offrant un accès limité à des recettes, des cours et d'autres fonctionnalités, accompagné de publicités.</p>
                </div>
              </div>
            </div>
          </div> -->