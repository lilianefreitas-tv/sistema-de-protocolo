<?php
	require "src/config.php";
	
	if(!empty($_GET['id']))
	{
		$id_usuario = $_GET['id'];
		
		$sqlSelect = mysqli_query($conexao,"SELECT * FROM usuario WHERE id_usuario = $id_usuario");
		
		
		if($sqlSelect->num_rows > 0)
		{
			$sqlDelete = mysqli_query($conexao,"DELETE FROM usuario WHERE id_usuario = $id_usuario");
			
		}
		
	}
	
	header('Location: ConsultaUsuario.php');
	
?>