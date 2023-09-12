<?php
	require "home.php";
	require "src/config.php";
	
if (isset($_POST['submit']))
	{
		
		if (isset($_FILES['anexo'])){
			$arquivo = $_FILES['anexo'];
			$novo_nome = $arquivo['name'];
			$diretorio = "upload/";
			
			move_uploaded_file($_FILES['anexo']['tmp_name'],$diretorio.$novo_nome);
			
		}
		$id_protocolo = $_POST['id_protocolo'];
		$data = $_POST['data'];
		$hora = $_POST['hora'];
		$documento = $_POST['documento'];
		$interessado = $_POST['interessado'];
		$cargo = $_POST['cargo'];
		$orgao = $_POST['orgao'];
		$encaminhamento = $_POST['encaminhamento'];
		$resumo= $_POST['resumo'];
		$obs = $_POST['obs'];
		$anexo = $novo_nome;
		$protocolista = $_POST['protocolista'];
		$emailinteressado = $_POST['emailinteressado'];
		
		$result = mysqli_query($conexao, "INSERT INTO protocolo (id_protocolo,data, hora, documento, interessado,cargo,orgao,encaminhamento,resumo,obs,anexo,protocolista,emailinteressado ) VALUES (null,'{$data}','{$hora}','{$documento}','{$interessado}','{$cargo}','{$orgao}','{$encaminhamento}','{$resumo}','{$obs}','{$anexo}','{$protocolista}','{$emailinteressado}')");		
		
		}
		
		
	
?>

<!doctype html>
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
				<h2>Protocolo Geral</h2>
			</div>
		</div>
        <div class=" container col-md-6 order-md-1">
			<div class="py-3 text-left">
				<form class="needs-validation" novalidate action="protocolo.php" method="POST" enctype="multipart/form-data" >
					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="protocolo">Número de Protocolo</label>
							<input type="text" class="form-control" name="protocolo" id="protocolo" placeholder="" value="" required readonly>
							<div class="invalid-feedback">
								Valid first name is required.
							</div>
						</div>
								
						<div class="col-md-4 mb-3">
							<label for="data">Data de entrada</label>
							<input type="date" class="form-control" name="data" id="data" placeholder="" value="" required>
							<div class="invalid-feedback">
								Campo Obrigatório.
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="hora">Hora</label>
							<input type="time" class="form-control" name="hora" id="hora" placeholder="" value="" required>
							<div class="invalid-feedback">
								Campo Obrigatório.
							</div>
							</div>
							</div>
							
							<div class="mb-3">
							<label for="documento">Documento</label>
							<div class="input-group">
							<input type="text" class="form-control" id="documento" name="documento" required>
							<div class="invalid-feedback" style="width: 100%;">
							Campo Obrigatório.
							</div>
							</div>
							</div>
							<div class="row">
							<div class="col-md-6 mb-3">
							<label for="interessado">Interessado</label>
							<input type="text" class="form-control" id="interessado" name="interessado" placeholder="" value="" required>
							<div class="invalid-feedback">
							Campo Obrigatório.
							</div>
							</div>
							<div class="col-md-4 mb-3">
							<label for="cargo">Cargo</label>
							<input type="text" class="form-control" id="cargo" placeholder="" name="cargo" value="" required>
							<div class="invalid-feedback">
							Campo Obrigatório.
							</div>
							</div>
							<div class="col-md-2 mb-3">
							<label for="orgao">Órgão</label>
							<input type="text" class="form-control" id="orgao" placeholder="" value="" name="orgao" required>
							<div class="invalid-feedback">
							Campo Obrigatório.
							</div>
							</div>
							</div>
							
							<div class="row">
							<div class="col-md-6 mb-3">
							<label for="emailinteressado">E-mail Interessado</label>
							<input type="text" class="form-control" id="emailinteressado" name="emailinteressado" placeholder="" value="" required>
							<div class="invalid-feedback">
							Campo Obrigatório.
							</div>
							</div>
							<div class="col-md-6 mb-3" >
							<label  for="encaminhamento" >Ecaminhamento</label>
							<select class="form-control" required name="encaminhamento" id="encaminhamento" >
							<option></option>
							<option>Coordenação</option>
							<option>PJ Criminal</option>
							<option>3ª PJ</option>
							<option>4ª PJ</option>
							<option>5ª PJ</option>
							<option>6ª PJ</option>
							<option>7ª PJ</option>
							</select>
							</div>
							</div>
							<div class="form-group">
							<label for="resumo">Resumo da demanda</label>
							<textarea class="form-control" id="resumo" name="resumo" rows="3" required></textarea>
							
							</div>
							<div class="row">
							<div class="col-md-4 mb-3">
							<label for="obs">Obs. <span class="text-muted">(Optional)</span></label>
							<input type="text" class="form-control" name="obs" id="obs">
							</div>
							
							<div class="col-md-4 mb-3" >
							<label for="anexo">Anexo</label>
							<input type="file" required class="form-control-file" id="anexo" name="anexo">
							
							</div>
							
							<div class="col-md-4 mb-3">
							<label for="protocolista">Protocolista</label>
							<input type="text" required class="form-control" id="protocolista" name="protocolista" required>
							
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
														