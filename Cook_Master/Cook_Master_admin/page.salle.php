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
                <h1 class="text-center mb-2">Gestion des Espasses</h1>
                <h2 class="text-center"><a href="add_local" class="color: black;">Ajouter un local</a></h2>
                <h2 class="text-center"><a href="gestion_local">Gestion des locaux</a></h2>
                <h2 class="text-center"><a href="add_salle" class="color: black;">Ajouter une salle</a></h2>
                <h2 class="text-center"><a href="gestion_salle">Gestion des salles</a></h2>
                <h2 class="text-center"><a href="add_adresse_lo" class="color: black;">Ajouter une adresse de local</a></h2>
                <h2 class="text-center"><a href="gestion_adresse_lo" class="color: black;">Gestion des adresses</a></h2>
                
            </div>
        </div>

    </main><!-- End Main -->

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>