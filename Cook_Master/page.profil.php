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
            <div class="row">
                <h1 class="text-center">PROFIL</h1>
                <div class="mt-2 text-center">
                    <?php
                    echo '<img src="assets/img/Cook_' . $_SESSION['user']['abonnement'] . '.png" style="width: 50%;height: auto;" alt="avatar">';
                    ?>
                </div>
                <div class="mt-2 text-center">
                    <a href="page.compte" class="btn-menu animated fadeInUp scrollto">Compte</a>
                </div>
                <div class="mt-2 text-center">
                    <a href="page.atelier" class="btn-menu animated fadeInUp scrollto">Mes ateliers</a>
                </div>
                <div class="mt-2 text-center">
                    <a href="page.messagerie" class="btn-menu animated fadeInUp scrollto">Messagerie</a>
                </div>
                <div class="mt-2 text-center">
                    <a href="page.abonnement" class="btn-menu animated fadeInUp scrollto">Voir mon abonnement</a>
                </div>
                <div class="mt-2 text-center">
                    <a href="entities/users/deconnexion" class="btn-menu animated fadeInUp scrollto">Déconnexion</a>
                </div>
            </div>
        </div>

    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>