<!DOCTYPE html>
<html lang="en">

<?php require_once 'forms/head.php'; ?>

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

                    // Vérifier si l'e-mail et le code sont valides et correspondent à un compte utilisateur
                    // Effectuez vos vérifications et traitements ici
                    
                    // Exemple de vérification basique pour afficher un message de réussite
                    if ($email === 'exemple@domaine.com' && $code === '123456') {
                        echo '<p class="text-center">Votre compte a été activé avec succès !</p>';
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
