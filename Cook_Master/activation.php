<!DOCTYPE html>
<html lang="en">

<?php

require_once __DIR__ . '/forms/head.php';
require_once __DIR__ . '/entities/users/get_one_users.php';
require_once __DIR__ . '/entities/users/change_verif_email.php';

$user = get_one_users($_GET['email']);

?>

<body>
    <?php require_once 'forms/header_base.php'; ?>

    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">
            <div class="row m-3">
                <h1 class="text-center"><NOBR>Activation </NOBR>de votre compte</h1>

                <?php
                // Vérifier si les paramètres d'e-mail et de code sont présents dans l'URL
                if (isset($_GET['email']) && isset($_GET['code'])) {
                    // Récupérer l'e-mail et le code de l'URL
                    $email = $_GET['email'];
                    $code = $_GET['code'];
                    
                    if ($code === $user['verification_email']) {
                        echo '<p class="text-center">Votre compte a été activé avec succès !</p>';
                        $result = change_status($email, 'oui');
                    } else {
                        echo '<p class="text-center">Le lien d\'activation est invalide.</p>';
                    }
                } else {
                    echo '<p class="text-center">Le lien d\'activation est incomplet.</p>';
                }
                ?>

            </div>
        </div>
    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>
