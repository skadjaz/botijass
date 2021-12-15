<?php
	ob_start();
	session_start();
	if (!empty($_GET)) {
		include 'basedados.h';
		$username = $_GET["username"];
		$password = md5($_GET["password"]);
		$sql = "SELECT u.*,tu.* FROM utilizador u INNER JOIN tipoutilizador tu WHERE u.username ='".$username."' AND u.password = '".$password."' AND u.tipo_utilizador = tu.tipo_utilizador";
		$login = mysqli_query($conn , $sql);
		$count = mysqli_num_rows($login);
		if ($count == 1) {
			while($row = mysqli_fetch_array($login)){
				$tipo = $row['descricao']; 
				$tipoNr = $row['tipo_utilizador'];
				$nome = $row['nome']; 
				$id_utilizador = $row['id_utilizador'];
				$morada = $row['morada'];
			}
			$_SESSION['tipo_utilizador'] = $tipo;
			$_SESSION['id_utilizador'] = $id_utilizador;
			$_SESSION['tipoNr'] = $tipoNr;
			$_SESSION['username'] = $username;
			$_SESSION['nome'] = $nome;
			$_SESSION['morada'] = $morada;
			$_SESSION['estado'] = "online";
			
			// Redirecionar para index.php
			header ("Location: index.php");
		} else {
			// Alerta Erro
			echo ('<script>alert("Nome ou password inválidos")</script>');
			// Redirecionar para a página anterior
			header ("Refresh:0; URL=login.html");
		}	
	}
?>