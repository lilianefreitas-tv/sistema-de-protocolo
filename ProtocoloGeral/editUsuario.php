<?php
	require "home.php";
	require "src/config.php";
	
	
	if (!empty($_GET['id']))
	{
		
		$id_usuario = $_GET['id'];
		
		$sqlSelect = mysqli_query($conexao,"SELECT * FROM usuario WHERE id_usuario = $id_usuario");
		
		if($sqlSelect->num_rows > 0)
		{
			while($userdata = mysqli_fetch_assoc($sqlSelect))
			{
			
				$nome = $userdata['nome'];
				$email = $userdata['email'];
				$senha = $userdata['senha'];
				$perfil = $userdata['perfil'];
				
			}
		}
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
				<form class="needs-validation" novalidate action="saveEditUsuario.php" method="POST" >
					<div class="row">
						<div class="col-md-1 mb-3">
							<label for="codigo">Código</label>
							<input type="text" class="form-control" name= "codigo" id="codigo" placeholder="" value="<?php echo $id_usuario ?>" required readonly>
							
						</div>
						<div class="col-md-6 mb-3">
							<label for="Nome">Nome</label>
							<input type="text" class="form-control" name= "nome" id="nome" placeholder="" value="<?php echo $nome ?>" required readonly>
							<div class="invalid-feedback">
								Valid last name is required.
							</div>
						</div>
						<div class="col-md-5 mb-3">
							<label for="email">E-mail</label>
							<input type="text" class="form-control" name= "email" id="email" placeholder="" value="<?php echo $email ?>" required readonly>
							<div class="invalid-feedback">
								Valid last name is required.
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="senha">Senha</label>
							<input type="password" class="form-control" name= "senha" id="senha" placeholder="" value="<?php echo $senha ?>" required>
							<div class="invalid-feedback">
								Valid last name is required.
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="perfil">Perfil</label>
							<input type="text" class="form-control" name= "perfil" id="perfil" placeholder="" value="<?php echo $perfil ?>" required readonly>
							
						</div>
						
					</div>
					
					<hr class="mb-2">
					<input type="hidden" name="id_usuario" value="<?php echo $id_usuario?>">
					<input class="btn btn-primary btn-lg btn-block" type="submit" name="update" id="update" value="Salvar Alterações">	
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
												