<?php
ob_start();
session_start();
include 'basedados.h';

if (!isset($_SESSION['username'])){
	header ("Location: index.php"); 
}elseif ($_SESSION['tipo_utilizador'] != "Cliente") {
	header ("Location: index.php"); 
}
$id_encomenda = $_SESSION['id_encomenda'];
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
	"WHERE id_encomenda = '".$_SESSION['id_encomenda']."' ";
}elseif ($quantidade >= 1) {
	$editar_encomenda = "UPDATE encomenda 
	SET 
	data_encomenda = '$data_encomenda', 
	hora_encomenda = '$hora_encomenda',
	produto = '$produto',
	quantidade = '$quantidade',
	morada_entrega = '$morada_entrega'
	WHERE 
	id_encomenda = '" . $_SESSION['id_encomenda'] ."'";
}else{
	$result='<div class="alert alert-danger text-center" style="border-radius: 50px;" id="flash-msg">Sorry there was an error sending your message. Please try again later</div>';
	$_SESSION['varname'] = $result;
	header ("Refresh:0;url=encomendas_cliente.php");
}

$executar = mysqli_query($conn , $editar_encomenda);

if (mysqli_affected_rows ($conn) == 1){
	$result='<div class="alert alert-success text-center" style="border-radius: 50px;" id="flash-msg">A sua encomenda foi alterada com sucesso</div>';
	$_SESSION['varname'] = $result;
	header ("Location: encomendas_cliente.php");
}
?>

