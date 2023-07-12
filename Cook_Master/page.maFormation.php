<?php
session_start();
require_once __DIR__ . '/entities/users/verif_connecter.php';
require_once __DIR__ . '/forms/fonction.php';
require_once __DIR__ . '/entities/users/get-formation-user.php';
require_once 'Cook_Master_admin/entities/users/get_one_formation.php';
$formation = getFormationUser($_SESSION['user']['email']);
$formation = getOneFormation($formation['id_fo']);
?>

<!DOCTYPE html>
<html>

<?php require_once 'forms/head.php'; ?>

<body>

    <?php require_once 'forms/header_base.php'; ?>

    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">
            <div class="row m-4 text-center">
                <div class="me-5">
                    <h1 class="text-center" style="color: #cda45e;">Récapitulatif de la formation</h1>
                    <div class="my-5">
                        <h3 class="mt-4" style="color: #cda45e;">Titre du cours</h3>
                        <h4><?= $formation['nom_fo'] ?></h4>
                    </div>
                    <div class="my-5">
                        <h3 style="color: #cda45e;">Description</h3>
                        <h4><?= $formation['description'] ?></h4>
                    </div>
                    <div class="my-5">
                        <h3 style="color: #cda45e;">Cours</h3>
                        <h4><?= $formation['cours'] ?></h4>
                    </div>
                </div>
                <div class="text-center me-2">
                    <a href="page.profil" class="btn-menu animated fadeInUp scrollto">retour</a>
                </div>
            </div>
    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>