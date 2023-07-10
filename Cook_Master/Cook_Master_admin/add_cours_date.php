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
                <form action="add_cours_recap" method="POST">
                    <h1 class="text-center">Ajouter un Cours</h1>
                    <h2 class="text-center mt-3">Selectionner l'heure et la date de du cours</h2>
                    <div class="mt-3">
                        <div class="form-group">
                            <h4 class="text-center mt-4">Selectionner une date pour le cours</h4>
                            <label for="date">Sélectionnez une date :</label>
                            <input type="date" id="date" class="form-control" name="date" required>
                        </div>
                        <div class="form-group">
                            <h4 class="text-center mt-4">Selectionner une heure pour le cours</h4>
                            <label for="time">Sélectionnez une heure :</label>
                            <input type="time" id="time" class="form-control" name="heure" required>
                        </div>
                        <div class="mt-5 text-center">
                            <button type="submit" class="btn-menu animated fadeInUp scrollto" style="background-color: #cda45e;border-color: #cda45e;">Ajouter</button>
                        </div>
                    </div>

                    <input type="hidden" name="nom_cours" value="<?= $_POST['nom_cours']; ?>">
                    <input type="hidden" name="prix_cours" value="<?= $_POST['prix_cours']; ?>">
                    <input type="hidden" name="description_cours" value="<?= $_POST['description_cours']; ?>">
                    <input type="hidden" name="pres_cours" value="<?= $_POST['pres_cours'] ?>">
                    <input type="hidden" name="nb_recette" value="<?= $counter_recette ?>">
                    <?php
                    $counter_recette = intval($_POST['nb_recette']);
                    for ($i = 0; $i < intval($_POST['nb_recette']); $i++) {
                        if (empty($_POST['recette-' . $i])) {
                            $counter_recette = $i;
                            continue;
                        }
                        echo "<input type='hidden' name='recette-" . $i . "' value='" . $_POST['recette-' . $i] . "'>";
                    }
                    ?>
                    <input type="hidden" name="nb_recette" value="<?= $counter_recette ?>">
                    <?php
                    $counter_materiel = intval($_POST['nb_materiel']);
                    for ($i = 0; $i < intval($_POST['nb_materiel']); $i++) {
                        if (empty($_POST['materiel-' . $i])) {
                            $counter_materiel = $i;
                            continue;
                        }
                        echo "<input type='hidden' name='materiel-" . $i ."' value='" . $_POST['materiel-' . $i] . "'>";
                    }
                    ?>
                    <input type="hidden" name="nb_materiel" value="<?= $counter_materiel ?>">
                    <input type="hidden" name="id_salle" value="<?= $_POST['id_salle'] ?>">
                </form>
            </div>
        </div>

    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>