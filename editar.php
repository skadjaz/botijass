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
	<title><?php 
	echo $_SESSION['nome'];
?></title>
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
	<?php 
	$action = $_GET["action"];

	if ($action == 1) {
		$username = $_GET["username"];
		$nome = $_GET["nome"];
		$morada = $_GET["morada"];
		$email = $_GET["email"];
		$nr_telefone = $_GET["nr_telefone"];
		$datanascimento = $_GET["datanascimento"];


		$update = "UPDATE utilizador SET 
		nome = '$nome', 
		morada = '$morada', 
		email = '$email', 
		nr_telefone = '$nr_telefone', 
		datanascimento = '$datanascimento'
		WHERE  
		username = '$username'";
		$atualizar = mysqli_query($conn , $update);
		if (mysqli_affected_rows ($conn) == 1){
			echo'<div class="container" id="mensagem"> 
			<div class="alert alert-success text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Os seus dados foram actualizados com sucesso!</div>
			</div>
			<script> setTimeout(function () { window.location.href = "index.php"; }, 1500)</script>';
			$_SESSION['nome'] = $nome;
			$_SESSION['username'] = $username;
		}else if (mysqli_affected_rows ($conn) == 0){
			echo'<div class="container" id="mensagem"> 
			<div class="alert alert-danger text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Não foi possivel actualizar os seus dados.</div>
			</div>
			<script> setTimeout(function () { window.location.href = "conta_utilizador.php"; }, 1500)</script>';
		}
	}elseif($action == 2){

		$id_encomenda = $_GET['id_encomenda'];
		$data_encomenda = $_GET["data_encomenda"];
		$hora_encomenda = $_GET["hora_encomenda"];
		$produto = $_GET["produto"];
		$quantidade = $_GET["quantidade"];
		$morada_entrega = $_GET["morada_entrega"];


		if ($morada_entrega == "" && $quantidade >= 1) {
			$editar_encomenda = "UPDATE encomenda SET " .
			"data_encomenda = '$data_encomenda', " .
			"hora_encomenda = '$hora_encomenda', " .
			"produto = '$produto', " . 
			"quantidade = '$quantidade', " .
			"morada_entrega = '".$_SESSION['morada']."' " .
			"WHERE id_encomenda = '".$id_encomenda."' ";
			$executar = mysqli_query($conn , $editar_encomenda);	

			if (mysqli_affected_rows ($conn) == 1){
				echo'<div class="container" id="mensagem"> 
				<div class="alert alert-success text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">A sua encomenda foi alterada com sucesso</div>
				</div>
				<script> setTimeout(function () { window.location.href = "encomendas_cliente.php"; }, 1500)</script>';
			}else{
				echo'<div class="container" id="mensagem"> 
				<div class="alert alert-success text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Não foi possivel alterar a sua encomenda</div>
				</div>
				<script> setTimeout(function () { window.location.href = "encomendas_cliente.php"; }, 11500)</script>';
			}
		}elseif($quantidade >= 1){
			$editar_encomenda = "UPDATE encomenda SET " .
			"data_encomenda = '$data_encomenda', " .
			"hora_encomenda = '$hora_encomenda', " .
			"produto = '$produto', " . 
			"quantidade = '$quantidade', " .
			"morada_entrega = '$morada_entrega' " .
			"WHERE id_encomenda = '".$id_encomenda."' ";
			$executar = mysqli_query($conn , $editar_encomenda);	

			if (mysqli_affected_rows ($conn) == 1){
				echo'<div class="container" id="mensagem"> 
				<div class="alert alert-success text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">A sua encomenda foi alterada com sucesso</div>
				</div>
				<script> setTimeout(function () { window.location.href = "encomendas_cliente.php"; }, 1500)</script>';
			}else{
				echo'<div class="container" id="mensagem"> 
				<div class="alert alert-success text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Não foi possivel alterar a sua encomenda</div>
				</div>
				<script> setTimeout(function () { window.location.href = "encomendas_cliente.php"; }, 11500)</script>';
			}
		}else{
			echo'<div class="container" id="mensagem"> 
			<div class="alert alert-success text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Não foi possivel alterar a sua encomenda</div>
			</div>
			<script> setTimeout(function () { window.location.href = "encomendas_cliente.php"; }, 11500)</script>';
		}
	}elseif($action == 3){

		$username = $_GET["username"];
		$nome = $_GET["nome"];
		$morada = $_GET["morada"];
		$email = $_GET["email"];
		$nr_telefone = $_GET["nr_telefone"];
		$dataNascimento = $_GET["dataNascimento"];
		$tipo_utilizador = $_GET["tipo_utilizador"];


		$update = "UPDATE utilizador SET 
		nome = '$nome', 
		morada = '$morada', 
		email = '$email', 
		nr_telefone = '$nr_telefone', 
		datanascimento = '$dataNascimento',
		tipo_utilizador = '$tipo_utilizador'
		WHERE  
		username = '$username'";

		$retval1 = mysqli_query($conn , $update);

		if (mysqli_affected_rows ($conn) == 1){
			echo'<div class="container" id="mensagem"> 
			<div class="alert alert-success text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Dados do utilizador atualizados com sucesso</div>
			</div>
			<script> setTimeout(function () { window.location.href = "gestao_admin.php"; }, 1500)</script>';
		}else if (mysqli_affected_rows ($conn) == 0){
			echo'<div class="container" id="mensagem"> 
			<div class="alert alert-success text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Não foi possivel atualizar os dados do utilizador</div>
			</div>
			<script> setTimeout(function () { window.location.href = "gestao_admin.php"; }, 1500)</script>';
		}
	}elseif ($action == 4) {
		$id_encomenda = $_GET['id_encomenda'];
		$data_encomenda = $_GET["data_encomenda"];
		$hora_encomenda = $_GET["hora_encomenda"];
		$produto = $_GET["produto"];
		$quantidade = $_GET["quantidade"];
		$morada_entrega = $_GET["morada_entrega"];


		if ($morada_entrega === "" && $quantidade >= 1) {
			$editar_encomenda = "UPDATE encomenda SET " .
			"data_encomenda = '$data_encomenda', " .
			"hora_encomenda = '$hora_encomenda', " .
			"produto = '$produto', " . 
			"quantidade = '$quantidade', " .
			"morada_entrega = '".$_SESSION['morada']."' " .
			"WHERE id_encomenda = '".$id_encomenda."' ";
			$executar = mysqli_query($conn , $editar_encomenda);	

			if (mysqli_affected_rows ($conn) == 1){
				echo'<div class="container" id="mensagem"> 
				<div class="alert alert-success text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">A sua encomenda foi alterada com sucesso</div>
				</div>
				<script> setTimeout(function () { window.location.href = "gestao_admin.php"; }, 1500)</script>';
			}else{
				echo'<div class="container" id="mensagem"> 
				<div class="alert alert-success text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Não foi possivel alterar a sua encomenda</div>
				</div>
				<script> setTimeout(function () { window.location.href = "gestao_admin.php"; }, 11500)</script>';
			}
		}elseif ($morada_entrega != null && $quantidade >= 1) {
			$editar_encomenda = "UPDATE encomenda SET " .
			"data_encomenda = '$data_encomenda', " .
			"hora_encomenda = '$hora_encomenda', " .
			"produto = '$produto', " . 
			"quantidade = '$quantidade', " .
			"morada_entrega = '".$morada_entrega."' " .
			"WHERE id_encomenda = '".$id_encomenda."' ";
			$executar = mysqli_query($conn , $editar_encomenda);	

			if (mysqli_affected_rows ($conn) == 1){
				echo'<div class="container" id="mensagem"> 
				<div class="alert alert-success text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">A sua encomenda foi alterada com sucesso</div>
				</div>
				<script> setTimeout(function () { window.location.href = "gestao_admin.php"; }, 1500)</script>';
			}else{
				echo'<div class="container" id="mensagem"> 
				<div class="alert alert-success text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Não foi possivel alterar a sua encomenda</div>
				</div>
				<script> setTimeout(function () { window.location.href = "gestao_admin.php"; }, 11500)</script>';
			}
		}
	}elseif ($action == "RemarcarEncomenda") {
		if ($_SESSION['tipo_utilizador'] != "Cliente") {
			header ("Location: logout.php"); 
		}else{
			$id_encomenda = $_GET["id_encomenda"];
			$atualizarEncomenda = "UPDATE encomenda SET estado = 'pendente' WHERE id_encomenda = '$id_encomenda'";
			$acaoAtualizarEncomenda = mysqli_query($conn , $atualizarEncomenda);

			if (mysqli_affected_rows ($conn) == 1){
				echo'<div class="container" id="mensagem"> 
				<div class="alert alert-success text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Encomenda remarcada com sucesso!</div>
				</div>
				<script> setTimeout(function () { window.location.href = "encomendas_cliente.php"; }, 1500)</script>';
			}else{
				echo'<div class="container" id="mensagem"> 
				<div class="alert alert-danger text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">Não foi possivel remarcar a sua encomenda.</div>
				</div>
				<script> setTimeout(function () { window.location.href = "encomendas_cliente.php"; }, 1500)</script>';
			}
		}
	}
	?>
</body>
</html>
