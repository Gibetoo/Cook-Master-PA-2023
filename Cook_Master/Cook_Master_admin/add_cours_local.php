<?php
session_start();

require_once 'entities/users/verif_connecter.php';
?>

<!DOCTYPE html>
<html>

<?php require_once 'forms/head.php'; ?>

<body>

    <?php require_once 'forms/header_base_admin.php'; ?>

    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">
            <div class="row">
                <form action="entities/users/cours_local" method="POST">
                    <h1 class="text-center">Ajouter un Cours</h1>
                    <h2 class="text-center mt-4">Choississez l'endroit pour le cours</h2>

                    <div class="mt-4 mb-4">
                        <div class="text-center">
                            <button type="submit" name="domicile" class="btn btn-dark" style="border-color: #cda45e;">Cours réalisé au Domicile du client</button>
                        </div>
                        <div class=" mt-3 text-center">
                            <button type="submit" name="local" class="btn btn-dark" style="border-color: #cda45e;">Cours réalisé dans un des locaux de Cook Master</button>
                        </div>
                    </div>

                    <input type="hidden" name="nom_cours" value="<?= $_POST['nom_cours']; ?>">
                    <input type="hidden" name="prix_cours" value="<?= $_POST['prix_cours']; ?>">
                    <input type="hidden" name="description_cours" value="<?= $_POST['description_cours']; ?>">
                    <input type="hidden" name="pres_cours" value="<?= $_POST['pres_cours'] ?>">
                    <?php
                    for ($i = 0; $i < intval($_POST['nb_recette']); $i++) {
                        echo "<input type='hidden' name='recette-" . $i . "' value='" . $_POST['recette-' . $i] . "'>";
                    }
                    ?>
                    <input type="hidden" name="nb_recette" value="<?= $_POST['nb_recette'] ?>">
                    <?php
                    for ($i = 0; $i < intval($_POST['nb_materiel']); $i++) {
                        echo "<input type='hidden' name='materiel-" . $i . "' value='" . $_POST['materiel-' . $i] . "'>";
                    }
                    ?>
                    <input type="hidden" name="nb_materiel" value="<?= $_POST['nb_materiel'] ?>">
                </form>
            </div>
        </div>

    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>