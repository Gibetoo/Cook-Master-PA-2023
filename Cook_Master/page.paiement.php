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
                <form action="entities/users/verif_paiement.php" method="POST">
                    <div class="form-group mt-3">
                        <label for="cardName">Nom du titulaire de la carte</label>
                        <input type="text" class="form-control" id="cardName" placeholder="Nom du titulaire de la carte" value="<?= $_SESSION['user']['nom'] ?>">
                    </div>
                    <div class="form-group mt-3">
                        <label for="cardNumber">Numéro de carte</label>
                        <input type="text" class="form-control" id="cardNumber" placeholder="Numéro de carte">
                    </div>
                    <div class="d-flex form-row mt-3">
                        <div class="form-group col-md-6">
                            <label for="expirationDate">Date d'expiration</label>
                            <input type="text" class="form-control" id="expirationDate" placeholder="MM/AA">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="cvv">CVV</label>
                            <input type="text" class="form-control" id="cvv" placeholder="CVV">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <h2>Montant à payer : <?= $_POST['prix'] ?>€</h2>
                    </div>
                    <div>
                        <h2>Inscription à l'abonnement <?= $_POST['abonnement'] . ' ' .  $_POST['mode'] ?></h2>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" style="background-color: #cda45e;border-color: #cda45e;" class="btn">Payer</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>