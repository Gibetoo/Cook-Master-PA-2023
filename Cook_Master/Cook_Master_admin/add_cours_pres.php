<?php
session_start();

ini_set('display_errors', 1);

require_once 'entities/users/verif_connecter.php';
require_once __DIR__ . "/entities/users/get_metier.php";

$results_metier = getMetier();

require_once __DIR__ . "/entities/users/get_prest.php";
require_once __DIR__ . "/entities/users/get_idprest.php";
require_once __DIR__ . "/entities/users/get_url_image.php";


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
                <form action="add_cours_recette" method="POST" enctype="multipart/form-data">
                    <h1 class="text-center">Ajouter un Cours</h1>
                    <h2 class="text-center mt-3">Selectionner un prestataire</h2>
                    <div class="d-flex">
                        <div class="mt-2 mx-5">
                            <div class="mt-3">
                                <label for="sel1">Préstataire pour le cours :</label>
                                <select class="form-select" id="sel1" name='pres_cours' required>
                                    <option selected value='null'>Choisir un préstataire</option>
                                    <?php
                                    foreach ($results as $nomPrest) {
                                        $nomMetier = getidPrest($nomPrest['id_metier']);
                                        echo '<option value=' . $nomPrest['email_pres'] . '>' . $nomPrest['nom_pres'] . ' ' . $nomPrest['prenom_pres'] . ', ' . $nomMetier . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <button type="submit" class="btn-menu animated fadeInUp scrollto" style="background-color: #cda45e;border-color: #cda45e;">Ajouter</button>
                    </div>
                    
                    <input type="hidden" name="nom_cours" value="<?= $_POST['nom_cours']; ?>">
                    <input type="hidden" name="prix_cours" value="<?= $_POST['prix_cours']; ?>">
                    <input type="hidden" name="description_cours" value="<?= $_POST['description_cours']; ?>">
                </form>
            </div>
        </div>

    </main><!-- End Main -->

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>