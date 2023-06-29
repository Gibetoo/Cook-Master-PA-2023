<!DOCTYPE html>
<html lang="en">

<?php require_once 'forms/head.php'; ?>

<body>

    <?php require_once 'forms/header_base.php'; ?>

    <!-- ======= Hero Main ======= -->
    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">
            <div class="d-flex justify-content-center m-4">
                <div class="row">
                    <h1 class="text-center">Créer un compte</h1>
                    
                    <form action="entities/users/inscription.php" method="POST">
                    <?php 
                        require_once "forms/message.php";
                    ?>
                        <div class="mt-3">
                            <label for="exampleFormControlInput1" class="form-label">Nom</label>
                            <input type="text" name="nom" class="form-control" id="exampleFormControlInput1" placeholder="Nom" required>
                        </div>
                        <div class="mt-3">
                            <label for="exampleFormControlInput1" class="form-label">Prénom</label>
                            <input type="text" name="prenom" class="form-control" id="exampleFormControlInput1" placeholder="Prénom" required>
                        </div>
                        <div class="mt-3">
                            <label for="exampleFormControlInput1" class="form-label">Adresse email</label>
                            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
                        </div>
                        <div class="mt-3">
                            <label for="inputPassword5" class="form-label">Mot de passe</label>
                            <input type="password" name="password" id="inputPassword5" class="form-control" placeholder="Mot de passe" aria-labelledby="passwordHelpBlock" required>
                        </div>
                        <div class="mt-3">
                            <label for="inputPassword5" class="form-label">Confirmation du mot de passe</label>
                            <input type="password" name="conf_password" id="inputPassword5" class="form-control" placeholder="Confirmation du mot de passe" aria-labelledby="passwordHelpBlock" required>
                        </div>
                        <div class="mt-5 text-center">
                            <button type="submit" class="btn-menu animated fadeInUp scrollto" style="background-color: #cda45e;border-color: #cda45e;">Créer votre compte</button>
                        </div>
                    </form>
                    <div class="lien text-center">
                        <a href="page.connexion" class="text-center mt-2">Déjà inscrit ?</a>
                    </div>
                </div>
            </div>
        </div>

    </main><!-- End Main -->

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>