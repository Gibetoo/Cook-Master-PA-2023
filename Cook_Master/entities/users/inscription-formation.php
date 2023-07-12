<?php

require_once '../../forms/fonction.php';
require_once '../../Cook_Master_admin/entities/users/get_one_formation.php';

$result = getOneFormation($_GET['id_fo']);

$date = date('d-m-Y H:i:s');

$date_fichier = modif_date($date, 'date');

$nomFormation = $result['nom_fo'];

$html = '<html>
<head>
  <style>
    /* Styles CSS pour le contenu HTML */
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
    .date {
      text-align: right;
      margin-bottom: 10px;
    }
    p {
      margin-bottom: 10px;
    }
    .footer {
      position: fixed;
      bottom: 20px;
      width: 100%;
      text-align: center;
    }
  </style>
</head>
<body>
  <h1>Cook Master</h1>
  <div class="date">Date: ' . $date . '</div>
  <h2>Informations sur le client</h2>
  <p>Nom : ' . $_SESSION['user']['nom'] . '<br>
  Prenom : ' . $_SESSION['user']['prenom'] . '<br>
  Email : ' . $_SESSION['user']['email'] . ' </p>
  <h2>Nouvelle inscription a la formation</h2>
  <p>Merci de nous faire confiance ! Nous sommes ravis de vous informer que vous venez de vous inscrire a notre nouvelle formation passionnante : <strong>' . $nomFormation . '</strong>.</p>

  <p>Cette formation complete vous offre une occasion unique d\'approfondir vos connaissances et competences dans le domaine ' . $nomFormation . '. Voici ce que vous pouvez attendre de cette formation :</p>

  <ul>
    <li>Des cours approfondis et structures qui couvrent les aspects essentiels du domaine ' . $nomFormation . '.</li>
    <li>Un acces a des ressources pedagogiques de haute qualite, y compris des documents, des presentations et des exercices pratiques.</li>
    <li>Des exercices et des projets pratiques pour vous permettre de mettre en pratique vos apprentissages.</li>
    <li>Des seances de discussion et de partage d\'experiences avec des experts et d\'autres participants.</li>
    <li>L\'opportunite de developper un reseau professionnel en interagissant avec d\'autres passionnes du domaine ' . $nomFormation . '.</li>
    <li>Des certifications et des reconnaissances pour attester de votre expertise apres avoir reussi la formation.</li>
  </ul>

  <p>Nous sommes convaincus que cette formation vous permettra d\'acquérir de nouvelles competences et de vous epanouir dans votre parcours professionnel. Nous sommes impatients de vous accompagner tout au long de cette aventure d\'apprentissage et de vous aider a atteindre vos objectifs.</p>

  <p>Nous vous remercions encore pour votre confiance et votre engagement envers votre developpement professionnel. Si vous avez des questions supplementaires ou si vous avez besoin d\'assistance, n\'hesitez pas a nous contacter. Notre equipe se fera un plaisir de vous aider dans votre parcours de formation.</p>

  <p>Profitez de cette occasion pour enrichir vos connaissances et competences. Nous vous souhaitons beaucoup de succes dans votre parcours de formation !</p>

  <div class="footer">
    <p>Pour toute assistance ou en cas de probleme, veuillez nous contacter a l\'adresse suivante : <a href="mailto:cookmaster-service@cook-master.site">cookmaster-service@cook-master.site</a></p>
    <p>Visitez notre site web : <a href="https://cook-master.site">cook-master.site</a></p>
  </div>
</body>
</html>';