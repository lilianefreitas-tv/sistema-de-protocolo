<?php
	require_once "home.php";
	require_once "src/config.php";
	
	if (!empty($_GET['id']))
	{
		
		$id_protocolo = $_GET['id'];
		$sqlSelect = "SELECT * FROM protocolo where id_protocolo = $id_protocolo";
		$result = $conexao->query($sqlSelect);
	
		if($result->num_rows > 0){
			
			while($userdata = mysqli_fetch_assoc($result))
				
			{
				
				$id_protocolo = $userdata['id_protocolo'];
				//$data = date('d/m/Y',strtotime ($userdata['data']));
				$data = $userdata['data'];
				$hora = $userdata['hora'];
				$documento = $userdata['documento'];
				$interessado = $userdata['interessado'];
				$cargo = $userdata['cargo'];
				$orgao = $userdata['orgao'];
				$encaminhamento = $userdata['encaminhamento'];
				$resumo= $userdata['resumo'];
				$obs = $userdata['obs'];
				$anexo =  $userdata['anexo'];
				$protocolista = $userdata['protocolista'];
				$emailinteressado = $userdata['emailinteressado'];
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
				<h2>Protocolo Geral</h2>
			</div>
		</div>
        <div class=" container col-md-6 order-md-1">
			<div class="py-3 text-left">
				<form class="needs-validation" novalidate action="saveEditProtocolo.php" method="POST" enctype="multipart/form-data" >
					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="protocolo">Nº de Protocolo</label>
							<input type="text" class="form-control" name="protocolo" id="protocolo" placeholder="" value="<?php echo $id_protocolo;?>"  readonly>
							<div class="invalid-feedback">
								Valid first name is required.
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="data">Data de entrada</label>
							<input type="text" class="form-control" name="data" id="data"  value="<?php echo $data;  ?>" readonly >
							<div class="invalid-feedback">
								Valid last name is required.
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="hora">Hora</label>
							<input type="text" class="form-control" name="hora" id="hora" value="<?php echo $hora ?>" readonly >
							<div class="invalid-feedback">
								Valid last name is required.
							</div>
						</div>
					</div>
					
					<div class="mb-3">
						<label for="documento">Documento</label>
						<div class="input-group">
							<input type="text" class="form-control" id="documento" name="documento" value="<?php echo $documento ?>" >
							<div class="invalid-feedback" style="width: 100%;">
								
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="interessado">Interessado</label>
							<input type="text" class="form-control" id="interessado" name="interessado" placeholder="" value="<?php echo $interessado?>" >
							<div class="invalid-feedback">
								
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="cargo">Cargo</label>
							<input type="text" class="form-control" id="cargo" placeholder="" name="cargo" value="<?php echo $cargo?>" >
							<div class="invalid-feedback">
								
							</div>
						</div>
						<div class="col-md-2 mb-3">
							<label for="orgao">Órgão</label>
							<input type="text" class="form-control" id="orgao" placeholder=""  name="orgao"  value="<?php echo $orgao?>">
							<div class="invalid-feedback">
								
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="emailinteressado">E-mail Interessado</label>
							<input type="text" class="form-control" id="emailinteressado" name="emailinteressado" placeholder="" value="<?php echo $emailinteressado?>" >
							<div class="invalid-feedback">
								
							</div>
						</div>
						<div class="col-md-6 mb-3" >
							<label  for="encaminhamento">Ecaminhamento</label>
							
							<!--<input type="text" class="form-control" name= "encaminhamento" id="encaminhamento" placeholder="" value="<?php echo $encaminhamento ?>"  >-->
							<select class="form-control" required name="encaminhamento" id="encaminhamento">
							<option><?php echo $encaminhamento ?></option>
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
						<textarea type="text" class="form-control" id="resumo" name="resumo" rows="3" value= ""> <?php  echo $resumo ?> </textarea>
					</div>
					<div class="row">
						<div class="col-md-4 mb-3">
							<label for="obs">Obs. <span class="text-muted">(Optional)</span></label>
							<input type="text" class="form-control" name="obs" id="obs" value="<?php  echo $obs?>">
						</div>
						
						<div class="col-md-4 mb-3">
							<label for="anexo">Anexo</label>
							<p> Arquivo Salvo:  <b><?php  echo $anexo ?></b> </p>
							<input type="file"  class="form-control-file" id="anexo" name="anexo" value="">
							
						</div>
						
						<div class="col-md-4 mb-3">
							<label for="protocolista">Protocolista</label>
							<input type="text"  class="form-control" id="protocolista" name="protocolista" value="<?php  echo $protocolista ?>" readonly>
						</div>
					</div>
					<hr class="mb-2">
					<input type="hidden" name="id_protocolo" value="<?php echo $id_protocolo?>">
					<input class="btn btn-primary btn-lg btn-block" type="submit" id="update" name="update" value="Salvar Alterações">
					
					
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
								