<?php
session_start();
require '../bd/bd.php';
if(isset($_POST['nick']) && empty($_POST['nick']) == false && isset($_POST['senha']) && empty($_POST['nick']) == false) {

	$nome = addslashes($_POST['nick']);
	$senha = addslashes(MD5($_POST['senha']));
	$verificar = "SELECT * FROM registros WHERE Nome = :nome";
	$verificar = $pdo->prepare($verificar);
	$verificar->bindValue(':nome', $nome);
	$verificar->execute();
	if ($verificar->rowCount() > 0) {
		$veri = $verificar->fetch();
		if($veri[3] == $senha) {
			$_SESSION['nick'] = $nome;
			$_SESSION['logado'] = 1;
			header('Location: ../painel');
			exit;
		} else {
			$_SESSION['senhae'] = 1;
			header('Location: ../login');
			exit;
		}
	} else {
		$_SESSION['nexi'] = 1;
		header('Location: ../login');
		exit;
	}

} else {
	$_SESSION['digitealgo'] = 1;
	header('Location: ../login');
	exit;
}

?>