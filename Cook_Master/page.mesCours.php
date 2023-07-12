<?php
session_start();

require_once 'entities/users/verif_connecter.php';
require_once "forms/fonction.php";
require_once 'entities/users/get_cours_suivi.php';
require_once 'entities/users/get_one_cours.php';

$coursuser = getCoursSuivi($_SESSION['user']['email']);
$coursInfo = [];
foreach ($coursuser as $cours) {
    $coursuserId = $cours['id_cours'];
    $coursInfo[] = getOneCours($coursuserId);
}
?>

<!DOCTYPE html>
<html>

<?php require_once __DIR__ . '/forms/head.php'; ?>

<body>

    <?php require_once 'forms/header_base.php'; ?>

    <main id="main_recette">
        <section>
            <div class="container mt-4">
                <h1 class="text-center" style="color: #cda45e;">Bienvenue <?= $_SESSION['user']['prenom'] ?></h1>
                <?php if (!empty($coursuser)) { ?>
                    <h2 class="text-center">Voici la liste de tous les cours auxquels vous êtes inscrit(e).</h2>

                    <?php
                    foreach ($coursInfo as $cour) {
                        echo '<div class="row mt-5">
                                <div class="col-lg-8 pt-4 pt-lg-0 content">
                                    <h3 style="color: #CDA45E;">' . $cour['nom_cours'] . '</h3>
                                    <p class="mb-4">
                                        ' . $cour['description_cours'] . '
                                    </p>
                                    <div class="container">
                                        <ul>
                                            <li class="mt-3"><span style="color: #CDA45E;">Date :</span> ' . modif_date($cour['date'], "date") . '</li>
                                            <li class="mt-3"><span style="color: #CDA45E;">Heure :</span> ' . substr($cour['heure'], 0, 5) . '</li>
                                            <li class="mt-3"><span style="color: #CDA45E;">Durée :</span> 1h30 heures</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>';
                    }
                    ?>
                <?php } else { ?>
                    <h2 class="text-center mt-5">Vous n'êtes inscrit(e) à aucun cours.</h2>
                <?php } ?>
                <div class="text-center mt-5">
                    <a href="page.profil" class="btn-menu animated fadeInUp scrollto">retour</a>
                </div>
            </div>
        </section>
    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>