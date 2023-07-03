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
            <div class="m-4">
                <h1 class="text-center">Formulaire de Paiement</h1>
                <div class="d-flex mt-4">
                    <div class="me-4 text-center">
                        <form action="page.paiement" method="POST">
                            <input type="hidden" name="abonnement" value="<?= $_POST['abonnement'] ?>">
                            <input type="hidden" name="mode" value="mensuel">
                            <h2>
                                <NOBR>Choisir l'abonnement mensuel</NOBR>
                            </h2>
                            <?php
                            if ($_POST['abonnement'] == 'junior') {
                                echo '<input type="hidden" name="prix" value="9,90">';
                                echo '<h2>9,90€/mois</h2>';
                            } else {
                                echo '<input type="hidden" name="prix" value="19">';
                                echo '<h2>19€/mois</h2>';
                            }
                            ?>
                            <button type="submit" style="background-color: #cda45e;border-color: #cda45e;" class="btn mt-3">Choisir</button>
                        </form>
                    </div>
                    <div class="text-center">
                        <form action="page.paiement" method="POST">
                            <input type="hidden" name="abonnement" value="<?= $_POST['abonnement'] ?>">
                            <input type="hidden" name="mode" value="annuel">
                            <h2>
                                <NOBR>Choisir l'abonnement annuel</NOBR>
                            </h2>
                            <?php
                            if ($_POST['abonnement'] == 'junior') {
                                echo '<input type="hidden" name="prix" value="113">';
                                echo '<h2>113€/an</h2>';
                            } else {
                                echo '<input type="hidden" name="prix" value="220">';
                                echo '<h2>220€/an</h2>';
                            }
                            ?>
                            <button type="submit" style="background-color: #cda45e;border-color: #cda45e;" class="btn mt-3">Choisir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>