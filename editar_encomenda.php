        <?php
        ob_start();
        session_start();
        include 'basedados.h';

        if (!isset($_SESSION['username'])){
          header ("Location: index.php"); 
        }elseif ($_SESSION['tipo_utilizador'] != "Cliente") {
          header ("Location: index.php"); 
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="utf-8">
          <meta content="width=device-width, initial-scale=1.0" name="viewport">
          <title>Editar Encomenda - <?php echo $_GET['id_encomenda'] ?></title>
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
                  <h1 class="logo me-auto"><a href="index.php"><img src="assets/img/favicon.png" alt="">PWBD Gás<span>.</span></a></h1>
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
                  <div>
                    <?php
                    if (!isset($_SESSION['estado'])){
                      echo('<a href="login.html" class="get-started-btn scrollto">Login</a>');
                    }else{
                      if ($_SESSION['estado'] == "online") {
                        echo('<a href="logout.php" class="get-started-btn scrollto">Logout</a>');
                        echo('<a href="conta_utilizador.php" class="get-started-btn scrollto">Conta</a>');
                      }else {
                        echo('<a href="login.html">Login</a>');
                      }
                    }
                    ?>
                  </div>
                </div>
              </div>
            </header><!-- End Header -->
            <!-- ======= Hero Section ======= -->
            <section id="hero" class="d-flex align-items-center">
              <div class="container" data-aos="zoom-out" data-aos-delay="100">
                <div class="row">
                  <div class="col-md-12">
                    <h1 class="text-center">As suas Encomendas</h1>
                    <h2 class="text-center">Consulte as suas encomendas ou realize novas.</h2>
                  </div>
                </div>
              </div>
            </section><!-- End Hero -->
            <section id="counts" class="counts">
              <div class="container" data-aos="zoom-out" data-aos-delay="100">
                <div class="row align-items-center">
                  <div class="col-12">
                    <?php
                    $select = "SELECT * FROM encomenda WHERE id_encomenda = '" . $_GET['id_encomenda'] ."'";
                    $resultado = mysqli_query( $conn, $select );
                    if(! $resultado ){
                      die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro
                    }
                    while($row = mysqli_fetch_array($resultado)){
                      $data_encomenda = $row['data_encomenda'];
                      $hora_encomenda = $row['hora_encomenda'];
                      $produto = $row['produto'];
                      $quantidade = $row['quantidade'];
                      $morada_entrega = $row['morada_entrega'];
                      $_SESSION['id_encomenda'] = $_GET['id_encomenda'];
                    }
                    mysqli_close($conn);
                    ?>
                    <form method="GET" action="editar_encomenda_script.php">
                      <div class="row">
                        <div class="col-6">
                          <div class="mb-4">
                            <input type="date" placeholder="Utilizador" class="form-control" id="Utilizador" name="data_encomenda" value="<?php echo $data_encomenda ?>" required >
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="mb-4">
                            <input type="time" placeholder="Password" class="form-control" id="Utilizador" name="hora_encomenda" value="<?php echo $hora_encomenda ?>" required >
                          </div>
                        </div>
                        <!-- Force next columns to break to new line -->
                        <div class="w-100"></div>
                        <div class="col-6">
                          <div class="mb-4">
                            <select name="produto" class="form-control" value="<?php echo $produto ?>" required>
                              <option value = '1'>Butano - 6kg - 12€ - 1€</option>
                              <option value = '2'>Butano - 13kg - 26€ - 2€</option>
                              <option value = '3'>Propano - 5kg - 11€ - 1€</option>
                              <option value = '4'>Propano - 11kg - 24€ - 2€</option>
                              <option value = '5'>Propano - 45kg - 95€ - 5€</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="mb-4">
                            <input type="number" placeholder="Quantidade" class="form-control" name="quantidade" value="<?php echo $quantidade ?>" required>
                          </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-12">
                          <!-- Cena das Moradas -->
                          <div class="mb-4">
                            <input type="text" placeholder="Introduza Morada de Entrega" class="form-control" id="Utilizador" name="morada_entrega" value="<?php echo $morada_entrega ?>">
                            <label>&nbsp;<strong>Nota: Deixar campo morada em branco para entrega na morada de defeito</strong></label>
                          </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-12">
                          <button type="submit" class="form-control btn btn-primary login">Editar Encomenda</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </section><!-- End Counts Section -->
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