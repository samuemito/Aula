<?php
session_start();
if (isset($_SESSION['logado'])) {
	header('Location: ../painel');
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Aula | Login</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/princ.css">
</head>
<body>
	<form method="POST" action="logar.php" id="form">


		<?php
		if(isset($_SESSION['senhae'])):
		?>
		<div id="notification">
			<h1>
				Essa senha inserida está errada!
			</h1>
		</div>
		<br>
		<?php
		endif;
		unset($_SESSION['senhae']);
		?>

		<?php
		if(isset($_SESSION['nexi'])):
		?>
		<div id="notification">
			<h1>
				Essa conta não existe!
			</h1>
		</div>
		<br>
		<?php
		endif;
		unset($_SESSION['nexi']);
		?>

		<?php
		if(isset($_SESSION['digitealgo'])):
		?>
		<div id="notification">
			<h1>
				Digite algo antes de logar!
			</h1>
		</div>
		<br>
		<?php
		endif;
		unset($_SESSION['digitealgo']);
		?>
		<br>
		<div id="campo">
			Digite seu nick:
			<input type="text" name="nick" placeholder="Digite seu nick aqui!"><br>
		</div>
		<div id="campo">
			Digite sua senha:
			<input type="password" name="senha" placeholder="Digite sua senha aqui!"><br>
		</div>
		<div id="botao">
			<button>Logar-se</button>
		</div>
	</form>


</body>
</html>