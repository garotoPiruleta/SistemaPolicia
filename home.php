<?php 
	include_once 'header.php';
 ?>
<?php 
	require_once 'db_connect.php';
	session_start();
	//se não existe a sessão
	if (!isset($_SESSION['logado'])) {
		# code...
		header("Location: index.php");
	}
	//dados
	$id = $_SESSION['id_usuario'];
	$sql = "SELECT * FROM policiais WHERE id = '$id'";
	$resultado =  mysqli_query($connect, $sql);
	//variavel que contem todos os dados da tabela
	$dados  = mysqli_fetch_array($resultado);
	//fecha consulta
	mysqli_close($connect);
 ?>
 	<div class="container">
 		<h1>Olá <?php echo $dados['nome']; ?></h1>
		<br>
		<a href="cadastro_preso/cadastro.php"><button class="btn btn-outline-secondary">Cadastrar Novo Meliante</button></a>
		<a href="logout.php"><button class="btn btn-outline-dark">Logout</button></a>
 	</div>
		
	
<?php 
	include_once 'footer.php'; 
?>