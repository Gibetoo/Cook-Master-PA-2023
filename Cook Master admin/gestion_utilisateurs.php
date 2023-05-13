<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">

<?php require_once 'forms/head.php'; ?>

<body>

    <?php require_once 'forms/header_base_admin.php'; ?>

    <!-- ======= Hero Main ======= -->
    <main id="hero" class="d-flex align-items-center">
        <div class="shadow-box">

            <h1 class="text-center">Gestion des utilisateurs</h1>

            <table class="text-white text-center table table-striped mt-5">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Email</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Role</th>
                        <th scope="col">Abonnemment</th>
                        <th scope="col">Bannir</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td class="text-white">
                            <NOBR>Name@gmail.com</NOBR>
                        </td>
                        <td class="text-white">
                            <NOBR>Pires da Silva</NOBR>
                        </td>
                        <td class="text-white">
                            <NOBR>Gilberto</NOBR>
                        </td>
                        <?php
                        echo '<td>';
                        if ($utilisateur['email'] != $_SESSION['email']) {
                            echo '<form action="mod_droits.php" method="POST">';
                            echo '<button type="submit" value="' . $utilisateur['email'] . '" name="email" class="btn btn-primary btn-sm">Modifier les droits</button>';
                            echo '</form>';
                        } else {
                            echo '<a class="btn btn-primary btn-sm">Admin</a>';
                        }
                        echo '</td>';
                        echo '<td>';
                        echo '<form action="modif-abo.php" method="POST">';
                        echo '<button type="submit" value="' . $utilisateur['email'] . '" name="email" class="btn btn-primary btn-sm">Cook Senior</button></td>';
                        echo '<td>';
                        if ($utilisateur['email'] != $_SESSION['email']) {
                            echo '<form action="bannir.php" method="POST">';
                            if ($utilisateur['ban'] == 0) {
                                echo '<button type="submit" value="' . $utilisateur['email'] . '" name="email" class="btn btn-danger btn-sm">Bannir</button>';
                            } else {
                                echo '<button type="submit" value="' . $utilisateur['email'] . '" name="email" class="btn btn-warning btn-sm">débannir</button>';
                            }
                            echo '</form>';
                        } else {
                            echo '<a class="btn btn-secondary btn-sm">Bannir</a>';
                        }
                        echo '</td>';
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