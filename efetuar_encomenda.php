<?php 
ob_start();
session_start();
include 'basedados.h';

$id_utilizador = $_SESSION['id_utilizador'];
$data_encomenda = $_GET["data_encomenda"];
$hora_encomenda = $_GET["hora_encomenda"];
$produto = $_GET["produto"];
$morada = $_GET["morada"];
$morada_defeito = $_SESSION['morada'];
$quantidade = $_GET["quantidade"];

if ($morada == "") {
	$sql = "INSERT INTO encomenda (data_encomenda,hora_encomenda,produto,id_utilizador,quantidade,morada_entrega) VALUES ('$data_encomenda','$hora_encomenda','$produto','$id_utilizador','$quantidade','$morada_defeito')";
}else{
	$sql = "INSERT INTO encomenda (data_encomenda,hora_encomenda,produto,id_utilizador,quantidade,morada_entrega) VALUES ('$data_encomenda','$hora_encomenda','$produto','$id_utilizador','$quantidade','$morada')";
}



$retval1 = mysqli_query($conn , $sql);

if (mysqli_affected_rows ($conn) == 1){
	header ("refresh:0; url=encomendas_cliente.php");
}
?>