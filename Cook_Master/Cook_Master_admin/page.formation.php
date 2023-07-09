<?php 
session_start();

require_once 'entities/users/verif_connecter.php';

?>

<!DOCTYPE html>
<html>

<?php require_once 'forms/head.php'; ?>

<body>

    <?php require_once 'forms/header_base_admin.php'; ?>

    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">
            <div class="row">
                <h1 class="text-center mb-2">Gestion des Formations</h1>
                <h2 class="text-center"><a href="page.creer_formation">Ajouter une formation</a></h2>
                <h2 class="text-center"><a href="gestion_formation">Gestion des formations</a></h2>
            </div>
        </div>

    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>