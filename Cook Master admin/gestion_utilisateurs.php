<?php session_start()?>

<!DOCTYPE html>
<html lang="en">

<?php require_once 'forms/head.php'; ?>

<body>

    <?php require_once 'forms/header_base_admin.php'; ?>

    <!-- ======= Hero Main ======= -->
    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">
            <table class="text-white table table-striped mt-5">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Email</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Abonnemment</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td class="text-white">Name@gmail.com</td>
                        <td class="text-white">Name</td>
                        <td class="text-white">First Name</td>
                        <td class="text-white">Oui niveau de compte</td>
                        <?php
                        echo '<td>';
                        if ($utilisateur['email'] != $_SESSION['email']) {
                            echo '<form action="sup_user.php" method="POST">';
                            echo '<button type="submit" value="' . $utilisateur['email'] . '" name="email" class="btn btn-danger btn-sm">Supprimer</button>';
                            echo '</form>';
                        } else {
                            echo '<a class="btn btn-secondary btn-sm">Supprimer</a>';
                        }
                        echo '</td>';
                        ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </main><!-- End Main -->

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>