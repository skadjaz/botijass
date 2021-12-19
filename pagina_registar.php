<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PWBD Botijas - 
    <?php 
    ob_start();
    session_start();
    
    if ($_SESSION['estado'] == "online" ) {
      header ("Refresh: 0; url='index.php'");
    }elseif (!isset($_SESSION['username'])){
      echo "Registar";
    }
    ?>
  </title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3">
          <h1 class="logo me-auto"><a href="index.php">PWBD Gás<span>.</span></a></h1>
        </div>
        <div class="col-lg-8">
          <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
              <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
              <li><a class="nav-link scrollto" href="#about">Produtos</a></li>
              <li><a class="nav-link scrollto" href="#services">Serviços</a></li>
              <li><a class="nav-link scrollto " href="#portfolio">Sobre nós</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->
        </div>
        <div class="col-lg-1">
          <a href="login.html" class="get-started-btn scrollto">Login</a>
        </div>
      </div>
    </header><!-- End Header -->
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
      <div class="container" data-aos="zoom-out" data-aos-delay="100">
        <div class="row align-items-center">
          <div class="col-6">
            <form method="GET" action="registar.php">
              <input type="hidden" name="action" value="1">
              <div class="row">
                <div class="col-6">
                  <div class="mb-4">
                    <input type="text" placeholder="Utilizador" class="form-control" id="Utilizador" name="username">
                  </div>
                </div>
                <div class="col-6">
                  <div class="mb-4">
                    <input type="password" placeholder="Password" class="form-control" id="Utilizador" name="password">
                  </div>
                </div>
                <!-- Force next columns to break to new line -->
                <div class="w-100"></div>
                <div class="col-6">
                  <div class="mb-4">
                    <input type="email" placeholder="Email" class="form-control" id="Utilizador" name="email">
                  </div>
                </div>
                <div class="col-6">
                  <div class="mb-4">
                    <input type="text" placeholder="Nome" class="form-control" id="Utilizador" name="nome">
                  </div>
                </div>
                <div class="w-100"></div>
                <div class="col-6">
                  <div class="mb-4">
                    <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" placeholder="DataNascimento">
                  </div>
                </div>
                <div class="col-6">
                  <div class="mb-4">
                    <input type="text" placeholder="Telefone" class="form-control" id="Utilizador" name="telefone">
                  </div>
                </div>
                <div class="w-100"></div>
                <div class="col-12">
                  <div class="mb-4">
                    <input type="text" placeholder="Morada" class="form-control" id="Utilizador" name="morada">
                  </div>
                </div>
                <div class="w-100"></div>
                <div class="col-12">
                  <button type="submit" class="form-control btn btn-primary login">Registar</button>
                </div>

              </div>
            </form>
          </div>
          <div class="col-3 offset-md-3">
            <img src="assets/img/favicon.png">
          </div>
        </div>

      </div>
    </section><!-- End Hero -->
    <!-- ======= Footer ======= -->
    <footer id="footer">
      <div class="container d-md-flex py-4">
        <div class="me-md-auto text-center text-md-start">
          <div class="credits">
            <a href="index.php">© 2021 PWBD Botijas</a>
          </div>
        </div>
      </div>
    </footer><!-- End Footer -->
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
  </body>
  </html>