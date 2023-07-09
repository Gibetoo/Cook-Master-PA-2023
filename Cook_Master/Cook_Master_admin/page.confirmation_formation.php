<?php
session_start();
require_once 'entities/users/verif_connecter.php';
?>

<!DOCTYPE html>
<html>

<?php
require_once 'forms/head.php';
?>

<body>

    <?php require_once 'forms/header_base_admin.php'; ?>

    <main id="main">
        <section id="materiels" class="materiels">
            <div class="container mt-4">
                <h1 class="text-center" style="color: #cda45e;">Récapitulatif de la formation</h1>
                <div class="my-5">
                    <h2 class="mt-4" style="color: #cda45e;">Titre de la formation</h2>
                    <h4><?= $_POST['nom_fo'] ?></h4>
                </div>

                <div class="row mt-4">

                    <div class="my-5 col-lg-6">
                        <h3 style="color: #cda45e;">Description</h3>
                        <h4><?= $_POST['description'] ?></h4>
                    </div>

                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                        <div class="d-flex">
                            <div class="me-5">
                                <h3 style="color: #cda45e;">
                                    <NOBR>Recette(s) vu lors de la formation</NOBR>
                                </h3>
                                <?php
                                for ($i = 0; $i < intval($_POST['nb_cours']); $i++) {
                                    if (empty($_POST['cours-' . $i])) {
                                        continue;
                                    }
                                    echo "<li><i class='icofont-check-circled'></i> " . $_POST['cours-' . $i] . "</li>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <h2 class="mt-5">
                    <h3 style="color: #cda45e;">
                        Prix :
                    </h3>
                    <p><?= $_POST['prix'] ?> €</p>
                </h2>

            </div>
            <form action="entities/users/new_formation" method="POST">
                <div class="mt-5 text-center">
                    <button type="submit" class="btn btn-secondary mt-3" style="background-color: #cda45e;border-color: #cda45e;border-radius: 50px;font-family: Gabriella;font-size: 20px;">Valider</button>
                </div>

                <!-- ------------------------------------------------------------------------------------ -->

                <input type="hidden" name="nom_fo" value="<?= $_POST['nom_fo']; ?>">
                <input type="hidden" name="prix" value="<?= $_POST['prix']; ?>">
                <input type="hidden" name="description" value="<?= $_POST['description']; ?>">
                <?php
                $cours = array();
                for ($i = 0; $i < intval($_POST['nb_cours']); $i++) {
                    if (empty($_POST['cours-' . $i])) {
                        continue;
                    }
                    $cours[] = $_POST['cours-' . $i];
                }
                ?>
                <input type="hidden" name="cours" value="<?= implode(', ', $cours); ?>">
                <!-- ------------------------------------------------------------------------------------ -->

            </form>
        </section>
    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>