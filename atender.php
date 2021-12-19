<?php 
ob_start();
session_start();
include 'basedados.h';
if ($_SESSION['tipo_utilizador'] != "Distribuidor") {
	header ("Location: logout.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Página Registo</title>
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
		$id_encomenda = $_GET['id_encomenda'];
		$distribuidor = $_SESSION['id_utilizador'];

		$update = "UPDATE encomenda 
		SET 
		distribuidor = '$distribuidor',
		estado = 'Agendada'
		WHERE  id_encomenda = '$id_encomenda'";
		$atualizar = mysqli_query($conn , $update);
		if (mysqli_affected_rows ($conn) == 1){
			echo'<div class="container" id="mensagem"> 
			<div class="alert alert-success text-center" style="border-radius: 50px; padding: 20px" id="flash-msg"> Entrega Confirmada!</div>
			</div>
			<script> setTimeout(function () { window.location.href = "consultar_encomendas.php"; }, 1500)</script>';
		}else if (mysqli_affected_rows ($conn) == 0){
			echo'<div class="container" id="mensagem"> 
			<div class="alert alert-danger text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Não foi possivel marcar entrega</div>
			</div>
			<script> setTimeout(function () { window.location.href = "consultar_encomendas.php"; }, 1500)</script>';
		}
		?>
	</body>
	</html>
