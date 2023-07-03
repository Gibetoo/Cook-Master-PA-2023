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
                <form action="entities/users/new_local" method="POST" enctype="multipart/form-data">
                    <h1 class="text-center">Ajouter un local</h1>

                    <div class="d-flex">

                        <div class="mt-3 mx-5">
                        <div class="mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Nom</label>
                                <input type="text" name="nom_es" class="form-control" id="exampleFormControlInput1" placeholder="Nom">
                            </div>
                            <div class="mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Dimension</label>
                                <input type="number" name="dimension" class="form-control" id="exampleFormControlInput1" placeholder="m²">
                            </div>
                            <div class="mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Nombre de salles</label>
                                <input type="number" name="nb_salle" class="form-control" id="exampleFormControlInput1" placeholder="Nombre de salles">
                            </div>
                            <div class="mt-3">
                                <label class="mt-3" for="sel1">Adresse :</label>
                                <select class="form-select" id="sel1" name='id_adr'>
                                    <option selected>Adresse</option>
                                    <?php
                                    $results = getAdresseLo();

                                    foreach ($results as $adresse) {
                                        echo '<option value=' . $adresse['id_adr'] . '>' . $adresse['num_bat_es'] .' '. $adresse['rue_es'] . ' '. $adresse['code_postal_es'] .', '. $adresse['ville_es'] .', '. $adresse['pays_es'] . '</option>';
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