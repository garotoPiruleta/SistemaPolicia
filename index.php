<?php 
	include_once 'header.php';
 ?>
<?php 
	require_once 'db_connect.php';
	session_start();
	#verifica se o botão do formulario foi apertado
	if (isset($_POST['btn-submit'])) {
		# code...
		//erros
		$erros = array();
		//obtem os dados
		$login = mysqli_escape_string($connect, $_POST['userName']);
		$password = mysqli_escape_string($connect, $_POST['password']);
		//parte do login
		if (empty($login) and empty($password)) {
			# code...
			$erros[] =  "<div class='alert alert-danger' role='alert'>
  Username/password incorretos!
</div>";
		}
		//se não estiver vazio
		if (!empty($erros)) {
			# code...
			foreach ($erros as $erro ) {
				# code...
				echo $erro;
			}
		}else{

			$sql = "SELECT * FROM policiais";
			$resultado = mysqli_query($connect, $sql);
			if (mysqli_num_rows($resultado) > 0) {
				# code...
				while ($dados = mysqli_fetch_array($resultado)) {
					# code...
					if ($login == $dados['login']) {
						# code...
						$senha_db = $dados['senha'];
						if (password_verify($password, $senha_db)){
							# code...
							//verdadeira
							mysqli_close();
							$_SESSION['logado'] = true;
							$_SESSION['id_usuario'] = $dados['id'];
							header("Location: home.php");
						}else{
							$erros[] =  "Senha invalida";
						}
					}
				}
			}

		}
	}
	
 ?>
<!--parte html -->



	<h1>Be welcome</h1>
	<div class="container">
		<h2>Login</h2>
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
			<div class="form-group">
				<label class="sr-only" for="inlineFormInputGroup">Username</label>
      			<div class="input-group mb-2">
        			<div class="input-group-prepend">
          				<div class="input-group-text">@</div>
       				 </div>
        			<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username" name="userName">
        		</div>
			</div>
			<div class="form-group">
				<label  class="sr-only" for="inputPassword5">Password</label>
				<input type="password" id="inputPassword5" class="form-control" placeholder="Password" name="password">
			</div>
			<button type="submit" class="btn btn-primary mb-2" name="btn-submit">Login</button>
		</form>
		<a href="cadastrarp" class="badge badge-primary">Criar conta</a>
		<a href="#" class="badge badge-secondary">Esqueci senha</a>
	</div>
	

<?php 
	include_once 'footer.php';
 ?>