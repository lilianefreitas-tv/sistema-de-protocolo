<?php
	require "src/config.php";
	session_start();
	if((!isset($_SESSION['email'])==true)and (!isset($_SESSION['password'])== true))
	{
		unset($_SESSION['email']);
		unset($_SESSION['password']);
		header ("Location: login.php");
	}
	$logado = $_SESSION['email'];
	
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Protocolo Geral MPPA</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="protocolo.php">Protocolos</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="home.php" id="dropdownconsulta"  data-toggle="dropdown" > Consultas</a>
						<div class="dropdown-menu" aria-labelledby ="dropdownconsulta">
							<a class="dropdown-item" href="ConsultaProtocolo.php">Protocolos</a>
							<a class="dropdown-item" href="ConsultaUsuario.php">Usuários</a>
							<a class="dropdown-item" href="relatorios.php">Relatórios</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="home.php" id="dropdown01" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administração</a>
						<div class="dropdown-menu" aria-labelledby="dropdown01">
							<a class="dropdown-item" href="cadUsuario.php">Usuários</a>
						</div>
					</li>
				</ul>
			</div>
			<div class="d-flex"> 
				<a href ="sair.php" class="btn btn-danger me-5" > Sair </a>
			</div>
		</nav>
	

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>