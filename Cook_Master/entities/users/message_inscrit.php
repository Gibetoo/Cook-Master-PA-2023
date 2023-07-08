<?php

$message = '
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Activation de compte</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
    }
    .container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #ffffff;
      border-radius: 5px;
      box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    }
    h1 {
      color: #333;
      font-size: 24px;
      margin-bottom: 20px;
    }
    p {
      color: #666;
      font-size: 16px;
      line-height: 1.5;
    }
    .button {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #4caf50;
      color: #ffffff;
      font-size: 16px;
      text-decoration: none;
      border-radius: 5px;
    }
    .button:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Activation de votre compte</h1>
    <p>Bonjour ' . $_POST['prenom'] . ' ' . $_POST['nom'] . ',</p>
    <p>Merci de vous être inscrit à Cook Master. Pour activer votre compte, cliquez sur le bouton ci-dessous :</p>
    <a class="button" href="https://cook-master.site/activation.php?email=' . $_POST['email'] . '&code=' . $code . '">Activer mon compte</a>
    <p>Si le bouton ne fonctionne pas, vous pouvez copier et coller le lien suivant dans votre navigateur :</p>
    <p><a href="https://cook-master.site/activation.php?email=' . $_POST['email'] . '&code=' . $code . '">https://cook-master.site/activation.php?email=' . $_POST['email'] . '&code=' . $code . '</a></p>
    <p>Une fois votre compte activé, vous pourrez profiter de toutes les fonctionnalités de Cook Master.</p>
    <p>Si vous n\'avez pas créé de compte sur Cook Master, veuillez ignorer cet e-mail.</p>
    <p>Si vous avez des questions ou des problèmes, veuillez nous contacter à l\'adresse suivante : <a href="mailto:cookmaster-service@cook-master.site">cookmaster-service@cook-master.site</a></p>
    <p>Merci,</p>
    <p>L\'équipe Cook Master</p>
  </div>
</body>
</html>';
