<?php
session_start();

require_once 'entities/users/verif_connecter.php';
    
$url = 'http://localhost/Projet-Annuel/Database/index?demande=one_cours&id_cours=' . $_POST['id_cours']; // On définit l'URL du serveur
$ch = curl_init($url); // On initialise CURL
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET"); // On définit la méthode GET
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // On demande à CURL de nous retourner la réponse
curl_setopt(
    $ch,
    CURLOPT_HTTPHEADER,
    array(
        'Content-Type: application/json'
    )
); // On définit le header de la requête

$result = curl_exec($ch); // On exécute la requête
curl_close($ch); // On ferme CURL

$response = json_decode($result, true); // On décode la réponse JSON

if ($response["success"] == true) { // Si la création de l'utilisateur a réussi, on affecte la réponse à $results
    $results = $response["message"];
} else { // Si la création de l'utilisateur a échoué, on affecte un tableau vide à $results
    $results = [];
}

?>

<!DOCTYPE html>
<html>

<?php require_once 'forms/head.php'; ?>

<body>

    <?php require_once 'forms/header_base_admin.php'; ?>

    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">
            <div class="row my-3">

                <h1 class="text-center">Modifier le cours</h1>

                <form action="entities/users/modifier_cours.php" method="POST">
                    <div class="mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Nom</label>
                        <input type="text" size="40px" name="nom_cours" class="form-control" id="exampleFormControlInput1" placeholder="Nom" value="<?= $results['nom_cours'] ?>" required>
                    </div>
                    <div class="mt-3">
                        <label for="inputPassword5" class="form-label">Prix</label>
                        <input type="text" name="prix" id="inputPassword5" class="form-control" placeholder="Prix en €" value="<?= $results['prix'] ?>" aria-labelledby="passwordHelpBlock">
                    </div>
                    <div class="mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Description</label>
                        <textarea class="form-control" rows="5" id="comment" name="description"><?= $results['description'] ?></textarea>
                    </div>
                    <div class="mt-3">
                    <label for="exampleFormControlInput1" class="form-label">date</label>
                    <input type="date" id="date" class="form-control" name="date" value="<?= $results['date'] ?>">
                    </div>
                    <div class="mt-3">
                    
                    <label for="exampleFormControlInput1" class="form-label">heure</label>
                    <select name="heure" value="<?= $results['heure'] ?>">
                                <?php
                                $heureDebut = strtotime('08:00');
                                $heureFin = strtotime('20:00');
                                $dureeCours = 5400; // 1h30 en secondes
                                $dureePause = 900; // 15 minutes en secondes
                                $pauseMidi = strtotime('12:00');

                                while ($heureDebut <= $heureFin) {
                                    $heure = date('H:i', $heureDebut);

                                    // Vérifier si c'est l'heure de la pause à midi
                                    if ($heureDebut === $pauseMidi) {
                                        echo '<option disabled>--- Pause Midi ---</option>';
                                        $heureDebut += 3600; // Ajouter 1 heure pour la pause à midi
                                    }

                                    echo '<option value="' . $heure . '">' . $heure . '</option>';

                                    // Ajouter la durée du cours
                                    $heureDebut += $dureeCours;

                                    // Ajouter la durée de la pause
                                    $heureDebut += $dureePause;
                                }
                                ?>
                            </select>
                            <input type="hidden" name="id_cours" class="form-control" id="exampleFormControlInput1" value="<?= $_POST['id_cours'] ?>" required>
                            </div>
                    <div class="mt-5 text-center">
                        <button type="submit" class="btn-menu animated fadeInUp scrollto" style="background-color: #cda45e;border-color: #cda45e;">Modifier</button>
                    </div>
                </form>

            </div>
        </div>

    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>