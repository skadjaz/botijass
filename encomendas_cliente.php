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
          <title>Encomendas - <?php echo $_SESSION['tipo_utilizador']." ".$_SESSION['nome'] ?></title>
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
                    <div class="form-group">
                    </div>
                    <h1 class="text-center">As suas Encomendas</h1>
                    <h2 class="text-center">Consulte as suas encomendas ou realize novas.</h2>

                    <?php 
                    if (isset($_SESSION['varname'])) {
                      echo $_SESSION['varname']; 
                      unset($_SESSION['varname']);
                    }
                    ?>

                  </div>
                </div>
              </div>
            </section><!-- End Hero -->
            <section id="counts" class="counts">
              <div class="container">
                <div class="accordion-item">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Efetuar Encomenda
                  </button>
                  <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <div class="container" data-aos="zoom-out" data-aos-delay="100">
                        <div class="row align-items-center">
                          <div class="col-12">

                            <form method="GET" action="registar.php">
                              <input type="hidden" name="action" value="4">
                              <div class="row">
                                <div class="col-6">
                                  <div class="mb-4">
                                    <input type="date" placeholder="Utilizador" class="form-control" id="Utilizador" name="data_encomenda" required >
                                  </div>
                                </div>
                                <div class="col-6">
                                  <div class="mb-4">
                                    <input type="time" placeholder="Password" class="form-control" id="Utilizador" name="hora_encomenda" required >
                                  </div>
                                </div>
                                <!-- Force next columns to break to new line -->
                                <div class="w-100"></div>
                                <div class="col-6">
                                  <div class="mb-4">
                                    <select name="produto" class="form-control" required>
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
                                    <input type="number" placeholder="Quantidade" class="form-control" name="quantidade" value="1" required>
                                  </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-12">
                                  <!-- Cena das Moradas -->
                                  <div class="mb-4">
                                    <input type="text" placeholder="Introduza Morada de Entrega" class="form-control" id="Utilizador" name="morada">
                                    <label>&nbsp;<strong>Nota: Deixar campo morada em branco para entrega na morada de defeito</strong></label>
                                  </div>
                                </div>
                                <div class="w-100"></div>
                                <div class="col-12">
                                  <button type="submit" class="form-control btn btn-primary login">Encomendar</button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="accordion" id="accordionExample">
                  <div class="accordion-item">

                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Consultar Encomendas
                    </button>

                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="container" data-aos="zoom-out" data-aos-delay="100">
                          <div class="row align-items-center">
                            <div class="col-12">
                              <?php 
                              echo "<table class='table table-striped'>
                              <thead>
                              <tr>
                              <th scope='col'>Nrº</th>
                              <th scope='col'>Data Encomenda</th>
                              <th scope='col'>Hora Encomenda</th>
                              <th scope='col'>Nome Produto</th>
                              <th scope='col'>Peso</th>
                              <th scope='col'>Morada</th>
                              <th scope='col'>Quantidade</th>
                              <th scope='col'>Estado Encomenda</th>
                              <th scope='col'>SubTotal</th>
                              <th scope='col'>Total</th>
                              </tr>
                              </thead>
                              </tbody>
                              ";
                              $sql = 'SELECT * FROM encomenda';
                              $sql = "SELECT P.*,E.*,U.* FROM produto P INNER JOIN encomenda E ON P.id_produto = E.produto INNER JOIN utilizador U ON U.id_utilizador = E.id_utilizador";


                              $retval = mysqli_query( $conn, $sql );
                              if(! $retval ){
                                die('Could not get data: ' . mysqli_error($conn));
                              }
                              $contador_linhas = 0;
                              while($row = mysqli_fetch_array($retval)){
                                $id_encomenda = $row['id_encomenda'];
                                $data_encomenda = $row['data_encomenda'];
                                $hora_encomenda= $row['hora_encomenda'];
                                $produto = $row['nome_produto'];
                                $peso = $row['peso'];
                                $id_utilizador= $row['id_utilizador'];
                                $morada = $row['morada_entrega'];
                                $quantidade = $row['quantidade'];
                                $estado = $row['estado'];
                                if ($_SESSION['id_utilizador'] == $id_utilizador) {
                                  echo "
                                  <tr>
                                  <th scope='row'>".$id_encomenda."</th>
                                  <td>$data_encomenda</td>
                                  <td>$hora_encomenda</td>
                                  <td>$produto</td>
                                  <td>$peso Kg</td>
                                  <td>$morada</td>
                                  <td>$quantidade unidades</td>
                                  <td><strong>$estado</strong></td>
                                  <td>".$row['preco']*$quantidade." €</td>
                                  <td>".$row['preco']*$quantidade+$row['preco_entrega']." €</td>
                                  <td> <a href='editar_encomenda.php?id_encomenda=".$id_encomenda."'><button type='button' class='btn btn-warning'>Editar</button></a> </td>
                                  <td> <a href='remover.php?username=".$id_encomenda."&action=3'><button type='button' class='btn btn-danger'>Desmarcar</button></a> </td>
                                  </tr>";
                                }
                              }
                              echo "</tbody></table>";
                              ?>   
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
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
            <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
            <script type="text/javascript">
              $(document).ready(function () {
                $("#flash-msg").delay(2000).fadeOut("slow");
              });
            </script>
          </body>
          </html>