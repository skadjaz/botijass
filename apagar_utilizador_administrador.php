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

$delete = "DELETE FROM utilizador WHERE username = '$username'";

$retval1 = mysqli_query($conn , $delete);

if (mysqli_affected_rows ($conn) == 1){
	header ("refresh:1; url=gestao_admin.php");
}
?>