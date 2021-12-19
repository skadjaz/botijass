<?php 
ob_start();
session_start();
include 'basedados.h';

if ($_SESSION['tipo_utilizador'] != "Administrador") {
	header ("Location: logout.php"); 
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Página Validar</title>
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
<body id="message">
	<body>
		<?php 

		$action = $_GET["action"];

		switch ($action) {
			case '1':
			$id_utilizador = $_GET["id_utilizador"];
			$query = "UPDATE utilizador SET tipo_utilizador = 2  WHERE id_utilizador = '$id_utilizador'";
			$validar = mysqli_query($conn , $query);

			if (mysqli_affected_rows ($conn) == 1){
				echo'<div class="container" id="mensagem"> 
				<div class="alert alert-info text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Utilizador validado com sucesso!</div>
				</div>
				<script> setTimeout(function () { window.location.href = "gestao_admin.php"; }, 1500)</script>';
			}else{
				echo'<div class="container" id="mensagem"> 
				<div class="alert alert-danger text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Não foi possivel validar o utilizador.</div>
				</div>
				<script> setTimeout(function () { window.location.href = "gestao_admin.php"; }, 2500)</script>';
			}
			break;
			case '2':
			$id_encomenda = $_GET["id_encomenda"];
			$query = "UPDATE encomenda SET estado = 'validada'  WHERE id_encomenda = '$id_encomenda'";
			$validar = mysqli_query($conn , $query);

			if (mysqli_affected_rows ($conn) == 1){
				echo'<div class="container" id="mensagem"> 
				<div class="alert alert-info text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Encomenda validada com sucesso!</div>
				</div>
				<script> setTimeout(function () { window.location.href = "gestao_admin.php"; }, 1500)</script>';
			}else{
				echo'<div class="container" id="mensagem"> 
				<div class="alert alert-danger text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Não foi possivel validar a encomenda.</div>
				</div>
				<script> setTimeout(function () { window.location.href = "gestao_admin.php"; }, 2500)</script>';
			}
			break;
			default:
			echo'<div class="container" id="mensagem"> 
			<div class="alert alert-danger text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Ocorreu um erro inesperado!</div>
			</div>
			<script> setTimeout(function () { window.location.href = "logout.php"; }, 2000)</script>';
			break;
		}
		?>
	</body>
	</html>
