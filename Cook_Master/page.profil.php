<?php
session_start();

require_once __DIR__ . '/entities/users/verif_connecter.php';
require_once __DIR__ . '/forms/fonction.php';

?>

<!DOCTYPE html>
<html lang="en">

<?php require_once 'forms/head.php'; ?>

<body>

    <?php require_once 'forms/header_base.php'; ?>

    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">
            <div class="row m-4">
                <h1 class="text-center">PROFIL</h1>
                <div class="d-flex">
                    <div class="mt-2 text-center">
                        <?php
                        echo '<img src="assets/img/Cook_' . $_SESSION['user']['abonnement'] . '.png" style="width: 200px;height: auto;" alt="avatar">';
                        ?>
                    </div>
                    <div class="row">
                        <div class="mt-2">
                            <h2>Abonnement : <?= $_SESSION['user']['abonnement'] ?></h2>
                            <h2>Date d'inscription : <?= modif_date($_SESSION['user']['date_insc'], "date")?></h2>
                        </div>
                        <div class="mt-2">
                            <h2>Avantage de l'abonnement :</h2>
                            <h2>- Suppression des Publicités</h2>
                        </div>
                    </div>
                </div>
                <div class="mt-3 d-flex justify-content-around">
                    <div class="text-center me-2">
                        <a href="page.compte" class="btn-menu animated fadeInUp scrollto">Compte</a>
                    </div>
                    <div class="text-center me-2">
                        <a href="page.atelier" class="btn-menu animated fadeInUp scrollto"><NOBR>Mes ateliers</NOBR></a>
                    </div>
                    <div class="text-center me-2">
                        <a href="page.messagerie" class="btn-menu animated fadeInUp scrollto">Messagerie</a>
                    </div>
                    <div class="text-center me-2">
                        <a href="entities/users/deconnexion" class="btn-menu animated fadeInUp scrollto">Déconnexion</a>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>