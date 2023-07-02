<?php
session_start();

require_once 'entities/users/verif_connecter.php';
require_once __DIR__ . "/entities/users/get_metier.php";

$results_metier = getMetier();

require_once __DIR__ . "/entities/users/get_prest.php";

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
                <form action="add_cours_suite" method="POST" enctype="multipart/form-data">
                    <h1 class="text-center">Ajouter un Cours</h1>
                    <div class="d-flex">

                        <div class="mt-3 mx-5">
                            <div class="mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Titre du Cours</label>
                                <input type="text" name="nom_cours" class="form-control" id="exampleFormControlInput1" placeholder="Nom">
                            </div>
                            <div class="mt-3">
                                <label for="disabledSelect" class="form-label">Image pour le cours :</label>
                                <div class="input-group ">
                                    <input type="file" class="form-control" name="photo_pres" accept="image/jpg, image/gif, image/png, image/jpeg" required>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label class="mt-3" for="sel1">Métier :</label>
                                <select class="form-select" id="sel1" name='metier' required>
                                    <option selected value='null'>Choisir un métier</option>
                                    <?php
                                    foreach ($results_metier as $nomMetier) {
                                        echo '<option value=' . $nomMetier['id_metier'] . '>' . $nomMetier['nom_metier'] . '</option>';
                                    } ?>

                                </select>
                            </div>
                            <div class="mt-3">
                                <label for="sel1">Préstataire pour le cours :</label>
                                <select class="form-select" id="sel1" name='metier' required>
                                    <option selected value='null'>Choisir un préstataire</option>
                                    <?php
                                    foreach ($results as $nomPrest) {
                                        if ($nomPrest['id_metier'] == $nomMetier['id_metier']) {
                                            echo '<option value=' . $nomPrest['email_pres'] . '>' . $nomPrest['nom_pres'] . ' ' . $nomPrest['prenom_pres'] . '</option>';
                                        }
                                    } ?>

                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <button type="submit" class="btn-menu animated fadeInUp scrollto" style="background-color: #cda45e;border-color: #cda45e;">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>

    </main><!-- End Main -->

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>