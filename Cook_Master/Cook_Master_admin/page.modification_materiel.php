<?php
session_start();

require_once 'entities/users/verif_connecter.php';

$url = 'http://localhost/Projet-Annuel/Database/index?demande=materiels&id_ma=' . $_GET['id_ma']; // On définit l'URL du serveur
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
<html lang="en">

<?php require_once 'forms/head.php'; ?>

<body>

    <?php require_once 'forms/header_base_admin.php'; ?>

    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">
            <div class="row my-3">

                <h1 class="text-center">Modifier le materiel</h1>

                <form action="entities/users/modifier_materiel.php" method="POST">
                    <div class="mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Nom</label>
                        <input type="text" size="40px" name="nom" class="form-control" id="exampleFormControlInput1" placeholder="Nom" value="<?= $results['nom_ma'] ?>" required>
                    </div>
                    <div class="mt-5">
                        <div class="d-flex justify-content-around align-items-center">
                            <div>
                                <label for="Image" class="form-label">Image</label>
                                <input type="file" name="image" class="form-control" id="Image" accept="image/jpg, image/gif, image/png">
                            </div>
                            <div>
                                <img class="p-2" src="entities/users/upload/<?= $results['image'] ?>" style="height: 150px;background-color: grey; border-radius: 10px;" alt="">
                                <input type="hidden" name="ancienne_image" value="<?= $results['image'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="inputPassword5" class="form-label">Prix</label>
                        <input type="text" name="prix" id="inputPassword5" class="form-control" placeholder="Prix en €" value="<?= $results['prix'] ?>" aria-labelledby="passwordHelpBlock">
                    </div>
                    <div class="mt-3">
                        <label for="exampleFormControlInput1" class="form-label">Description</label>
                        <textarea class="form-control" rows="5" id="comment" name="text"><?= $results['description'] ?></textarea>
                    </div>
                    <div>
                        <input type="hidden" name="id_ma" class="form-control" id="exampleFormControlInput1" value="<?= $_GET['id_ma'] ?>" required>
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