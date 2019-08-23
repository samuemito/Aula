<?php
session_start();
require '../bd/bd.php';
if(!isset($_SESSION['logado'])) {
	header('Location: ../login');
	exit;
}
$info = "SELECT * FROM registros WHERE Nome = :nome";
$info = $pdo->prepare($info);
$info->bindValue(':nome', $_SESSION['nick']);
$info->execute();
if($info->rowCount() > 0) {
	$infos = $info->fetch();
}
$users = "SELECT * FROM registros";
$users = $pdo->prepare($users);
$users->execute();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Logado</title>
</head>
<body>
	<table width="100%">
		<tr>
			<th>
				ID
			</th>
			<th>
				Nome
			</th>
			<th>
				Email
			</th>
			<th>
				Cargo
			</th>
			<th>
				Funções
			</th>
		</tr>
			<?php
			foreach($users->fetchAll() as $user) {
				echo "<tr style='text-align:center;margin-top:40px;'><td>".$user['ID']."</td><td>".$user['Nome']."</td><td>".$user['Email']."</td><td>".$user['Permission']."</td><td><a href='../excluir/?ID=".$user['ID']."'>Excluir</a> - <a href='../editar/?ID=".$user['ID']."'>Editar</a> - <a href='../cargo/?ID=".$user['ID']."'>Cargo</a></td></tr>";
			}
			?>
	</table>
	<a href="../logout"><button>Desconectar</button></a>
</body>
</html>