<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.html">Cook Master</a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Accueil</a></li>
          <li><a class="nav-link scrollto" href="#why-us">Abonnement</a></li>
          <?php if (isset($_SESSION['email']) && !empty($_SESSION['email'])) { ?>
            <li><a class="nav-link scrollto" href="#menu">Recette</a></li>
            <li><a class="nav-link scrollto" href="#events">Formation</a></li>
            <li><a class="nav-link scrollto" href="#book-a-table">Réservations</a></li>
            <li><a class="nav-link scrollto" href="#">Matériels</a></li>
          <?php } ?>
          <li><a class="nav-link scrollto" href="#gallery">Galerie</a></li>
          <li><a class="nav-link scrollto" href="#chefs">Chefs</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="page.connexion.php" class="book-a-table-btn scrollto d-none d-lg-flex">Connexion</a>
    </div>
  </header><!-- End Header -->