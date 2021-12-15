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

$request = "UPDATE utilizador SET tipo_utilizador = 2  WHERE username = '$username'";

$validar = mysqli_query($conn , $request);

if (mysqli_affected_rows ($conn) == 1){
	echo ('<font color="green">Validado com sucesso</font>');
	header ("refresh:0; url=gestao_admin.php#aqui");
}
?>