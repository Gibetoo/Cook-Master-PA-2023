<!DOCTYPE html>
<html lang="en">

<?php require_once 'forms/head.php'; ?>

<body>

    <?php require_once 'forms/header_base.php'; ?>

    <!-- ======= Hero Main ======= -->
    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">
            <div class="d-flex justify-content-center">
                <div class="row">
                    <h1 class="text-center">Créer un compte</h1>
                    <div class="mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Nom</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nom">
                    </div>
                    <div class="mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Prénom</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Prénom">
                    </div>
                    <div class="mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Adresse email</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mt-3">
                        <label for="inputPassword5" class="form-label">Mot de passe</label>
                        <input type="password" id="inputPassword5" class="form-control" placeholder="Mot de passe" aria-labelledby="passwordHelpBlock">
                    </div>
                    <div class="mt-5 text-center">
                        <a type="submit" class="btn-menu animated fadeInUp scrollto">Créer votre compte</a>
                    </div>
                    <div class="lien text-center">
                        <a href="page.connexion.php" class="text-center mt-2">Déjà inscrit ?</a>
                    </div>
                </div>
            </div>
        </div>

    </main><!-- End Main -->

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>