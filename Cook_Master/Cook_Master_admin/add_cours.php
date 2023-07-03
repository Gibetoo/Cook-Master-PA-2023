<?php
session_start();

require_once 'entities/users/verif_connecter.php';
require_once __DIR__ . "/entities/users/get_adresse_lo.php";


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
                <form action="add_cours_pres" method="POST" enctype="multipart/form-data">
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
                                    <input type="file" class="form-control" name="image_cours" accept="image/jpg, image/gif, image/png, image/jpeg">
                                </div>
                            </div>
                            <div class="mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Prix</label>
                                <input type="number" name="prix" min="0" class="form-control" id="exampleFormControlInput1" placeholder="Prix">
                            </div>
                            <div class="mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Description</label>
                                <textarea type="text" name="description" class="form-control" id="exampleFormControlInput1">Description</textarea>
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