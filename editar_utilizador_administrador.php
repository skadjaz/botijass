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
  <title>Editar Cliente <?php echo $_GET['username'] ?></title>
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
            <?php
            if (!isset($_SESSION['estado'])){
              header ("refresh:100; url=index.php");
            }else{
              if ($_SESSION['tipo_utilizador'] == "Administrador") {
                echo('<h1>Edição em modo '.$_SESSION['tipo_utilizador'].'</h1>');
                echo('<h2>Utilizador: '.$_GET['username'].'</h2>');
                echo('<h2>Tipo de utilizador: '.$_GET['descricao'].'</h2>');
              }else
              header ("refresh:100; url=index.php");
            }
            ?>
          </div>
        </div>
      </div>
    </section><!-- End Hero -->
    <section id="counts" class="counts">
      <div class="container">
        <?php
        $sql = "SELECT * FROM utilizador WHERE username = '" . $_GET['username'] ."'";
        $retval = mysqli_query( $conn, $sql );
        if(! $retval ){
              die('Could not get data: ' . mysqli_error($conn));// se não funcionar dá erro
            }
            while($row = mysqli_fetch_array($retval)){
             $username = $row['username'];
             $password = $row['password'];
             $nome = $row['nome'];
             $morada = $row['morada'];
             $email = $row['email'];
             $nr_telefone= $row['nr_telefone'];
             $dataNascimento= $row['datanascimento'];
             $tipo_utilizador= $row['tipo_utilizador'];
           }
           mysqli_close($conn);
           ?>
           <form method="GET" action="editar.php">
            <input type="hidden" name="action" value="3">
            <div class="row">
             <div class="col-12">
               <div class="mb-4">
                 <input type="text" placeholder="Utilizador" class="form-control" id="Utilizador" name="username" value="<?php echo $username ?>">
               </div>
             </div>
             <!-- Force next columns to break to new line -->
             <div class="w-100"></div>
             <div class="col-6">
               <div class="mb-4">
                 <input type="text" placeholder="Email" class="form-control" id="Utilizador" name="email" value="<?php echo $email ?>">
               </div>
             </div>
             <div class="col-6">
              <div class="mb-4">
                <input type="text" placeholder="Nome" class="form-control" id="Utilizador" name="nome" value="<?php echo $nome ?>">
              </div>
            </div>
            <div class="w-100"></div>
            <div class="col-6">
             <div class="mb-4">
               <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" placeholder="DataNascimento" value="<?php echo $dataNascimento ?>">
             </div>
           </div>
           <div class="col-6">
            <div class="mb-4">
              <input type="text" placeholder="Telefone" class="form-control" id="Utilizador" name="nr_telefone" value="<?php echo $nr_telefone ?>">
            </div>
          </div>
          <div class="w-100"></div>
          <div class="col-6">
            <div class="mb-4">
              <input type="text" placeholder="Morada" class="form-control" id="Utilizador" name="morada" value="<?php echo $morada ?>">
            </div>
          </div>
          <div class="col-6">
           <select name="tipo_utilizador" id="id_tipo" class="form-control">
            <option value = '1'>Administrador</option>
            <option value = '2'>Cliente</option>
            <option value = '4'>Distribuidor</option>
          </select>
        </div>
        <div class="w-100"></div>
        <div class="col-12">
          <button type="submit" class="form-control btn btn-primary login">Editar</button>
        </div>
      </div>
    </form>


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