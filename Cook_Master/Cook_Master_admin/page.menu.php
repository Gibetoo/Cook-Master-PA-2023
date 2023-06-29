<?php 
session_start();
ini_set('display_errors', 1);

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
                <h1 class="text-center mb-2">Menu</h1>
                <h2 class="text-center"><a href="gestion_degustations" class="color: black;">Gestion des sites de dégustations</a></h2>
                <h2 class="text-center"><a href="gestion_utilisateurs">Gestion des utilisateurs</a></h2>
                <h2 class="text-center"><a href="page.prestataire">Gestion des prestataires</a></h2>
                <h2 class="text-center"><a href="#">Gestion des livraisons</a></h2>
                <h2 class="text-center"><a href="page.salle">Gestion des salles</a></h2>
                <h2 class="text-center"><a href="#">Gestions des ateliers</a></h2>
                <h2 class="text-center"><a href="#">Gestion des leçon/cours</a></h2>
                <h2 class="text-center"><a href="#">Administration de la messagerie</a></h2>
                <h2 class="text-center"><a href="page.materiels">Gestions des matériels</a></h2>
                <h2 class="text-center"><a href="page.formation">Gestion des Formations</a></h2>
            </div>
            <div class="text-center mt-2">
                <a href="entities/users/deconnexion.php" class="book-a-table-btn scrollto">Déconnexion</a>
            </div>
        </div>

    </main><!-- End Main -->

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>