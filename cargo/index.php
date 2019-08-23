<?php
session_start();
require '../bd/bd.php';
if(!isset($_SESSION['logado'])) {
	header('Location: ../login');
	exit;
} else {
	if(isset($_POST['cargo'])) {
		$c = addslashes($_POST['cargo']);
		$verificar = "SELECT * FROM registros WHERE Nome = :name";
		$verificar = $pdo->prepare($verificar);
		$verificar->bindValue(':name', $_SESSION['nick']);
		$verificar->execute();
		if($verificar->rowCount() > 0) {
			$user = $verificar->fetch();
			if($c > $user[4]){
				$_SESSION['digitado'] = 1;
			} else {
				$id = addslashes($_GET['ID']);
				$dar = "UPDATE registros SET Permission = :cargo WHERE ID = :id";
				$dar = $pdo->prepare($dar);
				$dar->bindValue(':cargo', $c);
				$dar->bindValue(':id', $id);
				$dar->execute();
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
	<title>Aula | Login</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/princ.css">
</head>
<body>
	<form method="POST" id="form">


		<?php
		if(isset($_SESSION['digitado'])):
		?>
		<div id="notification">
			<h1>
				Seu cargo é menor que o digitado!
			</h1>
		</div>
		<br>
		<?php
		endif;
		unset($_SESSION['digitado']);
		?>
		<br>
		<div id="campo">
			Digite um novo cargo:
			<input type="number" name="cargo" placeholder="Digite novo cargo!"><br>
		</div>
		<div id="botao">
			<button>Dar cargo</button>
		</div>
	</form>


</body>
</html>