<?php 
session_start();

require_once 'entities/users/verif_connecter.php';

?>

<!DOCTYPE html>
<html lang="en">

<?php
require_once 'forms/head.php';

$url = 'http://localhost/Projet-Annuel/Database/index'; // On définit l'URL du serveur
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

<body>

    <?php require_once 'forms/header_base_admin.php'; ?>

    <!-- ======= Hero Main ======= -->
    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">

            <h1 class="text-center">Gestion des utilisateurs</h1>

            <table class="text-white text-center table table-striped mt-4">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Email</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Role</th>
                        <th scope="col">Droit</th>
                        <th scope="col">Abonnemment</th>
                        <th scope="col">Bannir</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $utilisateur) { // On parcourt les utilisateurs
                        echo '<tr>';
                        echo '<td></td>';
                        echo '<td class="text-white"><NOBR>' . $utilisateur['email'] . '</NOBR></td>';
                        echo '<td class="text-white"><NOBR>' . $utilisateur['prenom'] . '</NOBR></td>';
                        echo '<td class="text-white"><NOBR>' . $utilisateur['nom'] . '</NOBR></td>';
                        echo '<td class="text-white"><NOBR>' . $utilisateur['role'] . '</NOBR></td>';
                        echo '<td><NOBR>';
                        if ($utilisateur['email'] != $_SESSION['user']['email']) { // Si l'utilisateur n'est pas l'utilisateur connecté le bouton est bleu
                            echo '<form action="mod_droits" method="POST">';
                            echo '<button type="submit" value="' . $utilisateur['email'] . '" name="email" class="btn btn-primary btn-sm">Modifier les droits</button>';
                            echo '</form>';
                        } else {  
                            echo '<button type="submit" value="' . $utilisateur['email'] . '" name="email" class="btn btn-secondary btn-sm">Modifier les droits</button>';
                        }
                        echo '</NOBR></td>';
                        echo '<td><NOBR>';
                        echo '<form action="mod-abo.php" method="POST">';
                        echo '<button type="submit" value="' . $utilisateur['email'] . '" name="email" class="btn btn-primary btn-sm">Cook ' . $utilisateur['abonnement'] . '</button></NOBR></td>';
                        echo '<td><NOBR>';
                        if ($utilisateur['user'] != $_SESSION['user']['email']) { // Si l'utilisateur n'est pas l'utilisateur connecté
                            echo '<form action="bannir.php" method="POST">';
                            if ($utilisateur['ban'] == 0) { // Si l'utilisateur n'est pas banni le bouton est rouge 
                                echo '<button type="submit" value="' . $utilisateur['email'] . '" name="email" class="btn btn-danger btn-sm">Bannir</button>';
                            } else { // Si l'utilisateur est banni le bouton est orange
                                echo '<button type="submit" value="' . $utilisateur['email'] . '" name="email" class="btn btn-warning btn-sm">débannir</button>';
                            }
                            echo '</form>';
                        } else { // Si l'utilisateur est l'utilisateur connecté le bouton est en gris et désactivé
                            echo '<a class="btn btn-secondary btn-sm">Bannir</a>';
                        }
                        echo '</NOBR></td>';
                        echo '<td><NOBR>';
                        if ($utilisateur['email'] != $_SESSION['user']['email']) {
                            echo '<form action="sup_user.php" method="POST">';
                            echo '<button type="submit" value="' . $utilisateur['email'] . '" name="email" class="btn btn-danger btn-sm">Supprimer</button>';
                            echo '</form>';
                        } else {
                            echo '<a class="btn btn-secondary btn-sm">Supprimer</a>';
                        }
                        echo '</NOBR></td>';
                    } ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </main><!-- End Main -->

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>