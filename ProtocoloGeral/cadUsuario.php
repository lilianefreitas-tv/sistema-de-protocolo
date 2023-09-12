<?php
	require "home.php";
	require "src/config.php";
	
	if (isset($_POST['submit']))
	{
        include "src/config.php";
		$id_usuario = $_POST['id_usuario'];
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$perfil = $_POST['perfil'];
		
		$result = mysqli_query($conexao, "INSERT INTO usuario (id_usuario,nome, email, senha, perfil) VALUES (null,'{$nome}','{$email}','{$senha}','{$perfil}')");
		
	}
	
?>
<!DOCTYPE html>
<html lang="pt-Br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
		
		
		<!-- Custom styles for this template -->
		<link href="form-validation.css" rel="stylesheet">
	</head>
	
	<body class="bg-light">
		<div class="container">
			<div class="py-4 text-center">
				<br> <br>
				<h2>Cadastro de Usuário</h2>
			</div>
		</div>
        <div class=" container col-md-6 order-md-1">
			<div class="py-3 text-left">
				<form class="needs-validation" novalidate action="cadUsuario.php" method="POST" >
					<div class="row">
						<div class="col-md-1 mb-3">
							<label for="codigo">Código</label>
							<input type="text" class="form-control" name= "codigo" id="codigo" placeholder="" value="" required readonly>
						</div>
						<div class="col-md-6 mb-3">
							<label for="Nome">Nome</label>
							<input type="text" class="form-control" name= "nome" id="nome" placeholder="" value="" required>
							<div class="invalid-feedback">
								Valid last name is required.
							</div>
						</div>
						<div class="col-md-5 mb-3">
							<label for="email">E-mail</label>
							<input type="text" class="form-control" name= "email" id="email" placeholder="" value="" required>
							<div class="invalid-feedback">
								Valid last name is required.
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="senha">Senha</label>
							<input type="password" class="form-control" name= "senha" id="senha" placeholder="" value="" required>
							<div class="invalid-feedback">
								Valid last name is required.
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="perfil">Perfil</label>
							<select class="form-control" id="exampleFormControlSelect1" name= "perfil">
								<option>Protocolista</option>
								<option>Administrativo</option>
								<option>Admin</option>
							</select>
						</div>
						
					</div>
					
					<hr class="mb-2">
					<input class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="Salvar">
				</form>
			</div>
		</div>
		
		<footer class="my-1 pt-3 text-muted text-center text-small">
			<p class="mb-1">Ministério Público do Estado do Pará &copy; 2023</p>
			<p align="center">Usuário Logado: <?php echo  $logado ?> </p>
		</footer>
	
		<script>
			// Example starter JavaScript for disabling form submissions if there are invalid fields
			(function() {
				'use strict';
				
				window.addEventListener('load', function() {
					// Fetch all the forms we want to apply custom Bootstrap validation styles to
					var forms = document.getElementsByClassName('needs-validation');
					
					// Loop over them and prevent submission
					var validation = Array.prototype.filter.call(forms, function(form) {
						form.addEventListener('submit', function(event) {
							if (form.checkValidity() === false) {
								event.preventDefault();
								event.stopPropagation();
							}
							form.classList.add('was-validated');
						}, false);
					});
				}, false);
			})();
		</script>
	</body>
</html>
