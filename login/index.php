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
</head>
<body>

	<?php
	if(isset($_SESSION['senhae'])):
	?>
	<h1>Essa senha inserida está errada!</h1>
	<?php
	endif;
	unset($_SESSION['senhae']);
	?>

	<?php
	if(isset($_SESSION['nexi'])):
	?>
	<h1>Essa conta não existe!</h1>
	<?php
	endif;
	unset($_SESSION['nexi']);
	?>

	<?php
	if(isset($_SESSION['digitealgo'])):
	?>
	<h1>Digite algo antes de logar!</h1>
	<?php
	endif;
	unset($_SESSION['digitealgo']);
	?>
	<form method="POST" action="logar.php">
		Digite seu nick:
		<input type="text" name="nick" placeholder="Digite seu nick aqui!"><br>
		Digite sua senha:
		<input type="password" name="senha" placeholder="Digite sua senha aqui!"><br>
		<button>Logar-se</button>
	</form>


</body>
</html>