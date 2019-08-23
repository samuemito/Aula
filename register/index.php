<?php
session_start();
if (isset($_SESSION['logado'])) {
	header('Location: ../painel');
	exit;
}
require '../bd/bd.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Aula | Registrar-se</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/princ.css">
</head>
<body>
	<form method="POST" action="registrar.php" id="form">
		<?php
		if(isset($_SESSION['jaexi'])):
		?>
		<div id="notification">
			<h1>
				Essa conta com esse nome de usuário já existe!
			</h1>
		</div>
		<br>
		<?php
		endif;
		unset($_SESSION['jaexi']);
		?>
		<?php
		if(isset($_SESSION['ndigitou'])):
		?>
		<div id="notification">
			<h1>
				Digite algo para se registrar!
			</h1>
		</div>
		<br>
		<?php
		endif;
		unset($_SESSION['ndigitou']);
		?>
		<br>
		<div id="campo">
			Digite seu nick:
			<input type="text" name="nome" placeholder="Digite seu nick aqui!"><br>
		</div>
		<div id="campo">
			Digite seu email:
			<input type="mail" name="email" placeholder="Digite seu email aqui!"><br>
		</div>
		<div id="campo">
			Digite sua senha:
			<input type="password" name="senha" placeholder="Digite sua senha aqui!"><br/>
		</div>
		<div id="botao">
			<button>
				Registrar-se
			</button>
		</div>
	</form>

</body>
</html>