<?php
	
	require "home.php";
    session_start();
    include_once('src/config.php');
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
	}
    $logado = $_SESSION['email'];
    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM usuario WHERE id_usuario LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' ";
	}
    else
    {
        $sql = "SELECT * FROM usuario ORDER BY id_usuario DESC";
	}
    $result = $conexao->query($sql);
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
		<style>
			.box-search{
            display: flex;
            justify-content: center;
            gap: .1%;
			}
			
		</style>
	</head>
	
	<body >
		<br> <br>
		<h3 align="center">Consulta de Usuários Cadastrados</h3>
		
		<div class=" container col-md-11 order-md-1">
			<div class="box-search">
				<input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
				<button onclick="searchData()" class="btn btn-primary">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
						<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
					</svg>
				</button>
			</div>
			<br>					
			<table class="table table-bordered">
				<thead>
					<tr>
						<th scope="col" class="col-1">Código</th>
						<th scope="col" class="col-2">Nome</th>
						<th scope="col" class="col-2">Email</th>
						<th scope="col" class="col-1">Perfil</th>
						<th scope="col" class="col-1">Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php
						while($user_data = mysqli_fetch_assoc($result)) {
							
							echo "<tr>";
							echo "<td>".$user_data['id_usuario']."</td>";
							echo "<td>".$user_data['nome']."</td>";
							echo "<td>".$user_data['email']."</td>";
							echo "<td>".$user_data['perfil']."</td>";
							echo "<td>
							
							<a class='btn btn-sm btn-primary' href='editUsuario.php?id=$user_data[id_usuario]' title='Editar'>
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
							<path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                            </svg>
                            </a> 
                            <a class='btn btn-sm btn-danger' href='deleteUsuario.php?id=$user_data[id_usuario]' title='Deletar'>
							<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
							<path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
							</svg>
                            </a>
                            </td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
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
	<script>
		var search = document.getElementById('pesquisar');
		
		search.addEventListener("keydown", function(event) {
			if (event.key === "Enter") 
			{
				searchData();
			}
		});
		
		function searchData()
		{
			window.location = 'ConsultaUsuario.php?search='+search.value;
		}
	</script>
	
	
</html>
