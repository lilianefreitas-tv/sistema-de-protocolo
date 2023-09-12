<?php
	
	if (isset($_POST['submit']))
	{
		require "src/config.php";
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		
		
		
	}
?>
<!doctype html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="Sistema de Protocolo Geral para registros do Ministério Público do Pará">
		<meta name="author" content="Desenvolvido por: Liliane de Freitas (Téc. Informática - Sudoeste I">
		<link rel="icon" href="favicon.ico">
		<title>Login: Protocolo Geral MPPPA</title>
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		
		<!-- Estilos customizados para esse template -->
		<link href="signin.css" rel="stylesheet">
	</head>
	
	<body class="text-center">
		<div class="w-25 p-3 mx-auto" >
			<form class="form-signin" action="testeLogin.php" method="POST">
				<img class="mb-4" src="img/NovaLogomarca.png" alt="" width="100" height="60">
				<h1 class="h3 mb-3 font-weight-normal">Entrar no Sistema</h1>
				<input type="email" name= "email" id="inputEmail" class="form-control" placeholder="Seu email" required autofocus>
				<br>
				<input type="password" name= "senha" id="inputPassword" class="form-control" placeholder="Senha" required>
				<br>
				<input class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Entrar">
				<br>
			</form>
			<p class="mt-5 mb-3 text-muted">Ministério Público do Estado do Pará &copy; 2023</p>
		</div>
		
		
		  <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
	</body>
</html>