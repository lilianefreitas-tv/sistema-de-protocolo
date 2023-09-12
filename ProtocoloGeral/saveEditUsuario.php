<?php
	require 'src/config.php';
	
	if(isset($_POST['update']))
	{
		$id_usuario = $_POST['id_usuario'];
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$perfil = $_POST['perfil'];
		
		$sqlUpdate = "UPDATE usuario SET  nome='$nome', email='$email', senha= '$senha', perfil= '$perfil' where id_usuario = '$id_usuario'";
		
		$consulta = $conexao->query($sqlUpdate);
		
	}
	header('Location: ConsultaUsuario.php');
?>
