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
                <form action="entities/users/new_materiel.php" method="POST">
                    <h1 class="text-center">Créé un matériel</h1>
                    <div class="mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Nom</label>
                        <input type="text" name="nom_ma" class="form-control" id="exampleFormControlInput1" placeholder="Name">
                    </div>
                    <div class="mt-3">
                        <label for="inputPassword5" class="form-label">Prix</label>
                        <input type="text" name="prix" id="inputPassword5" class="form-control" placeholder="Prix en €" aria-labelledby="passwordHelpBlock">
                    </div>
                    <div class="mt-3">
                        <label for="inputPassword5" class="form-label">Description</label>
                        <input type="text" name="description" id="inputPassword5" class="form-control" placeholder="Description" aria-labelledby="passwordHelpBlock">
                    </div>
                    <div class="mt-5 text-center">
                        <button type="submit" class="btn-menu animated fadeInUp scrollto">Créé</button>
                    </div>
                </form>
            </div>
        </div>

    </main><!-- End Main -->

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>