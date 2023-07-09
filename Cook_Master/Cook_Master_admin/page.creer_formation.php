<?php
session_start();

require_once 'entities/users/verif_connecter.php';

?>

<!DOCTYPE html>
<html lang="en">

<?php require_once 'forms/head.php'; ?>

<body>

    <?php require_once 'forms/header_base_admin.php'; ?>

    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">
            <div class="row">
                <form action="page.choix_cours" method="POST" enctype="multipart/form-data">
                    <h1 class="text-center">Créé une formation</h1>
                    <div class="mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Nom de la Formation</label>
                        <input type="text" name="nom_fo" class="form-control" id="exampleFormControlInput1" placeholder="Nom" required>
                    </div>
                    <div class="mt-3">
                        <label for="Image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="Image" accept="image/jpg, image/gif, image/png">
                    </div>
                    <div class="mt-3">
                        <label for="inputPassword5" class="form-label">Prix</label>
                        <input type="number" min="0" value="0" name="prix" id="inputPassword5" class="form-control" aria-labelledby="passwordHelpBlock" required>
                    </div>
                    <div class="mt-3">
                        <label for="inputPassword5" class="form-label">Description</label>
                        <textarea type="text" name="description" id="inputPassword5" class="form-control" placeholder="Description" aria-labelledby="passwordHelpBlock" required></textarea>
                    </div>
                    <div class="mt-5 text-center">
                        <button type="submit" class="btn-menu animated fadeInUp scrollto" style="background-color: #cda45e;border-color: #cda45e;">Suivant</button>
                    </div>
                </form>
            </div>
        </div>

    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>