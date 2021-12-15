	$editar_encomenda = "UPDATE encomenda 
	SET 
	data_encomenda = '$data_encomenda', 
	hora_encomenda = '$hora_encomenda',
	produto = '$produto',
	morada_entrega = '".$_SESSION['morada']."',
	quantidade = '$quantidade'
	WHERE 
	id_encomenda = '". $_SESSION['id_encomenda']."'";