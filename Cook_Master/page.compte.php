<?php
session_start();

require_once 'entities/users/verif_connecter.php';

?>

<!DOCTYPE html>
<html lang="en">

<?php require_once 'forms/head.php'; ?>

<body>

    <?php require_once 'forms/header_base.php'; ?>

    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">
            <div class="row m-3">

                <h1 class="text-center">Modifier votre compte</h1>

                <form action="entities/users/modifier_compte.php" method="POST">
                    <div class="mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Nom</label>
                        <input type="text" size="40px" name="nom" class="form-control" id="exampleFormControlInput1" placeholder="Nom" value="<?= (!isset($_SESSION['user'])) ? '' : $_SESSION['user']['nom'] ?>" required>
                    </div>
                    <div class="mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Prénom</label>
                        <input type="text" name="prenom" class="form-control" id="exampleFormControlInput1" placeholder="Prénom" value="<?= (!isset($_SESSION['user'])) ? '' : $_SESSION['user']['prenom'] ?>" required>
                    </div>
                    <div>
                        <input type="hidden" name="email" class="form-control" id="exampleFormControlInput1" placeholder="email" value="<?= (!isset($_SESSION['user'])) ? '' : $_SESSION['user']['email'] ?>" required>
                    </div>
                    <div class="mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Date de naissance</label>
                        <input type="date" name="date_naissance" class="form-control" id="exampleFormControlInput1" placeholder="date de naissance" value="<?= (!isset($_SESSION['user'])) ? '' : $_SESSION['user']['date_naissance'] ?>" required>
                    </div>
                    <div class="mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Numéro de téléphone</label>
                        <input type="tel" name="num_tel" class="form-control" id="exampleFormControlInput1" placeholder="numéro de téléphone" value="<?= (!isset($_SESSION['user'])) ? '' : $_SESSION['user']['num_tel'] ?>" required>
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