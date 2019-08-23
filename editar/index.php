<?php
session_start();
require '../bd/bd.php';
if(!isset($_SESSION['logado'])) {
	header('Location: ../login');
	exit;
} else {
	// if(isset($_POST[''])) {
	// 	$c = addslashes($_POST['cargo']);
	// 	$verificar = "SELECT * FROM registros WHERE Nome = :name";
	// 	$verificar = $pdo->prepare($verificar);
	// 	$verificar->bindValue(':name', $_SESSION['nick']);
	// 	$verificar->execute();
	// 	if($verificar->rowCount() > 0) {
	// 		$user = $verificar->fetch();
	// 		if($user >= 7){

	// 		}
	// }
	if(isset($_GET['ID'])) {
		if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
			$id = addslashes($_GET['ID']);
			$verificar = "SELECT * FROM registros WHERE Nome = :name";
			$verificar = $pdo->prepare($verificar);
			$verificar->bindValue(':name', $_SESSION['nick']);
			$verificar->execute();
			if($verificar->rowCount() > 0) {
				$user = $verificar->fetch();
				if($user[4] >= 7){
					$pegar = "SELECT * FROM registros WHERE ID = :id";
					$pegar = $pdo->prepare($pegar);
					$pegar->bindValue(':id', $id);
					$pegar->execute();
					if($pegar->rowCount() > 0) {
						$un = $pegar->fetch();
						if (empty($_POST['nome']) == false && empty($_POST['email']) == false && empty($_POST['senha']) == false) {
							$editarnome = "UPDATE registros SET Nome = :nome, Email = :email, Senha = :senha WHERE ID = :id";
							$editarnome = $pdo->prepare($editarnome);
							$editarnome->bindValue(':nome', $_POST['nome']);
							$editarnome->bindValue(':email', $_POST['email']);
							$editarnome->bindValue(':senha', $_POST['senha']);
							$editarnome->bindValue(':id', $id);
							$editarnome->execute();
							header('Location: ../painel');
							exit;
						}
						if (empty($_POST['nome']) == false && empty($_POST['email']) == false) {
							$editarnome = "UPDATE registros SET Nome = :nome, Email = :email WHERE ID = :id";
							$editarnome = $pdo->prepare($editarnome);
							$editarnome->bindValue(':nome', $_POST['nome']);
							$editarnome->bindValue(':email', $_POST['email']);
							$editarnome->bindValue(':id', $id);
							$editarnome->execute();
							header('Location: ../painel');
							exit;
						}
						if (empty($_POST['nome']) == false && empty($_POST['senha']) == false) {
							$editarnome = "UPDATE registros SET Nome = :nome, Senha = :senha WHERE ID = :id";
							$editarnome = $pdo->prepare($editarnome);
							$editarnome->bindValue(':nome', $_POST['nome']);
							$editarnome->bindValue(':senha', $_POST['senha']);
							$editarnome->bindValue(':id', $id);
							$editarnome->execute();
							header('Location: ../painel');
							exit;
						}
						if (empty($_POST['email']) == false && empty($_POST['senha']) == false) {
							$editarnome = "UPDATE registros SET Email = :email, Senha = :senha WHERE ID = :id";
							$editarnome = $pdo->prepare($editarnome);
							$editarnome->bindValue(':email', $_POST['email']);
							$editarnome->bindValue(':senha', $_POST['senha']);
							$editarnome->bindValue(':id', $id);
							$editarnome->execute();
							header('Location: ../painel');
							exit;
						}if (empty($_POST['email']) == false) {
							$editarnome = "UPDATE registros SET Email = :email WHERE ID = :id";
							$editarnome = $pdo->prepare($editarnome);
							$editarnome->bindValue(':email', $_POST['email']);
							$editarnome->bindValue(':id', $id);
							$editarnome->execute();
							header('Location: ../painel');
							exit;
						}
						if (empty($_POST['senha']) == false) {
							$editarnome = "UPDATE registros SET Senha = :senha WHERE ID = :id";
							$editarnome = $pdo->prepare($editarnome);
							$editarnome->bindValue(':senha', $_POST['senha']);
							$editarnome->bindValue(':id', $id);
							$editarnome->execute();
							header('Location: ../painel');
							exit;
						}
						if(empty($_POST['nome']) == false) {
							$editarnome = "UPDATE registros SET Nome = :nome WHERE ID = :id";
							$editarnome = $pdo->prepare($editarnome);
							$editarnome->bindValue(':nome', $_POST['nome']);
							$editarnome->bindValue(':id', $id);
							$editarnome->execute();
							header('Location: ../painel');
							exit;
						}
					}

				} else {
					header('Location: ../editar/?ID='.$id.'');
					$_SESSION['cargo'] = 1;
					exit;
				}
			}
		}	
	} else {
		header('Location: ../painel');
		exit;
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
		if(!isset($_SESSION['cargo'])) {
			echo "
		<div id='notification' style='font-size: 10px;'>
			<h1>
				Se quiser pode mudar apenas 1, oque você preferir.
			</h1>
		</div>";
		}
		if (isset($_SESSION['cargo'])):
		?>
		<div id="notification" style="font-size: 10px;">
			<h1>
				Seu cargo é abaixo de 7.
			</h1>
		</div>
		<?php
		endif;
		unset($_SESSION['cargo']);
		?>

		<br>
		<div id="campo">
			Digite um novo nome:
			<input type="text" name="nome" placeholder="Digite novo nome!"><br>
		</div>
		<div id="campo">
			Digite um novo email:
			<input type="mail" name="email" placeholder="Digite novo emai!"><br>
		</div>
		<div id="campo">
			Digite um nova senha:
			<input type="password" name="senha" placeholder="Digite nova senha!"><br>
		</div>
		<div id="botao">
			<button>Editar</button>
		</div>
	</form>


</body>
</html>