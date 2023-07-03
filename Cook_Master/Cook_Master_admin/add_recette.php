<?php
session_start();

require_once 'entities/users/verif_connecter.php';


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
                <form action="entities/users/new_recette" method="POST" enctype="multipart/form-data">
                    <h1 class="text-center">Ajouter une recette</h1>

                    <div class="d-flex">
                        <div class="mt-3 mx-auto">
                            <div class="mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Nom de la recette</label>
                                <input type="text" name="nom_metier" class="form-control" id="exampleFormControlInput1" placeholder="Nom de la recette">
                            </div>
                            <div class="mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Nom de la recette</label>
                                <textarea type="text" name="description" class="form-control" placeholder="Description" id="exampleFormControlInput1"></textarea>
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