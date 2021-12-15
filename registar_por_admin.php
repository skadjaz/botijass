<?php 
	ob_start();
	session_start();
	include 'basedados.h';
	if (!isset($_SESSION['username'])){
		header ("Location: index.php"); 
	}elseif ($_SESSION['tipo_utilizador'] != "Administrador") {
		header ("Location: index.php"); 
	}
	$username = $_GET["username"];
	$password = md5($_GET["password"]);
	$email = $_GET["email"];
	$nome = $_GET["nome"];
	$dataNascimento = $_GET["dataNascimento"];
	$nr_telefone = $_GET["nr_telefone"];
	$tipo_utilizador = $_GET["tipo_utilizador"];
	$morada = $_GET["morada"];

	$insert = "INSERT INTO utilizador (username,nome, morada, email, nr_telefone, datanascimento, tipo_utilizador, password) VALUES ('$username','$nome','$morada','$email','$nr_telefone', '$dataNascimento', '$tipo_utilizador', '$password')";

	$retval1 = mysqli_query($conn , $insert);

	if (mysqli_affected_rows ($conn) == 1){
		header ("refresh:1; url=gestao_admin.php");
	}else{
		echo ('<script>alert("Cliente registado SEM sucesso!")</script>');
		header ("refresh:0; url=gestao_admin.php");
	}
?>