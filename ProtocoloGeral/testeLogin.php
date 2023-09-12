<?php
    session_start();
	if (isset ($_POST['submit'])&& !empty($_POST['email']) && !empty($_POST['senha']))
	{
		require "src/config.php";
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		
		
		$sql = "SELECT *FROM usuario WHERE email = '$email' and senha = '$senha'";
		
		$result = $conexao->query($sql);
		print_r($result);
		
		
		if (mysqli_num_rows($result)<1)
		{
			unset($_SESSION['email']);
			unset($_SESSION['senha']);
			header ('Location: login.php');
			
		}
		else
		{
			$_SESSION['email'] = $email;
			$_SESSION['senha'] = $senha;
			header ('Location: home.php');
		}
	}
	else
	{
		header('Location: login.php');
	}
	
?>
