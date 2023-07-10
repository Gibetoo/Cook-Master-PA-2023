<?php
session_start();

require_once 'entities/users/verif_connecter.php';
require_once __DIR__ . "/entities/users/get_salle.php";
require_once __DIR__ . "/entities/users/get_cours.php";
?>

<!DOCTYPE html>
<html>

<?php require_once 'forms/head.php'; ?>

<body>

  <?php require_once 'forms/header_base_admin.php'; ?>

  <main id="hero" class="d-flex align-items-center">
    <div class="shadow-box">
      <div class="row">
        <form action="voir_dispo" method="POST">
          <h1 class="text-center">Ajouter un Cours</h1>
          <h2 class="text-center mt-3">Selectionner la salle</h2>
          <h1 class="text-center my-3">Liste des salles</h1>

          <?php
          $salles = getSalle();
          ?>

          <table class="table table-striped table-bordered text-white">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Nom de la salle</th>
                <th scope="col">Disponibilité</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($salles as $salle) { ?>
                <tr>
                  <td class="text-white text-center"><?= $salle['nom_salle'] ?></td>
                  <td>
                    <button type="submit" value="<?= $salle['id_salle'] ?>" name="id_salle" class="btn btn-warning btn-sm">Voir disponibilité</button>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>

          <input type="hidden" name="nom_cours" value="<?= $_GET['nom_cours']; ?>">
          <input type="hidden" name="prix_cours" value="<?= $_GET['prix_cours']; ?>">
          <input type="hidden" name="description_cours" value="<?= $_GET['description_cours']; ?>">
          <input type="hidden" name="pres_cours" value="<?= $_GET['pres_cours'] ?>">
          <input type="hidden" name="nb_recette" value="<?= $counter_recette ?>">
          <?php
          $counter_recette = intval($_GET['nb_recette']);
          for ($i = 0; $i < intval($_GET['nb_recette']); $i++) {
            if (empty($_GET['recette-' . $i])) {
              $counter_recette = $i;
              continue;
            }
            echo "<input type='hidden' name='recette-" . $i . "' value='" . $_GET['recette-' . $i] . "'>";
          }
          ?>
          <input type="hidden" name="nb_recette" value="<?= $counter_recette ?>">
          <?php
          $counter_materiel = intval($_GET['nb_materiel']);
          for ($i = 0; $i < intval($_GET['nb_materiel']); $i++) {
            if (empty($_GET['materiel-' . $i])) {
              $counter_materiel = $i;
              continue;
            }
            echo "<input type='hidden' name='materiel-" . $i . "' value='" . $_GET['materiel-' . $i] . "'>";
          }
          ?>
          <input type="hidden" name="nb_materiel" value="<?= $counter_materiel ?>">

        </form>
      </div>
    </div>

  </main>

  <?php require_once 'forms/footer.php'; ?>

</body>

</html>