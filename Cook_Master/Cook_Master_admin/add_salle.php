<?php
session_start();

require_once 'entities/users/verif_connecter.php';
require_once __DIR__ . "/entities/users/get_local.php";


ini_set('display_errors', 1);



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
                <form action="entities/users/new_salle.php" method="POST" enctype="multipart/form-data">
                    <h1 class="text-center">Ajouter une salle</h1>

                    <div class="d-flex">

                        <div class="mt-3 mx-5">
                            <div class="mt-3">
                                <label for="exampleFormControlInput1" class="form-label">Nom de la salle</label>
                                <input type="text" name="nom_salle" class="form-control" id="exampleFormControlInput1" placeholder="Nom">
                            </div>
                            <div class="mt-3">
                                <label for="inputPassword5" class="form-label">Numéro de la salle</label>
                                <input type="number" name="num_salle" id="inputPassword5" class="form-control" placeholder="N°" aria-labelledby="passwordHelpBlock">
                            </div>
                            <div class="mt-3">
                                <label for="telephone" class="form-label">Nombre de presonne</label>
                                <input type="number" name="nb_presonne" class="form-control" placeholder="N°" pattern="[0-9]+" maxlength="12" inputmode="numeric" required>
                            </div>
                            


                        </div>

                        <div class="mt-3 mx-5">
                            <div class="mt-3">
                                <label for="inputPassword5" class="form-label">Prix /h</label>
                                <input type="number" name="prix_salle" class="form-control" placeholder="€" pattern="[0-9]+" maxlength="12" inputmode="numeric" required>
                            </div>
                            <div class="mt-3">
                            <label for="inputPassword5" class="form-label">Dimmension</label>
                                <input type="number" name="dimension" class="form-control" placeholder="m²" pattern="[0-9]+" maxlength="12" inputmode="numeric" required>
                            </div>
                            <div class="mt-3">
                                <label class="mt-3" for="sel1">Batiment :</label>
                                <select class="form-select" id="sel1" name='id_es'>
                                    <option selected>Batiment</option>
                                    <?php
                                    $results = getLocal();
                                    
                                    foreach ($results as $local) {
                                        echo '<option value=' . $local['id_es'] . '>' . $local['nom_es'] . '</option>';
                                    } ?>

                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <button type="submit" class="btn-menu animated fadeInUp scrollto" style="background-color: #cda45e;border-color: #cda45e;">Créé</button>
                    </div>
                </form>
            </div>
        </div>

    </main><!-- End Main -->

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>