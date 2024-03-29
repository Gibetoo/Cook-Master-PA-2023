<?php 
session_start();

require_once 'entities/users/verif_connecter.php';

?>

<!DOCTYPE html>
<html lang="en">

<?php require_once 'forms/head.php'; ?>

<body>

    <?php require_once 'forms/header_base_admin.php'; ?>

    <!-- ======= Hero Main ======= -->
    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">
            <div class="row">
                <h1 class="text-center mb-2">Gestion des Prestataire</h1>
                <h2 class="text-center"><a href="add_prest" class="color: black;">Ajouter un prestataire</a></h2>
                <h2 class="text-center"><a href="gestion_prest">Gestion des prestataires</a></h2>
                <h2 class="text-center"><a href="add_metier">Ajouter un métier</a></h2>
                <h2 class="text-center"><a href="gestion_metier">Gestion des métier</a></h2>
            </div>
        </div>

    </main><!-- End Main -->

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>