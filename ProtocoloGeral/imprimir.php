<!doctype html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Protocolo Geral MPPA</title>
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
		
	<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		

	</head>
	<body>
		<br>
		<div id="impressao" class="seu-elemento">
			<div class="container col-sm-3"  data-target="#modalExemplo" name="modalExemplo" >
				<?php
					
					require_once "src/config.php";
					
					
					if (!empty($_GET['id']))
					{
						
						$id_protocolo = $_GET['id'];
						$sqlSelect = "SELECT * FROM protocolo where id_protocolo = $id_protocolo";
						$result = $conexao->query($sqlSelect);
						
						while($user_data = mysqli_fetch_assoc($result))
						{
							echo "
							<P><h6 align='center'><b> MINSTÉRIO PÚBLICO DO ESTADO DO PARÁ  <br>
							PROMOTORIA DE JUSTIÇA DE ALTAMIRA</b></h6>
							Data: ".date('d/m/Y',strtotime ($user_data['data']))." <br> 
							Nº de Protocolo: ".$user_data['id_protocolo'].'/'.date('Y',strtotime ($user_data['data']))."<br>
							Documento: ".$user_data['documento']."<BR>
							Interessado: ".$user_data['interessado']."<BR>
							Encaminhamento:".$user_data['encaminhamento']."</P>
							";
						}
					}
				?>
			</div>
		</div>
		
		<div align="center">
			<!--<hr class="mb-2">-->
			<button   type="button" class="btn btn-primary" id="btnPrint" > Imprimir </button>
		</div>
		
		<!-- JavaScript (Opcional) -->
		<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		
	 <script>
			const btnPrint=document.getElementById("btnPrint")
			
			btnPrint.addEventListener("click",(evt)=>{
			const conteudo = document.getElementById('impressao').innerHTML;
			
			let estilo = "<style>";
			
			estilo += "table {width: 100%; font: 15px Calibri;}";
			estilo += "table,th,td{border: solid 2px #888; border-collapse: collapse;";
			estilo += "padding: 4px 8px; text-align: center;}";
			estilo += "</style>";
			
			
			const win = window.open('','', 'height=700,width=700');
			
			
			win.document.write ('<html><head>');
			win.document.write ('<title>Impressão</title>');
			win.document.write (estilo);
			win.document.write ('</head>');
			win.document.write ('<body>');
			win.document.write (conteudo);
			win.document.write ('</body></html>');
			
			win.print();
			
			
			})
			
			
			</script>
		
		
		
		
	</body>
</html>




