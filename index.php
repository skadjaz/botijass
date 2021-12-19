<?php
ob_start();
session_start();
include 'basedados.h';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>PWBD Botijas - 
		<?php 
		if (!isset($_SESSION['username'])){
			echo "Bem-Vindo";
		}else if ($_SESSION['estado'] == "online" ) {
			echo $_SESSION['tipo_utilizador'];
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
	<!-- Template CSS Files -->
	<link href="assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
	<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
	<link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
	<!-- Ficheiro CSS File -->
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
					<nav id="navbar" class="navbar">
						<ul>
							<li><a class="nav-link scrollto active" href="#hero">Home</a></li>
							<li><a class="nav-link scrollto " href="#produtos">Produto</a></li>
							<li><a class="nav-link scrollto" href="#about">Sobre Nós</a></li>
							<?php
							if (!isset($_SESSION['username'])){
								echo('<li><a href="pagina_registar.php">Criar conta</a></li>');
							}else{
								if ($_SESSION['estado'] == "online") {
									switch ($_SESSION['tipoNr']) {
										case '1':
										echo('<li><a class="nav-link scrollto" href="gestao_admin.php">Gestão</a></li>');
										break;
										case '2':
										echo('<li><a class="nav-link scrollto" href="encomendas_cliente.php">Encomendar Gás</a></li>');
										break;
										case '3':
										echo('<li><a>Bem vindo, '.$_SESSION['tipo_utilizador'].', '.$_SESSION['nome'].'</a></li>');
										break;
										case '4':
										echo('<li><a class="nav-link scrollto" href="consultar_encomendas.php">As minhas encomendas</a></li>');
										break;
										default:
										echo('<li><a href="registar.html">Criar conta</a></li>');
										break;
									}
								}
							}
							?>
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
		</div>
	</header><!-- End Header -->
	<!-- ======= Hero Section ======= -->
	<section id="hero" class="d-flex align-items-center">
		<div class="container" data-aos="zoom-out" data-aos-delay="100">
			<div class="row">
				<div class="col-md-12">
					<?php
					if (!isset($_SESSION['estado'])){
						echo('<h1>Bem-Vindo</h1>');
					}else{
						if ($_SESSION['estado'] == "online") {
							echo('<h1>Bem-Vindo '.$_SESSION['nome'].'</h1>');
							echo('<h2 class="text-center">'.$_SESSION['tipo_utilizador'].'</h2>');
						}
					}
					?>
				</div>
			</div>
		</div>
	</section><!-- End Hero -->
	<main id="main">
		<!-- ======= Counts Section ======= -->
		<section id="produtos" class="counts">
			<div class="container-fluid" data-aos="fade-up">
				<div class="row">
					<?php 
										
											$query = "SELECT * FROM produto";
											$produtos = mysqli_query($conn, $query);
											if(! $produtos ){
												die('Could not get data: ' . mysqli_error($conn));
											}
											while($row = mysqli_fetch_array($produtos)){
												$id_produto = $row['id_produto'];
												$nome_produto = $row['nome_produto'];
												$peso= $row['peso'];
												$preco = $row['preco'];
												$preco_entrega = $row['preco_entrega'];

												echo ('<div class="col-lg-3 col-md-4" style="margin-top:50px;">
																<div class="count-box">
																	<div><img src="assets/img/favicon.png" style="width:50px;height:50px;"></div>
																	<h2>'.$nome_produto.'&nbsp;&nbsp;'.$peso.'Kg</h2>
																	<p><label><strong>Preço:</strong></label>&nbsp;&nbsp;'.$preco.'€</p>
																	<p><label><strong>Preço entrega:</strong></label>&nbsp;&nbsp;'.$preco_entrega.'€</p>
																</div>
															</div>');
											}
											?>   
				</div>
			</div>
		</section><!-- End Counts Section -->
		<!-- ======= Services Section ======= -->
		<section id="services" class="services section-bg ">
			<div class="container" data-aos="fade-up">
				<div class="row">
					<div class="col-md-6">
						<h2>Services</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.</p>
					</div>
					<div class="col-md-6">
						<div class="icon-box" data-aos="fade-up" data-aos-delay="100">
							<i class="bi bi-briefcase"></i>
							<h4><a href="#">Como trabalhamos</a></h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.</p>
						</div>
					</div>
				</div>
			</div>
		</section><!-- End Services Section -->
			<!-- ======= Contact Section ======= -->
			<section id="contact" class="contact">
				<div class="container" data-aos="fade-up">
					<div class="section-title">
						<h2>Contact</h2>
						<p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.</p>
					</div>
					<div class="row" data-aos="fade-up" data-aos-delay="100">
						<div class="col-lg-6">
							<div class="row">
								<div class="col-md-12">
									<div class="info-box">
										<i class="bx bx-map"></i>
										<h3>Our Address</h3>
										<p>A108 Adam Street, New York, NY 535022</p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="info-box mt-4">
										<i class="bx bx-envelope"></i>
										<h3>Email Us</h3>
										<p>info@example.com<br>contact@example.com</p>
									</div>
								</div>
								<div class="col-md-6">
									<div class="info-box mt-4">
										<i class="bx bx-phone-call"></i>
										<h3>Call Us</h3>
										<p>+1 5589 55488 55<br>+1 6678 254445 41</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<form action="forms/contact.php" method="post" role="form" class="php-email-form">
								<div class="row">
									<div class="col form-group">
										<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
									</div>
									<div class="col form-group">
										<input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
									</div>
								</div>
								<div class="form-group">
									<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
								</div>
								<div class="form-group">
									<textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
								</div>
								<div class="my-3">
									<div class="loading">Loading</div>
									<div class="error-message"></div>
									<div class="sent-message">Your message has been sent. Thank you!</div>
								</div>
								<div class="text-center"><button type="submit">Send Message</button></div>
							</form>
						</div>
					</div>
				</div>
			</section><!-- End Contact Section -->
		</main><!-- End #main -->
		<!-- ======= Footer ======= -->
		<footer id="footer">
			<div class="container d-md-flex py-4">
				<div class="me-md-auto text-center text-md-start">
					<div class="copyright">
						&copy; Copyright <strong><span>Presento</span></strong>. All Rights Reserved
					</div>
					<div class="s">
						<p style="color: black;">Designed by <a href="">Luís Caio</a></p>
					</div>
				</div>
				<div class="social-links text-center text-md-end pt-3 pt-md-0">
					<a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
					<a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
					<a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
					<a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
					<a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
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