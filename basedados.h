<?php
	$host = "localhost";
	$NOME_BD = "PWBD_BOTIJAS";
	$USER_BD = "root";
	$PASS_BD = "";

	$conn = mysqli_connect($host, $USER_BD, $PASS_BD, $NOME_BD);

	if(! $conn ){
		die('Could not connect: ' . mysqli_error($conn));
	}
?>