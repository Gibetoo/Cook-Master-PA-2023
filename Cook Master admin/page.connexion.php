<!DOCTYPE html>
<html lang="en">

<?php require_once 'forms/head.php'; ?>

<body>

    <?php require_once 'forms/header_base_admin.php'; ?>

    <!-- ======= Hero Main ======= -->
    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">
            <div class="row">
                <form action="/forms/verification/connexion.php" method="POST">
                    <h1 class="text-center">Connectez-vous</h1>
                    <div class="mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Identifiant</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Identifiant">
                    </div>
                    <div class="mt-3">
                        <label for="inputPassword5" class="form-label">Mot de passe</label>
                        <input type="password" id="inputPassword5" class="form-control" placeholder="Mot de passe" aria-labelledby="passwordHelpBlock">
                    </div>
                    <div class="my-5 text-center">
                        <a type="submit" class="btn-menu animated fadeInUp scrollto">Se connecter</a>
                    </div>
                </form>
            </div>
        </div>

    </main><!-- End Main -->

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>