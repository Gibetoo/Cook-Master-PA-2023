<?php
session_start();

require_once 'entities/users/verif_connecter.php';
require_once __DIR__ . "/entities/users/get_adresse_lo.php";


?>

<!DOCTYPE html>
<html>

<?php require_once 'forms/head.php'; ?>

<body>

    <?php require_once 'forms/header_base_admin.php'; ?>

    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">
            <div class="row">
                <form action="add_cours_pres" method="POST" enctype="multipart/form-data">
                    <h1 class="text-center">Ajouter un Cours</h1>
                    <div class="d-flex">

                        <div class="mt-3 mx-5">
                            <div class="mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Titre du Cours</label>
                                <input type="text" name="nom_cours" class="form-control" id="exampleFormControlInput1" placeholder="Nom" required>
                            </div>
                            <div class="mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Prix</label>
                                <input type="number" name="prix_cours" min="0" class="form-control" id="exampleFormControlInput1" required>
                            </div>
                            <div class="mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Description</label>
                                <textarea type="text" name="description_cours" class="form-control" id="exampleFormControlInput1" placeholder="Description" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <button type="submit" class="btn-menu animated fadeInUp scrollto" style="background-color: #cda45e;border-color: #cda45e;">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>