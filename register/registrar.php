<?php
session_start();
require '../bd/bd.php';


if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
	if (empty($_POST['nome']) == false && empty($_POST['email']) == false && empty($_POST['senha']) == false) {

		$nome = addslashes($_POST['nome']);
		$email = addslashes($_POST['email']);
		$senha = addslashes(MD5($_POST['senha']));

		$verificar = "SELECT * FROM registros WHERE Nome = :nome";
		$verificar = $pdo->prepare($verificar);
		$verificar->bindValue(':nome', $nome);
		$verificar->bindValue(':email', $email);
		$verificar->bindValue(':senha', $senha);
		$verificar->execute();

		if($verificar->rowCount() == 0) {

			$registrar = "INSERT INTO registros (Nome, Email, Senha) VALUE (:nome, :email, :senha)";
			$registrar = $pdo->prepare($registrar);
			$registrar->bindValue(':nome', $nome);
			$registrar->bindValue(':email', $email);
			$registrar->bindValue(':senha', $senha);
			$registrar->execute();

			$_SESSION['nick'] = $nome;
			$_SESSION['email'] = $email;
			$_SESSION['logado'] = 1;
			header('Location: ../painel');
			exit;
		} else {
			$_SESSION['jaexi'] = 1;
			header('Location: ../register');
			exit;
		}

	} else {
		$_SESSION['ndigitou'] = 1;
		header('Location: ../register');
		exit;
	}

} else {
	$_SESSION['ndigitou'] = 1;
	header('Location: ../register');
	exit;
}




?>