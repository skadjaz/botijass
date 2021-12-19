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
		$action = $_GET['action'];

		if ($action == 1) {
			$username = $_GET["username"];
			$password = md5($_GET["password"]);
			$email = $_GET["email"];
			$nome = $_GET["nome"];
			$dataNascimento = $_GET["dataNascimento"];
			$telefone = $_GET["telefone"];
			$morada = $_GET["morada"];

			$insert = "INSERT INTO utilizador (username,nome, morada, email, nr_telefone, datanascimento, tipo_utilizador, password) VALUES ('$username','$nome','$morada','$email','$telefone', '$dataNascimento',3, '$password')";

			if ($username != null && $password != null && $email != null && $nome != null && $dataNascimento != null && $telefone != null && $morada!= null) {
				$retval1 = mysqli_query($conn , $insert);

				if (mysqli_affected_rows ($conn) == 1){
					echo'<div class="container" id="mensagem"> 
					<div class="alert alert-success text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">O seu registo foi efetuado com sucesso!</div>
					</div>
					<script> setTimeout(function () { window.location.href = "index.php"; }, 2000)</script>';
				}else{
					echo'<div class="container" id="mensagem"> 
					<div class="alert alert-danger text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Não foi possivel efetuar o seu registo.</div>
					</div>
					<script> setTimeout(function () { window.location.href = "pagina_registar.php"; }, 2500)</script>';
				}
			}else{
				echo'<div class="container" id="mensagem"> 
				<div class="alert alert-danger text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Não foi possivel efetuar o seu registo.</div>
				</div>
				<script> setTimeout(function () { window.location.href = "pagina_registar.php"; }, 2500)</script>';
			}


		}elseif($action == 2){
			$username = $_GET["username"];
			$password = md5($_GET["password"]);
			$email = $_GET["email"];
			$nome = $_GET["nome"];
			$dataNascimento = $_GET["dataNascimento"];
			$nr_telefone = $_GET["nr_telefone"];
			$tipo_utilizador = $_GET["tipo_utilizador"];
			$morada = $_GET["morada"];

			$insert = "INSERT INTO utilizador (username,nome, morada, email, nr_telefone, datanascimento, tipo_utilizador, password) VALUES ('$username','$nome','$morada','$email','$nr_telefone', '$dataNascimento', '$tipo_utilizador', '$password')";

			if ($username != null && $password != null && $nome != null && $dataNascimento != null && $nr_telefone != null && $morada!= null) {
				$retval1 = mysqli_query($conn , $insert);

				if (mysqli_affected_rows ($conn) == 1){
					echo'<div class="container" id="mensagem"> 
					<div class="alert alert-success text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Utilizador registado com sucesso!</div>
					</div>
					<script> setTimeout(function () { window.location.href = "gestao_admin.php"; }, 2000)</script>';
				}else{
					echo'<div class="container" id="mensagem"> 
					<div class="alert alert-danger text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Não foi possivel registar o utilizador.</div>
					</div>
					<script> setTimeout(function () { window.location.href = "gestao_admin.php"; }, 2000)</script>';
				}
			}else{
				echo'<div class="container" id="mensagem"> 
				<div class="alert alert-danger text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Não foi possivel registar o utilizador.</div>
				</div>
				<script> setTimeout(function () { window.location.href = "gestao_admin.php"; }, 2000)</script>';
			}
		}elseif ($action == "EfectuarEncomenda") {


			$id_utilizador = $_SESSION['id_utilizador'];
			$data_encomenda = $_GET["data_encomenda"];
			$hora_encomenda = $_GET["hora_encomenda"];
			$produto = $_GET["produto"];
			$morada = $_GET["morada"];
			$morada_defeito = $_SESSION['morada'];
			$quantidade = $_GET["quantidade"];



			if ($id_utilizador != null && $data_encomenda != null && $hora_encomenda != null && $produto != null && $quantidade > 0) {
				if ($morada == "") {
					$sql = "INSERT INTO encomenda (data_encomenda,hora_encomenda,produto,id_utilizador,quantidade,morada_entrega) VALUES ('$data_encomenda','$hora_encomenda','$produto','$id_utilizador','$quantidade','$morada_defeito')";
					$retval1 = mysqli_query($conn , $sql);

					if (mysqli_affected_rows ($conn) == 1){
						echo'<div class="container" id="mensagem"> 
						<div class="alert alert-success text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Encomenda realizada com sucesso!</div>
						</div>
						<script> setTimeout(function () { window.location.href = "encomendas_cliente.php"; }, 2000)</script>';
					}else{
						echo'<div class="container" id="mensagem"> 
						<div class="alert alert-danger text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Não foi possivel realizar a sua encomenda.</div>
						</div>
						<script> setTimeout(function () { window.location.href = "encomendas_cliente.php"; }, 2000)</script>';
					}
				}elseif ($morada != null) {
					$sql = "INSERT INTO encomenda (data_encomenda,hora_encomenda,produto,id_utilizador,quantidade,morada_entrega) VALUES ('$data_encomenda','$hora_encomenda','$produto','$id_utilizador','$quantidade','$morada')";
					$retval1 = mysqli_query($conn , $sql);

					if (mysqli_affected_rows ($conn) == 1){
						echo'<div class="container" id="mensagem"> 
						<div class="alert alert-success text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Encomenda realizada com sucesso!</div>
						</div>
						<script> setTimeout(function () { window.location.href = "encomendas_cliente.php"; }, 2000)</script>';
					}else{
						echo'<div class="container" id="mensagem"> 
						<div class="alert alert-danger text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Não foi possivel realizar a sua encomenda.</div>
						</div>
						<script> setTimeout(function () { window.location.href = "encomendas_cliente.php"; }, 2000)</script>';
					}
				}

			}else{
				echo'<div class="container" id="mensagem"> 
						<div class="alert alert-danger text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Não foi possivel realizar a sua encomenda.</div>
						</div>
						<script> setTimeout(function () { window.location.href = "encomendas_cliente.php"; }, 2000)</script>';
			}
		}
		?>
	</body>
	</html>
