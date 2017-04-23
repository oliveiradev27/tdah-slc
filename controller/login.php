<?php 
	require_once('../dao/LoginDao.php');
	require_once('../model/Login.php');

	if(isset($_POST['profissional_id']) && isset($_POST['login']) && isset($_POST['senha'])  && $_POST['permissao'])
	{
		$profissional_id = (int) $_POST['profissional_id'];
		$login = new Login();
		$login->setLogin(trim($_POST['login']));
		$login->setSenha(trim($_POST['senha']));
		$login->setPermissao(trim($_POST['permissao']));
		$login->setChave(trim($_POST['chave']));

		$loginDao = new loginDao();
		echo json_encode($loginDao->inserir($login, $profissional_id));

	} else if(isset($_POST['login']) && isset($_POST['password']))
	{
		$login = (string) trim($_POST['login']);
		$senha = (string) trim($_POST['password']);
		$loginDao = new LoginDao();
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