<?php 
#conectar
$servername = "localhost";
$userName = "root";
$password = "";
$dbName = "sistema_policia";
$port = "3308";
//abre conexão
$connect = mysqli_connect($servername, $userName, $password, $dbName, $port);
mysqli_set_charset($connect, 'utf8');
//verifica se tem erro de conexão
if (mysqli_connect_error()) {
	# code...
	echo "Erro na conexão".mysqli_connect_error();
}