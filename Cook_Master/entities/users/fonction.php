<?php
function ajouterAuPanier($produitId, $nom, $prix, $description, $quantite)
{
    // Vérifiez si la variable 'user' existe dans la session
    if (isset($_SESSION['user'])) {
        // Vérifiez si le panier existe déjà dans la variable 'user'
        if (!isset($_SESSION['user']['panier'])) {
            $_SESSION['user']['panier'] = array(); // Créez un tableau vide pour le panier
        }

        // Ajoutez le produit au panier
        $_SESSION['user']['panier'][$produitId] = array(
            'nom' => $nom,
            'prix' => $prix,
            'description' => $description,
            'quantite' => $quantite
        );
    }
}
