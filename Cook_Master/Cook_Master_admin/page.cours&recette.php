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
                <h1 class="text-center mb-2">Gestion des Cours</h1>
                <h2 class="text-center"><a href="add_cours" class="color: black;">Ajouter un cours</a></h2>
                <h2 class="text-center"><a href="add_recette">Ajouter une recette</a></h2>
                <h2 class="text-center"><a href="gestion_cours">Gestion des cours</a></h2>
                <h2 class="text-center"><a href="gestion_recette">Gestion des recettes</a></h2>
                <h2 class="text-center"><a href="page.categorie">Gestion des catégories de recettes</a></h2>
            </div>
        </div>

    </main><!-- End Main -->

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>