<?php
session_start();
if(!isset($_SESSION['logado'])) {
	header('Location: ../login');
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Logado</title>
</head>
<body>
	<h1>Você está logado com sucesso!</h1>
	<a href="../logout"><button>Desconectar</button></a>
</body>
</html>