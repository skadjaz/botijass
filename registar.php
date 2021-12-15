<?php 
	include 'basedados.h';


	$username = $_GET["username"];
	$password = md5($_GET["password"]);
	$email = $_GET["email"];
	$nome = $_GET["nome"];
	$dataNascimento = $_GET["dataNascimento"];
	$telefone = $_GET["telefone"];
	$morada = $_GET["morada"];

	$insert = "INSERT INTO utilizador (username,nome, morada, email, nr_telefone, datanascimento, tipo_utilizador, password) VALUES ('$username','$nome','$morada','$email','$telefone', '$dataNascimento',3, '$password')";

	$retval1 = mysqli_query($conn , $insert);
	
	if (mysqli_affected_rows ($conn) == 1){
		echo ('<script>alert("Cliente registado com sucesso!")</script>');
		header ("refresh:0; url=index.php");
	}else{
		echo ('<script>alert("Cliente registado SEM sucesso!")</script>');
		echo "INSERT INTO utilizador (nome, morada, email, nrtelefone, datanascimento, id_tipoUtilizador, pass) VALUES ('$nome','$morada','$email','$telemovel', '$dataNascimento', '$tipouser', '$pass')";
		header ("refresh:100; url=index.php");
	}
?>