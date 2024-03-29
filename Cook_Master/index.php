<?php
session_start();

?>
<!DOCTYPE html>
<html>

<?php

require_once 'forms/head.php';
require_once 'entities/users/get_formation.php';
require_once 'entities/users/get_recette.php'

?>

<body>

  <!-- ======= Top Bar ======= -->
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

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-start" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Bienvenue sur <span>Cook Master</span></h1>
          <!-- <h2>Livre de la bonne nourriture depuis plus de 18 ans!</h2> -->
          <h2>Ensemble donnons vie à vos papilles...</h2>

          <div class="btns">
            <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
              <a href="#recette" class="btn-menu animated fadeInUp scrollto">Recette</a>
              <a href="#reservation" class="btn-book animated fadeInUp scrollto">Reservation</a>
            <?php } ?>
          </div>
        </div>
        <div class="col-lg-4 d-flex align-items-center justify-content-center position-relative" data-aos="zoom-in" data-aos-delay="200">
          <a href="https://www.youtube.com/watch?v=u6BOC7CDUTQ" class="glightbox play-btn"></a>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <div id="modal" class="modal justify-content-center">
      <div>
        <h2 class="mb-2">Message</h2>
        <p id="modal-message"></p>
      </div>
    </div>

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="assets/img/about.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
            <p class="fst-italic">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
            </ul>
            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
              velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
              culpa qui officia deserunt mollit anim id est laborum
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Subsricption Section ======= -->
    <section id="Abonnements" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>A propos</h2>
          <p>Abonnements</p>
        </div>

        <div class="row">

          <div class="col-lg-4">
            <div class="card" style="background-color: #404040;">
              <div class="container">
                <div class="mx-5 mt-5 p-3" style="background-color: #CDA45E;border-radius: 15px;">
                  <img src="assets/img/Cook_Cadet.png" class="card-img-top" alt="...">
                </div>
              </div>
              <div class="card-body text-center mt-3 mb-3">
                <div class="container">
                  <p class="card-text">Le grade cadet est un abonnement gratuit sur notre site, offrant un accès limité à des recettes, des cours et d'autres fonctionnalités, accompagné de publicités.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="card" style="background-color: #404040;">
              <div class="container">
                <div class="mx-5 mt-5 p-3" style="background-color: #CDA45E;border-radius: 15px;">
                  <img src="assets/img/Cook_Junior.png" class="card-img-top" alt="...">
                </div>
              </div>
              <div class="card-body text-center mt-3 mb-3">
                <div class="container">
                  <p class="card-text">Le grade junior est un abonnement payant sur notre site, offrant plsuieurs recettes ainsi que des cours et d'autres fonctionnalités, sans publicités.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="card" style="background-color: #404040;">
              <div class="container">
                <div class="mx-5 mt-5 p-3" style="background-color: #CDA45E;border-radius: 15px;">
                  <img src="assets/img/Cook_Senior.png" class="card-img-top" alt="...">
                </div>
              </div>
              <div class="card-body text-center mt-3 mb-3">
                <div class="container">
                  <p class="card-text">Le grade senior est un abonnement payant sur notre site, offrant toutes les recettes ainsi que des cours et d'autres fonctionnalités, sans publicités.</p>
                </div>
              </div>
            </div>
          </div>

          <div class="mt-5 text-center">

            <form action="page.connexion-adhesion" method="POST">
              <input type="hidden" name="abonnement" value="senior">
              <button class="btn" style="background-color: #404040;color: #CDA45E;font-family: Gabriella;font-size: 20px;">En savoir plus <?= (!isset($_SESSION['user'])) ? "et s'inscrire" : "" ?></button>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Why Us Section -->

    <?php if (isset($_SESSION['user']) && !empty($_SESSION['user']) && ($_SESSION['user']['abonnement']) != "Cadet") { ?>

      <!-- ======= Menu Section ======= -->
      <section id="recette" class="menu section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Recette</h2>
            <p>Choisissez votre plat du jour</p>
          </div>

          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
              <ul id="menu-flters">
                <li data-filter="*" class="filter-active">Tout</li>
                <li data-filter=".filter-1">Entrées</li>
                <li data-filter=".filter-2">Plats</li>
                <li data-filter=".filter-3">Desserts</li>
              </ul>
            </div>
          </div>

          <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
            <?php foreach ($recettes as $recette) { ?>
              <div class="col-lg-6 menu-item filter-<?= $recette['id_cat'] ?>">
                <img src="/entities/users/upload-recette/<?= $recette['image'] ?>" class="menu-img" alt="">
                <div class="menu-content">
                  <a href="page.menu?id_recette='<?= $recette['id_recette'] ?>'"><?= $recette['nom_recette'] ?></a>
                </div>
                <div class="menu-ingredients">
                  <?= $recette['description_recette'] ?>
                </div>
              </div>

            <?php } ?>
          </div>

        </div>
      </section><!-- End Menu Section -->

    <?php } ?>

    <!-- ======= Formations Section ======= -->
    <section id="formation" class="events">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Formations</h2>
          <p>Nos différentes formations</p>
        </div>

        <div class="events-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <?php foreach ($formations as $formation) { ?>
              <div class="swiper-slide">
                <div class="row event-item">
                  <div class="col-lg-6">
                    <img src="assets/img/<?= $formation['nom_fo'] ?>.jpg" class="img-fluid" alt="">
                  </div>
                  <div class="col-lg-6 pt-4 pt-lg-0 content">
                    <h3><?= $formation['nom_fo'] ?></h3>
                    <div class="price">
                      <p><span><?= $formation['prix'] ?> €</span></p>
                    </div>
                    <p class="fst-italic">
                      <?= $formation['description'] ?>
                    </p>
                    <ul>
                      <li><i class="bi bi-check-circled"></i> - <?= $formation['cours'] ?></li>
                    </ul>
                    <?= (isset($_SESSION['user'])) ? '<a href="/entities/users/exe-payement_formation?id_fo='. $formation['id_fo'] .'&nom_fo='. $formation['nom_fo'] .'&prix='. $formation['prix'] .'" class="btn" style="background-color: #404040;color: #CDA45E;font-family: Gabriella;font-size: 20px;">S\'inscrire</a>' : "" ?>
                    
                  </div>
                </div>
              </div>
            <?php } ?>


          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Formations Section -->

    <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>

      <!-- ======= Reservation ======= -->
      <section id="reservation" class="book-a-table">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Réservation</h2>
            <p>Réservation de cours</p>
          </div>

          <form action="forms/book-a-table.php" method="post" role="form" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
              <div class="col-lg-4 col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Nom" value="<?= (!isset($_SESSION['user'])) ? '' : $_SESSION['user']['nom'] ?>" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                <div class="validate"></div>
              </div>
              <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" data-rule="email" value="<?= (!isset($_SESSION['user'])) ? '' : $_SESSION['user']['email'] ?>" data-msg="Please enter a valid email">
                <div class="validate"></div>
              </div>
              <div class="col-lg-4 col-md-6 form-group mt-3 mt-md-0">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Téléphone" value="<?= (!isset($_SESSION['user'])) ? '' : $_SESSION['user']['num_tel'] ?>" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                <div class="validate"></div>
              </div>
              <div class="col-lg-4 col-md-6 form-group mt-3">
                <input type="text" name="date" class="form-control" id="date" placeholder="Jours" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                <div class="validate"></div>
              </div>
              <div class="col-lg-4 col-md-6 form-group mt-3">
                <input type="text" class="form-control" name="time" id="time" placeholder="Heure" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                <div class="validate"></div>
              </div>
              <div class="col-lg-4 col-md-6 form-group mt-3">
                <input type="number" class="form-control" name="people" id="people" placeholder="Nombre de personne" min="0" data-msg="Please enter at least 1 chars">
                <div class="validate"></div>
              </div>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
              <div class="validate"></div>
            </div>
            <div class="mb-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">S'inscrire</button></div>
          </form>

        </div>
      </section><!-- End Book A Table Section -->

    <?php } ?>

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">

      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Nos locaux</h2>
        </div>
      </div>

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row g-0">

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-1.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-1.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-2.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-2.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-3.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-3.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-4.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-4.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-5.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-5.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-6.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-6.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-7.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-7.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="gallery-item">
              <a href="assets/img/gallery/gallery-8.jpg" class="gallery-lightbox" data-gall="gallery-item">
                <img src="assets/img/gallery/gallery-8.jpg" alt="" class="img-fluid">
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Gallery Section -->

    <!-- ======= Chefs Section ======= -->
    <section id="chefs" class="chefs">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Chefs</h2>
          <p>Nos Chefs</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="100">
              <img src="assets/img/chefs/chefs-1.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Gilberto Pires</h4>
                  <span>Master Chef</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="200">
              <img src="assets/img/chefs/chefs-2.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Ilya Snacel</h4>
                  <span>Patissier</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="member" data-aos="zoom-in" data-aos-delay="300">
              <img src="assets/img/chefs/chefs-3.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Thomas Faucheux</h4>
                  <span>Cook</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Chefs Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
        </div>
      </div>

      <div data-aos="fade-up">
        <iframe style="border:0; width: 100%; height: 350px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.474052163321!2d2.3871593768043495!3d48.849170101354716!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6720d9c7af387%3A0x5891d8d62e8535c7!2sESGI%2C%20%C3%89cole%20Sup%C3%A9rieure%20de%20G%C3%A9nie%20Informatique!5e0!3m2!1sfr!2sfr!4v1681663090540!5m2!1sfr!2sfr" frameborder="0" allowfullscreen></iframe>
      </div>

      <div class="container" data-aos="fade-up">

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Localisation:</h4>
                <p>242 Rue du Faubourg Saint-Antoine, 75012 Paris</p>
              </div>

              <div class="open-hours">
                <i class="bi bi-clock"></i>
                <h4>Heures d'ouverture:</h4>
                <p>
                  Lundi-Dimanche:<br>
                  11:00 - 23:00
                </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>cookmaster.service@master.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Télephone:</h4>
                <p>+33 7 81 89 04 52</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Votre Nom" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Votre Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Objet" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="8" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Envoyer le Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <?php require_once 'forms/footer.php'; ?>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var message = "<?php echo isset($_GET['message']) ? $_GET['message'] : ''; ?>";
      if (message) {
        document.getElementById('modal-message').innerText = message;
        document.getElementById('modal').style.display = 'flex';

        setTimeout(function() {
          document.getElementById('modal').style.display = 'none';
        }, 4000);
      }
    });
  </script>

</body>

</html>