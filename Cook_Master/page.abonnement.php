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
                <h1 class="text-center">ABONNEMENT</h1>
                <div class="mt-2">
                    <h2>Abonnement : Cadet</h2>
                    <h2>Date de début : 25 mai 2023</h2>
                    <h2>Date de fin : 25 mai 2024</h2>
                </div>
                <div class="mt-2">
                    <h2>Avantage :</h2>
                    <h2>- Suppression des Publicités</h2>
                </div>
            </div>
        </div>

    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>