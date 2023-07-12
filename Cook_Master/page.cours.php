<?php
session_start();

require_once 'entities/users/verif_connecter.php';
require_once __DIR__ . '/entities/users/get_cours.php';
require_once __DIR__ . '/entities/users/fonction.php';
require_once __DIR__ . '/forms/fonction.php';

?>
<!DOCTYPE html>
<html>

<?php
require_once __DIR__ . '/forms/head.php';
?>

<body>

    <div id="topbar" class="d-flex align-items-center fixed-top">
        <div class="container d-flex justify-content-center justify-content-md-between">

            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-phone d-flex align-items-center"><span>+33 7 81 89 04 52</span></i>
                <i class="bi bi-clock d-flex align-items-center ms-4"><span>Lun-Dim: 10h - 23h</span></i>
            </div>

            <div class="languages d-none d-md-flex align-items-center">
                <ul>
                    <li>Fr</li>
                    <li><a href="#">En</a></li>
                    <li><a href="#">Pt</a></li>
                </ul>
            </div>
        </div>
    </div>

    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

            <h1 class="logo me-auto me-lg-0"><a href="/">Cook Master</a></h1>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto" href="/">Accueil</a></li>
                    <li><a class="nav-link scrollto" href="/#Abonnements">Abonnement</a></li>
                    <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
                        <li><a class="nav-link scrollto" href="/#recette">Recette</a></li>
                        <li><a class="nav-link scrollto" href="/#formation">Formation</a></li>
                        <li><a class="nav-link scrollto" href="/#reservation">Réservations</a></li>
                        <li><a class="nav-link scrollto" href="page.materiels">Matériels</a></li>
                        <li><a class="nav-link scrollto active" href="page.cours">Cours</a></li>
                    <?php } ?>
                    <li><a class="nav-link scrollto" href="/#gallery">Galerie</a></li>
                    <li><a class="nav-link scrollto" href="/#chefs">Chefs</a></li>
                    <li><a class="nav-link scrollto" href="/#contact">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->
            <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
                <div class="d-none d-lg-flex">
                    <a class="me-2 align-self-center" href="page.panier"><img src="assets/img/Shopping-cart.png" alt=""></a>
                    <a href="page.profil" class="book-a-table-btn scrollto">Profil</a>
                </div>
            <?php } else { ?>
                <a href="page.connexion" class="book-a-table-btn scrollto d-none d-lg-flex">Connexion</a>
            <?php } ?>
        </div>
    </header>

    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-8">
                    <h1><span>Cook Master</span> Cours</h1>
                    <h2>Explorez notre sélection de cours de cuisine</h2>

                </div>

            </div>
        </div>
    </section>

    <main id="main">

        <section id="materiels" class="why-us">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Nos Cours</h2>
                </div>

                <div class="row">

                    <?php foreach ($results as $cours) {
                        echo '<div class="col-lg-4 mt-4">';
                        echo '<div class="card" style="background-color: #404040;height: auto;">';
                        echo '<div class="container">';
                        echo '</div>';
                        echo '<div class="card-body text-center mt-3 mb-3 d-flex flex-column">';
                        echo '<h4 class="card-title" style="color: #CDA45E;">Titre du cours</h4>';
                        echo '<p class="card-title">' . strtoupper($cours['nom_cours']) . '</p>';
                        echo '<h4 class="card-text" style="color: #CDA45E;">Date du cours</h4>';
                        // echo '<p class="card-text">' . modif_date($cours['date'], 'date') . ' </p>';
                        // echo '<h4 class="card-text" style="color: #CDA45E;">Heure du cours</h4>';
                        // echo '<p class="card-text">' . substr($cours['heure'], 0, 5) . ' </p>';
                        // echo '<h4 class="card-text" style="color: #CDA45E;">Prix du cours</h4>';
                        echo '<p class="card-text">' . $cours['prix'] . ' €</p>';
                        echo '<a href="page.info_cours?id_cours='. $cours['id_cours'] .'" class="btn mt-auto" style="background-color: #CDA45E;"><NOBR>Plus d\'information</NOBR></a>';
                        echo '</div>'; 
                        echo '</div>';
                        echo '</div>';
                    };

                    ?>

                </div>
            </div>
        </section>

    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>