<?php
session_start();
require 'bd/bd.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Aula</title>
	<link rel="stylesheet" type="text/css" href="assets/css/princ.css">
</head>
<body>
	<div id="menu">
		<ul>
			<a>
				<li>
					Inicio
				</li>
			</a>
			<a>
				<li>
					Fórum
				</li>
			</a>
			<a href="register/">
				<li>
					Registrar-se
				</li>
			</a>
			<a href="login/">
				<li>
					Logar-se
				</li>
			</a>
		</ul>
	</div>

</body>
</html>