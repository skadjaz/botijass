<?php 
ob_start();
session_start();
include 'basedados.h';
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




$username = $_GET["username"];
$action = $_GET["action"];

if ($username != $_SESSION['id_utilizador'] && $action == 1) {
	if ($_SESSION['tipo_utilizador'] != "Administrador") {
		header ("Location: index.php"); 
	}
	$apagarEncomendas = "DELETE FROM encomenda WHERE id_utilizador = '$username'";
	$apagarUtilizador = "DELETE FROM utilizador WHERE id_utilizador = '$username'";
	$acaoApagarEncomendas = mysqli_query($conn , $apagarEncomendas);


	if (mysqli_affected_rows ($conn) == 1){
		$acaoApagarUtilizador = mysqli_query($conn , $apagarUtilizador);
		if (mysqli_affected_rows ($conn) == 1){
			echo'<div class="container" id="mensagem"> 
			<div class="alert alert-success text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Utilizador e encomendas removidas com sucesso!</div>
		</div>
		<script> setTimeout(function () { window.location.href = "gestao_admin.php"; }, 1500)</script>';
		}else{
			echo'<div class="container" id="mensagem"> 
			<div class="alert alert-danger text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Não foi possivel remover utilizador e encomendas.</div>
		</div>
		<script> setTimeout(function () { window.location.href = "gestao_admin.php"; }, 1500)</script>';
		}
	}else{
		$acaoApagarUtilizador = mysqli_query($conn , $apagarUtilizador);
		if (mysqli_affected_rows ($conn) == 1){
			echo'<div class="container" id="mensagem"> 
			<div class="alert alert-success text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Utilizador removido com sucesso!</div>
		</div>
		<script> setTimeout(function () { window.location.href = "gestao_admin.php"; }, 1500)</script>';
		}else{
			echo'<div class="container" id="mensagem"> 
			<div class="alert alert-danger text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Não foi possivel remover o utilizador.</div>
		</div>
		<script> setTimeout(function () { window.location.href = "gestao_admin.php"; }, 1500)</script>';
		}
	
}
}elseif ($action == 2) {
	$apagarEncomenda = "DELETE FROM encomenda WHERE id_encomenda = '$username'";
	$acaoApagarEncomenda = mysqli_query($conn , $apagarEncomenda);
	if (mysqli_affected_rows ($conn) == 1){
			echo'<div class="container" id="mensagem"> 
			<div class="alert alert-success text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Encomenda removida com sucesso!</div>
		</div>
		<script> setTimeout(function () { window.location.href = "gestao_admin.php"; }, 1500)</script>';
		}else{
			echo'<div class="container" id="mensagem"> 
			<div class="alert alert-danger text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Não foi possivel remover a encomenda.</div>
		</div>
		<script> setTimeout(function () { window.location.href = "gestao_admin.php"; }, 1500)</script>';
		}
}elseif($action == 3){
	$apagarEncomenda = "DELETE FROM encomenda WHERE id_encomenda = '$username'";
	$acaoApagarEncomenda = mysqli_query($conn , $apagarEncomenda);
	if (mysqli_affected_rows ($conn) == 1){
			echo'<div class="container" id="mensagem"> 
			<div class="alert alert-success text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Encomenda Desmarcada com sucesso!</div>
		</div>
		<script> setTimeout(function () { window.location.href = "encomendas_cliente.php"; }, 1500)</script>';
		}else{
			echo'<div class="container" id="mensagem"> 
			<div class="alert alert-danger text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Não foi possivel Desmarcar a encomenda.</div>
		</div>
		<script> setTimeout(function () { window.location.href = "encomendas_cliente.php"; }, 1500)</script>';
		}
}
?>
</body>
</html>
