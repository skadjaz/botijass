<?php 
ob_start();
session_start();
include 'basedados.h';

$username = $_GET["username"];
$password = md5($_GET["password"]);
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
datanascimento = '$datanascimento',
password = '$password'
WHERE  
username = '$username'";

$retval1 = mysqli_query($conn , $update);

if (mysqli_affected_rows ($conn) == 1){
	echo ('Actualizado com sucesso');
	header ("refresh:0; url=index.php");
	$_SESSION['nome'] = $nome;
	$_SESSION['username'] = $username;
}else if (mysqli_affected_rows ($conn) == 0){
	echo ('Erro');
	header ("refresh:1; url=editar.php");
}
?>