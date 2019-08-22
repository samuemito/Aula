<?php

$dsn = "mysql:dbname=aulastri;host=localhost";
$dbuser = "root";
$dbpass = "";

try {
	
	$pdo = new PDO($dsn, $dbuser, $dbpass);

} catch (PDOException $e) {
	echo "Algo de errado não está certo!";
}