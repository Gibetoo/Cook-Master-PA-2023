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
                <form action="entities/users/new_adresse_lo" method="POST" enctype="multipart/form-data">
                    <h1 class="text-center">Ajouter une adresse</h1>

                    <div class="d-flex">

                        <div class="mt-3 mx-5">
                        <div class="mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Nombre d'étage</label>
                                <input type="number" name="etage" class="form-control" id="exampleFormControlInput1" placeholder="Nombre d'étage">
                            </div>
                            <div class="mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Numéro du bâtiment</label>
                                <input type="number" name="num_bat_es" class="form-control" id="exampleFormControlInput1" placeholder="Numéro du bâtiment">
                            </div>
                            <div class="mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Rue</label>
                                <input type="text" name="rue_es" class="form-control" id="exampleFormControlInput1" placeholder="Rue">
                            </div>
                            <div class="mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Code Postal</label>
                                <input type="number" name="code_postal_es" class="form-control" id="exampleFormControlInput1" placeholder="Code Postal">
                            </div>
                            <div class="mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Ville</label>
                                <input type="text" name="ville_es" class="form-control" id="exampleFormControlInput1" placeholder="Ville">
                            </div>
                            <div class="mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Pays</label>
                                <input type="text" name="pays_es" class="form-control" id="exampleFormControlInput1" placeholder="Pays">
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