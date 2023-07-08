<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<?php require_once 'forms/head.php'; ?>

<body>

    <?php require_once 'forms/header_base.php'; ?>

    <!-- ======= Hero Main ======= -->
    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">
            <div class="row m-4">
                <form action="entities/users/connexion.php" method="POST">
                    <h1 class="text-center">Connectez-vous</h1>
                    
                    <?php require_once "forms/message.php"; ?>

                    <div class="mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Adresse email</label>
                        <input type="email" name="email" class="form-control <?= isset($_GET['validmail']) ? $_GET['validmail'] : (isset($_GET['valid']) ? $_GET['valid'] : "") ?>" id="exampleFormControlInput1" placeholder="name@example.com" required>
                    </div>
                    <div class="mt-3">
                        <label for="inputPassword5" class="form-label">Mot de passe</label>
                        <input type="password" name="password" id="inputPassword5" class="form-control <?= isset($_GET['validpasswd']) ? $_GET['validpasswd'] : (isset($_GET['valid']) ? $_GET['valid'] : "") ?>" placeholder="Password" aria-labelledby="passwordHelpBlock" required>
                    </div>
                    <div class="mt-5 text-center">
                        <button type="submit" class="btn-menu animated fadeInUp scrollto" style="background-color: #cda45e;border-color: #cda45e;">Se connecter</button>
                    </div>
                </form>
                <div class="lien text-center">
                    <a href="page.inscription" class="text-center mt-2">Pas encore inscrit ?</a>
                </div>
                <div class="lien text-center">
                    <a href="page.connexion-prestataire" class="text-center mt-2">Prestataire ?</a>
                </div>
            </div>
        </div>

    </main><!-- End Main -->

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>