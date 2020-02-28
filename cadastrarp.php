<?php 
	include_once 'header.php';
 ?>
<?php 
	require_once 'db_connect.php';
	function clear($input){
		global $connect;
		$var = mysqli_escape_string($connect, $input);
		$var = htmlspecialchars($var);
		return $var;
	}

	if (isset($_POST['btn-cadastrar'])) {
		# code...
		//obtem os dados pré formatado
		$login = clear($_POST['login']);
		$senha = clear($_POST['senha']);
		$nome = clear($_POST['nome']);
		//gera a senha segura
		$senhaSegura = password_hash($senha, PASSWORD_DEFAULT);
		//echo "login:$login <br> senha:$senha<br> nome:$nome<br>";
		//echo $senhaSegura;
		//insere os valores no banco de dados
		$sql = "INSERT INTO policiais (login, senha, nome) VALUES ('$login', '$senhaSegura', '$nome')";
		
		//verifica se deu tudo certo
		if (mysqli_query($connect, $sql)) {
			# code...
			echo "<li>Cadastrado com sucesso</li>";
			header("Location: ../index.php");
		}else{
			echo "<li<Erro no cadastro</li>";
			header("Location: ../index.php");
		}
		mysqli_close($connect);

	}
?>



 	<h1>Cadastro</h1>
 	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
		<div class="form-row align-items-center">
    		<div class="col-auto">
      			<label class="sr-only" for="inlineFormInput">Name</label>
      			<input type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Nome" name="nome">
    		</div>
    		<div class="col-auto">
      			<label class="sr-only" for="inlineFormInputGroup">Username</label>
      			<div class="input-group mb-2">
        			<div class="input-group-prepend">
          				<div class="input-group-text">@</div>
       				 </div>
        			<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username" name="login">
      			</div>
   			</div>
   			<div class="col-auto">
   				<label  class="sr-only" for="inputPassword5">Password</label>
				<input type="password" id="inputPassword5" class="form-control" placeholder="Password" name="senha">
   			</div>
   			<div class="col-auto">
      			<button type="submit" class="btn btn-primary mb-2">Cadastrar</button>
    		</div>
    	</div>
	</form>	
	<a href="index.php" class="badge badge-primary">Voltar</a>
	  
<?php 
	include_once 'footer.php';
 ?>