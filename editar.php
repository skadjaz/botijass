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
			<div class="alert alert-success text-center" style="border-radius: 50px; padding: 20px" id="flash-msg">A sua encomenda foi alterada com sucesso</div>
		</div>
		<script> setTimeout(function () { window.location.href = "index.php"; }, 1500)</script>';


	$_SESSION['nome'] = $nome;
	$_SESSION['username'] = $username;
}else if (mysqli_affected_rows ($conn) == 0){
	echo ('Erro');
	header ("refresh:1; url=editar.php");
}
?>
</body>
</html>
