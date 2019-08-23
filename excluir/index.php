<?php
session_start();
require '../bd/bd.php';

if(!isset($_SESSION['logado'])) {
	header('Location: ../login');
	exit;
} else {
	if(isset($_GET['ID'])) {
		$verificar = "SELECT * FROM registros WHERE Nome = :nome";
		$verificar = $pdo->prepare($verificar);
		$verificar->bindValue(':nome', $_SESSION['nick']);
		$verificar->execute();
		if($verificar->rowCount() > 0) {
			$user = $verificar->fetch();
			if($user[4] >= 7) {
				$excluir = "DELETE FROM registros WHERE ID = :id";
				$excluir = $pdo->prepare($excluir);
				$excluir->bindValue(':id', $_GET['ID']);
				$excluir->execute();
				header('Location: ../painel');
				exit;
			} else {
				header('Location: ../painel');
				exit;
			}
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Excluir</title>
</head>
<body>

</body>
</html>