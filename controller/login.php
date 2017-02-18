<?php 

	require_once('../dao/LoginDao.php');
	if(isset($_POST['login']) && isset($_POST['password']))
	{
		$login = (string) trim($_POST['login']);
		$senha = (string) trim($_POST['password']);
		$loginDao = new LoginDao();
		session_start();
		$_SESSION['usuario'] = $loginDao->logar($login, $senha);
		if($_SESSION['usuario'] && $_SESSION['usuario'] != "")
		{
			$_SESSION['nome']    = $_SESSION['usuario']->nome;
			print_r($_SESSION['usuario']);
			echo json_encode(true);
		}
		else
		{
			echo json_encode(false);	
		}
			
	} else if(isset($_GET['logout']))
	{
		$loginDao = new LoginDao();
		if($loginDao->logout())
		{
			session_unset();
			if(isset($_SESSION['usuario']))			
				echo json_encode(false);
			else
				echo json_encode(true);
		}else{
			echo json_encode(true);
		}
	}

 ?>