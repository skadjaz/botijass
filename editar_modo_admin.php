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
$nome = $_GET["nome"];
$morada = $_GET["morada"];
$email = $_GET["email"];
$nr_telefone = $_GET["nr_telefone"];
$dataNascimento = $_GET["dataNascimento"];
$tipo_utilizador = $_GET["tipo_utilizador"];
$password = md5($_GET["password"]);

$update = "UPDATE utilizador SET 
nome = '$nome', 
morada = '$morada', 
email = '$email', 
nr_telefone = '$nr_telefone', 
datanascimento = '$datanascimento',
tipo_utilizador = '$tipo_utilizador',
password = '$password'
WHERE  
username = '$username'";

$retval1 = mysqli_query($conn , $update);

if (mysqli_affected_rows ($conn) == 1){
	
	header ("refresh:2; url=gestao_admin.php");
}else if (mysqli_affected_rows ($conn) == 0){
	echo ('Erro');
	header ("refresh:1; url=gestao_cliente_administrador.php");
}
?>