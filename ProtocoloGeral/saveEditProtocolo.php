<?php
	require 'src/config.php';
	
	
	if(isset($_POST['update']))
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
		
		
		$sqlUpdate = mysqli_query($conexao,"UPDATE protocolo SET  data='$data',anexo='$anexo', hora='$hora', documento= '$documento', interessado= '$interessado', cargo='$cargo', orgao='$orgao', encaminhamento='$encaminhamento', resumo='$resumo', obs='$obs', protocolista='$protocolista', emailinteressado='$emailinteressado'
		where id_protocolo = '$id_protocolo'");
		
		//$consulta = $conexao->query($sqlUpdate);
		
		
		header('Location: ConsultaProtocolo.php');
		
	}
	
?>
