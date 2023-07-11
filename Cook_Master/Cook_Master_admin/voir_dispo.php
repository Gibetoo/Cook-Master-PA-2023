<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<?php

require_once 'entities/users/verif_connecter.php';
require_once __DIR__ . "/entities/users/get_cours.php";
require_once __DIR__ . "/entities/users/calendar.php";

if (isset($_POST['id_salle'])) {
  $idSalle = $_POST['id_salle'];
}

$result = calendar($idSalle);

?>

<!DOCTYPE html>
<html>

<?php require_once 'forms/head.php'; ?>

<body>

  <?php require_once 'forms/header_base_admin.php'; ?>

  <main id="hero" class="d-flex align-items-center">
    <div class="shadow-box">
      <div class="row">
        <form action="add_cours_date" method="POST">
          <h1 class="text-center mb-2">Ajouter un Cours</h1>
          <div id="calendar"></div>
          <div class="mt-3 text-center">
            <button type="submit" class="btn-menu animated fadeInUp scrollto" style="background-color: #cda45e;border-color: #cda45e;">Suivant</button>
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
          <input type="hidden" name="id_salle" value="<?= $_POST['id_salle'] ?>">

        </form>
      </div>
    </div>
  </main>

  <?php require_once 'forms/footer.php'; ?>

  <script>
    function renderCalendar() {
      var events = <?php echo json_encode($result); ?>;

      // Modifier le format de date et heure pour chaque événement
      for (var i = 0; i < events.length; i++) {
        var event = events[i];
        var datetime = event.date + ' ' + event.heure; // Combinaison de la date et de l'heure
        event.start = moment.utc(datetime, 'YYYY-MM-DD HH:mm:ss').local().toISOString(); // Convertir en format ISO 8601 avec prise en compte du fuseau horaire local
        event.end = moment.utc(datetime, 'YYYY-MM-DD HH:mm:ss').local().add(1, 'hours').add(30, 'minutes').toISOString(); // Ajouter 1h30 à l'heure de début pour obtenir l'heure de fin avec prise en compte du fuseau horaire local
        event.title = 'Cours réservé'; // Définir le titre de l'événement comme "Cours réservé"
      }

      var defaultDate = moment().format('YYYY-MM-DD');
      $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        defaultDate: defaultDate,
        locale: 'fr',
        timeZone: 'local',
        navLinks: true,
        editable: true,
        eventLimit: true,
        eventColor: '#cda45e',
        events: events
      });
    }

    renderCalendar();
  </script>




</body>

</html>