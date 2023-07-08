<?php
session_start();

ini_set('display_errors', 1);

require_once '../../assets/vendor/autoload.php';
require_once '../../forms/fonction.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$panier = $_SESSION['user']['panier_tmp'];

$date = $_SESSION['user']['panier_tmp']['dateTime'];

$date_fichier = modif_date($date, 'date');

unset($panier['dateTime']);

if (!empty($panier)) {
  $commande = [];

  foreach ($panier as $produit) {
    $nom_ma = $produit['nom'];
    $quantite = $produit['quantite'];
    $prix = $produit['prix'];

    $commande[] = [
      'nom_ma' => $nom_ma,
      'quantite' => $quantite,
      'prix' => $prix,
    ];
  }

  $_SESSION['user']['panier_tmp']['dateTime'] = $date;

  $html = '<html>
<head>
  <style>
    /* Styles CSS pour le contenu PDF */
    body {
      font-family: Arial, sans-serif;
    }
    h1 {
      color: #333;
      font-size: 24px;
      text-align: center;
      margin-top: 30px;
      margin-bottom: 20px;
    }
    h2 {
      color: #666;
      font-size: 20px;
      text-align: center;
      margin-bottom: 30px;
    }
    .date {
      text-align: right;
      margin-bottom: 10px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }
    th, td {
      padding: 10px;
      border: 1px solid #ccc;
    }
    th {
      background-color: #f9f9f9;
      font-weight: bold;
      text-align: left;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    tr:hover {
      background-color: #e1e1e1;
    }
    td:last-child {
      text-align: right;
    }
    .total-row {
      font-weight: bold;
      background-color: #f9f9f9;
    }
    .total-label {
      text-align: right;
      padding-right: 10px;
    }
    .total-amount {
      text-align: right;
      padding-right: 10px;
    }
  </style>
</head>
<body>
  <h1>Cook Master</h1>
  <div class="date">Date: ' . $date . '</div>
  <h2>Informations sur le client</h2>
  <p>Nom : ' . $_SESSION['user']['nom'] . '<br>
  Prénom : ' . $_SESSION['user']['prenom'] . '<br>
  Email : ' . $_SESSION['user']['email'] . ' </p>
  <h2>Facture de la commande</h2>
  <table>
    <tr>
      <th>Nom du produit</th>
      <th>Quantité</th>
      <th>Prix unitaire</th>
      <th>Total</th>
    </tr>';

  $total = 0;

  foreach ($commande as $produit) {
    $nom_ma = $produit['nom_ma'];
    $quantite = $produit['quantite'];
    $prix = $produit['prix'];
    $totalProduit = $quantite * $prix;
    $total += $totalProduit;

    $html .= '
    <tr>
      <td>' . $nom_ma . '</td>
      <td>' . $quantite . '</td>
      <td>' . $prix . ' €</td>
      <td>' . $totalProduit . ' €</td>
    </tr>';
  }

  $html .= '
    <tr class="total-row">
      <td colspan="3" class="total-label">Total</td>
      <td class="total-amount">' . $total . ' €</td>
    </tr>
    </table>
    <div style="position: fixed; bottom: 20px; width: 100%; text-align: center;">
    <p>Pour toute assistance ou en cas de problème, veuillez nous contacter à l\'adresse suivante : <a href="mailto:cookmaster-service@cook-master.site">cookmaster-service@cook-master.site</a></p>
    <p>Visitez notre site web : <a href="https://cook-master.site">cook-master.site</a></p>
  </div>
</body>
</html>';
} else {
  $html = '<p>Aucun produit dans le panier.</p>';
}


$dompdf->loadHtml($html);

$dompdf->render();

$dompdf->stream('facture_Cook_Master-'. $date_fichier .'.pdf', array('Attachment' => true));
