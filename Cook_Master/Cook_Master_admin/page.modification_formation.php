<?php
session_start();

ini_set('display_errors', 1);

require_once 'entities/users/verif_connecter.php';

require_once 'entities/users/get_one_formation.php';

$formation = getOneFormation($_GET['id_fo']); 

?>

<!DOCTYPE html>
<html>

<?php require_once 'forms/head.php'; ?>

<body>

    <?php require_once 'forms/header_base_admin.php'; ?>

    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">
            <div class="row my-3">

                <h1 class="text-center">Modifier la formation</h1>

                <form action="entities/users/modifier_formation.php" method="POST">
                    <div class="mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Nom</label>
                        <input type="text" size="40px" name="nom_fo" class="form-control" id="exampleFormControlInput1" placeholder="Nom" value="<?= $formation['nom_fo'] ?>" required>
                    </div>
                    <div class="mt-3">
                        <label for="inputPassword5" class="form-label">Prix</label>
                        <input type="text" name="prix" id="inputPassword5" class="form-control" placeholder="Prix en €" value="<?= $formation['prix'] ?>" aria-labelledby="passwordHelpBlock">
                    </div>
                    <div class="mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Description</label>
                        <textarea class="form-control" rows="5" id="comment" name="description"><?= $formation['description'] ?></textarea>
                    </div>
                    <div>
                        <input type="hidden" name="id_fo" class="form-control" id="exampleFormControlInput1" value="<?= $_GET['id_fo'] ?>" required>
                    </div>

                    <div class="mt-5 text-center">
                        <button type="submit" class="btn-menu animated fadeInUp scrollto" style="background-color: #cda45e;border-color: #cda45e;">Modifier</button>
                    </div>
                </form>

            </div>
        </div>

    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>