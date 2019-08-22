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
</head>
<body>
	<?php
	if(isset($_SESSION['ndigitou'])):
	?>
	<h1>
		Digite algo para se registrar!
	</h1>
	<?php
	endif;
	unset($_SESSION['ndigitou']);
	?>
	<form method="POST" action="registrar.php">
		Digite seu nick:
		<input type="text" name="nome" placeholder="Digite seu nick aqui!"><br>
		Digite seu email:
		<input type="mail" name="email" placeholder="Digite seu email aqui!"><br>
		Digite sua senha:
		<input type="password" name="senha" placeholder="Digite sua senha aqui!"><br/>
		<button>Registrar-se</button>
	</form>

</body>
</html>