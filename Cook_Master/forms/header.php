<header id="header" class="fixed-top d-flex align-items-center">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

    <h1 class="logo me-auto me-lg-0"><a href="/">Cook Master</a></h1>

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto active" href="/">Accueil</a></li>
        <li><a class="nav-link scrollto" href="/#Abonnements">Abonnement</a></li>
        <?php if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
          <li><a class="nav-link scrollto" href="/#recette">Recette</a></li>
          <li><a class="nav-link scrollto" href="/#formation">Formation</a></li>
          <li><a class="nav-link scrollto" href="/#reservation">Réservations</a></li>
          <li><a class="nav-link scrollto" href="page.materiels">Matériels</a></li>
          <li><a class="nav-link scrollto" href="page.cours">Cours</a></li>
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