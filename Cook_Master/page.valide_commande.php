<?php
session_start();

ini_set('display_errors', 1);

require_once __DIR__ . '/entities/users/verif_connecter.php';
require_once __DIR__ . '/forms/fonction.php';
require_once __DIR__ . '/entities/users/get_materiels.php';


?>

<!DOCTYPE html>
<html>

<?php require_once 'forms/head.php'; ?>

<body>

    <?php require_once 'forms/header_base.php'; ?>

    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">
            <div class="row m-4">
                <div>

                    <h1 class="text-center" style="color: #cda45e;">Votre commande à bien été enregistrée</h1>

                    <h2 class="text-center">Vous allez recevoir un mail de confirmation</h2>

                    <div class="col mt-5">
                        <h2 class="text-center">Récapitulatif de votre commande</h2>
                        <table class="table text-white">
                            <thead>
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Prix</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $total = 0;
                                foreach ($_SESSION['user']['panier_tmp'] as $id => $quantite) {
                                    if ($id == "dateTime") {
                                        continue;
                                    }
                                    $materiel = getOneMateriel($id);
                                    $total += $materiel['prix'] * $quantite["quantite"];
                                ?>
                                    <tr>
                                        <td><NOBR><?= $materiel['nom_ma'] ?></NOBR></td>
                                        <td><NOBR><?= $quantite["quantite"] ?></NOBR></td>
                                        <td><NOBR><?= $materiel['prix'] * $quantite["quantite"] ?>€</NOBR></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <h3 class="text-white text-center">Total global : <?= $total ?>€</h3>

                    </div>

                    <div class="d-flex text-center mt-5">
                        <div>
                            <a href="/entities/users/export.php" class="btn-menu animated fadeInUp scrollto p-2 px-3" style="color: white;border-radius: 30px;background-color: #cda45e;border-color: #cda45e;">Exporter la facture</a>
                        </div>
                        <div class="mx-5">
                            <a href="/" class="btn-menu animated fadeInUp scrollto p-2 px-3" style="color: white;border-radius: 30px;background-color: #cda45e;border-color: #cda45e;" onclick="">Revenir à l'accueil</a>
                        </div>
                        <div>
                            <button class="btn-menu animated fadeInUp scrollto p-2 px-3" style="color: white;border-radius: 30px;background-color: #cda45e;border-color: #cda45e;" onclick="window.print()">Imprimer la facture</button>

                        </div>
                    </div>


                </div>

    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>