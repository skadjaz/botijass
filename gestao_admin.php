        <?php
        ob_start();
        session_start();
        include 'basedados.h';

        if (!isset($_SESSION['username'])){
          header ("Location: index.php"); 
        }elseif ($_SESSION['tipo_utilizador'] != "Administrador") {
          header ("Location: index.php"); 
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
          <meta charset="utf-8">
          <meta content="width=device-width, initial-scale=1.0" name="viewport">
          <title>Gestão Admin - <?php echo $_SESSION['tipo_utilizador'] ?></title>
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
                    <h1>ADMINISTRAÇÃO</h1>
                  </div>
                </div>
              </div>
            </section><!-- End Hero -->
            <section id="counts" class="counts">
              <div class="container">
               <div class="accordion" id="accordionExample">
                <div class="accordion-item">

                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Gerir Encomendas
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
                            <th scope='col'>Nrº Encomenda</th>
                            <th scope='col'>Data Encomenda</th>
                            <th scope='col'>Hora Encomenda</th>
                            <th scope='col'>Nome Produto</th>
                            <th scope='col'>Peso</th>
                            <th scope='col'>Autor Encomenda</th>
                            <th scope='col'>Morada</th>
                            <th scope='col'>Contacto</th>
                            <th scope='col'>Editar</th>
                            <th scope='col'>Apagar</th>
                            <th scope='col'>Validar</th>
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
                            while($row = mysqli_fetch_array($retval)){

                              $id_encomenda = $row['id_encomenda'];
                              $data_encomenda = $row['data_encomenda'];
                              $hora_encomenda= $row['hora_encomenda'];
                              $produto = $row['nome_produto'];
                              $peso = $row['peso'];
                              $id_utilizador= $row['id_utilizador'];
                              $nome_utilizador = $row['nome'];
                              $morada = $row['morada'];
                              $contacto = $row['nr_telefone'];

                              echo "
                              <tr>
                              <th scope='row'>$id_encomenda</th>
                              <td>$data_encomenda</td>
                              <td>$hora_encomenda</td>
                              <td>$produto</td>
                              <td>$peso Kg</td>
                              <td>$nome_utilizador</td>
                              <td>$morada</td>
                              <td>$contacto</td>
                              <td> <a href='editar.php?username=".$id_encomenda."'><button type='button' class='btn btn-warning'>Editar</button></a> </td>
                              <td> <a href='remover.php?username=".$id_encomenda."&action=2'><button type='button' class='btn btn-danger'>Apagar</button></a> </td>
                              <td> <a href='validar.php?username=".$id_encomenda."'><button type='button' class='btn btn-info'>Validar</button></a> </td>
                              </tr>";
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
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Registar utilizador
                </button>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <div class="container" data-aos="zoom-out" data-aos-delay="100">
                      <div class="row align-items-center">
                        <div class="col-12">

                          <form method="GET" action="registar.php">
                            <input type="hidden" name="action" value="2">
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
                                  <input type="text" placeholder="Telefone" class="form-control" id="Utilizador" name="nr_telefone">
                                </div>
                              </div>
                              <div class="w-100"></div>
                              <div class="col-6">
                                <div class="mb-4">
                                  <select name="tipo_utilizador" id="id_tipo" class="form-control">
                                    <option value = '1'>Administrador</option>
                                    <option value = '2'>Cliente</option>
                                    <option value = '4'>Distribuidor</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-6">
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
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Gerir utilizadores
                </button>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <div class="container" data-aos="zoom-out" data-aos-delay="100">
                      <div class="row align-items-center">
                        <div class="col-12">
                          <?php
                          echo "<table class='table table-striped'>
                          <thead>
                          <tr>
                          <th scope='col'>#</th>
                          <th scope='col'>username</th>
                          <th scope='col'>Nome</th>
                          <th scope='col'>Morada</th>
                          <th scope='col'>Email</th>
                          <th scope='col'>nrTelefone</th>
                          <th scope='col'>datanascimento</th>
                          <th scope='col'>tipo_utilizador</th>
                          <th scope='col'>Editar</th>
                          <th scope='col'>Apagar</th>
                          <th scope='col'>Validar</th>
                          </tr>
                          </thead>
                          </tbody>
                          ";

                          $sql = 'SELECT * FROM utilizador u,tipoutilizador tu 
                          WHERE 
                          u.tipo_utilizador = tu.tipo_utilizador
                          ORDER BY u.username DESC';


                          $retval = mysqli_query( $conn, $sql );
                          if(! $retval ){
                            die('Could not get data: ' . mysqli_error($conn));
                          }
                          $contador_linhas = 0;
                          while($row = mysqli_fetch_array($retval)){

                            $id_utilizador = $row['id_utilizador'];
                            $username = $row['username'];
                            $nome = $row['nome'];
                            $morada= $row['morada'];
                            $email = $row['email'];
                            $nrTelefone= $row['nr_telefone'];
                            $datanascimento= $row['datanascimento'];
                            $tipo_utilizador = $row['descricao'];
                            $tipo_utilizador_numero = $row['tipo_utilizador'];

                            echo "
                            <tr>
                            <th scope='row'>".++$contador_linhas."</th>
                            <td>$username</td>
                            <td>$nome</td>
                            <td>$morada</td>
                            <td>$email</td>
                            <td>$nrTelefone</td>
                            <td>$datanascimento</td>
                            <td>$tipo_utilizador</td>
                            <td> <a href='editar_utilizador_administrador.php?username=".$username."&descricao=".$tipo_utilizador."'><button type='button' class='btn btn-warning'>Editar</button></a> </td>
                            <td> <a href='remover.php?username=".$id_utilizador."&action=1'><button type='button' class='btn btn-danger'>Apagar</button></a> </td>";
                            if ($tipo_utilizador_numero == 3) {
                              echo "<td> <a href='validar_utilizador_administrador.php?username=".$username."'><button type='button' class='btn btn-info'>Validar</button></a> </td>";
                            }else{
                              echo "<td></td>";
                            }
                            echo " </tr> ";
                          }
                          echo "</tbody></table>";
                          mysqli_close($conn);  
                          ?>
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
        </body>
        </html>