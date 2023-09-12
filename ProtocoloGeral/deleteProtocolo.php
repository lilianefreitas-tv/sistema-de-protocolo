<?php
	
	include "src/config.php";
	
	if(!empty($_GET['id']))
	{
		$id_protocolo = $_GET['id'];
		
		$sqlSelect = mysqli_query($conexao,"SELECT * FROM protocolo WHERE id_protocolo = $id_protocolo");
		
		
		if($sqlSelect->num_rows > 0)
		{
			$sqlDelete = mysqli_query($conexao,"DELETE FROM protocolo WHERE id_protocolo = $id_protocolo");
			
		}
		
	}
	header('Location: ConsultaProtocolo.php');
?>