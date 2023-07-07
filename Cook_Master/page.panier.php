<?php
session_start();

ini_set('display_errors', 1);

require_once 'entities/users/verif_connecter.php';

?>
<!DOCTYPE html>
<html>

<?php

require_once __DIR__ . '/forms/head.php';

?>

<body>
    <?php require_once 'forms/header_base.php'; ?>

    <main id="main">
        <div class="container mt-4">
            <section id="materiels" class="materiels">
                <h1 class="text-center" style="color: #cda45e;">Panier</h1>

                <div class="text-center mt-5">
                    <?php
                    if (isset($_SESSION['user']['panier']) && !empty($_SESSION['user']['panier'])) {
                        echo "<h2 class='mb-5 text-white'>Vous avez " . count($_SESSION['user']['panier']) . " produit(s) dans votre panier</h2>";
                        echo '<table class="table">';
                        echo '<thead>';
                        echo '<tr>';
                        echo '<th scope="col" class="text-white">Nom</th>';
                        echo '<th scope="col" class="text-white">Prix /unit</th>';
                        echo '<th scope="col" class="text-white">Quantité</th>';
                        echo '<th scope="col" class="text-white">Total</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                    
                        $totalGlobal = 0; // Variable pour stocker le total global
                    
                        foreach ($_SESSION['user']['panier'] as $produitId => $produit) {
                            echo '<tr>';
                            echo '<td class="text-white">' . $produit['nom'] . '</td>';
                            echo '<td class="text-white">' . $produit['prix'] . ' €</td>';
                            echo '<td class="text-white">' . $produit['quantite'] . '</td>';
                            $totalProduit = $produit['prix'] * $produit['quantite'];
                            echo '<td class="text-white">' . $totalProduit . ' €</td>';
                            echo '</tr>';
                    
                            $totalGlobal += $totalProduit; // Ajouter le total du produit au total global
                        }
                    
                        echo '</tbody>';
                        echo '</table>';

                        echo '<h3 class="text-white">Total global : ' . $totalGlobal . ' €</h3>';
                    
                        echo '<div class="text-center mt-5">';
                        echo '<a href="page.materiels" class="btn-menu animated fadeInUp scrollto me-2 p-2 px-3" style="color: white;border-radius: 30px;background-color: #cda45e;border-color: #cda45e;">Page matériel</a>';
                        echo '<a href="/entities/users/sup.panier" class="btn-menu animated fadeInUp scrollto p-2 px-3" style="color: white;border-radius: 30px;background-color: #cda45e;border-color: #cda45e;">Vider le panier</a>';
                        echo '</div>';
                    
                        echo '<div class="text-center mt-5">';
                        echo '<a href="/entities/users/exe-payement_achat" class="btn-menu animated fadeInUp scrollto p-2 px-3" style="color: white;border-radius: 30px;background-color: #cda45e;border-color: #cda45e;">Commander</a>';
                        echo '</div>';
                    }
                     else { ?>
                        <h3 class="mb-5">Vous n'avez aucun produit dans votre panier</h3>
                        <a href="page.materiels" class="btn-menu animated fadeInUp scrollto p-2 px-3" style="color: white;border-radius: 30px;background-color: #cda45e;border-color: #cda45e;">Page matériel</a>
                    <?php } ?>
                </div>

            </section>
        </div>
    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>