<?php 
session_start();

require_once 'entities/users/verif_connecter.php';

?>
<!DOCTYPE html>
<html lang="en">

<?php

require_once 'forms/head.php';
require_once 'entities/users/get_materiels.php';

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

    <?php require_once "forms/header.php"; ?>

    <section id="hero" class="d-flex align-items-center">
        <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
            <div class="row">
                <div class="col-lg-8">
                    <h1><span>Cook Master</span> matériels</h1>
                    <h2>Découvrer toute notre collections et plus encore...</h2>
                </div>

            </div>
        </div>
    </section>

    <main id="main">

        <section id="materiels" class="why-us">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Nos matériels</h2>
                </div>

                <div class="row">

                    <?php foreach ($results as $materiel) {
                        echo '<div class="col-lg-4 mt-4">';
                        echo '<div class="card" style="background-color: #404040;">';
                        echo '<div class="container">';
                        echo '<div class="m-5 p-3" style="background-color: #CDA45E;border-radius: 15px;">';
                        echo '<img src="assets/img/Cook_Junior.png" class="card-img-top" alt="...">';
                        echo '</div>';
                        echo '</div>';
                        echo '<div class="card-body text-center">';
                        echo '<h5 class="card-title">'. $materiel['nom_ma'].'</h5>';
                        echo '<p class="card-text">'. $materiel['description'] . '</p>';
                        echo '<a href="#" class="btn btn-secondary" style="color: black;font-family: Gabriella;">Selectionner</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }; ?>

                    <!-- <div class="col-lg-4">
                        <div class="card" style="background-color: #404040;">
                            <div class="container">
                                <div class="m-5 p-3" style="background-color: #CDA45E;border-radius: 15px;">
                                    <img src="assets/img/Cook_Cadet.png" class="card-img-top" alt="...">
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-secondary" style="color: black;font-family: Gabriella;">S'abonner</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="card" style="background-color: #404040;">
                            <div class="container">
                                <div class="m-5 p-3" style="background-color: #CDA45E;border-radius: 15px;">
                                    <img src="assets/img/Cook_Junior.png" class="card-img-top" alt="...">
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-secondary" style="color: black;font-family: Gabriella;">S'abonner</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="card" style="background-color: #404040;">
                            <div class="container">
                                <div class="m-5 p-3" style="background-color: #CDA45E;border-radius: 15px;">
                                    <img src="assets/img/Cook_Senior.png" class="card-img-top" alt="...">
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-secondary" style="color: black;font-family: Gabriella;">S'abonner</a>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>
        </section>

    </main>

    <?php require_once 'forms/footer.php'; ?>

</body>

</html>