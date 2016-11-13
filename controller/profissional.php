<?php 
	
	require_once("../dao/ProfissionalDao.php");
	if(isset($_POST['profissional']))
	{
		$dados = ["nome"	 => $_POST['profissional']->nome,
				  "registro" => $_POST['registro'],
				  "endereco" => $_POST['endereco'],
				  "email"    => $_POST['profissional']->email,
				 ];

		$profissionalDao = new ProfissionalDao();
		$query 			 = $profissionalDao->getConexao();
		$query->prepare("INSERT registro (tipo, numero) VALUES (:tipo, :numero)");
		$query->bindValue(":tipo", $dados['registro']->tipo, PDO::PARAM_STR);
		$query->bindValue(":numero", $dados['numero']->numero, PDO::PARAM_STR);
		if($query->executar())
		{
			$query->prepare('SELECT * FROM registro ORDER BY registro_id DESC LIMIT 1');
			$dados['registro_id'] = $query->executar()->fetch()->registro_id;
		}
		$query->prepare("INSERT
							 endereco (logradouro, cep, uf, cidade, complemento)
						 VALUES 
						 	(:logradouro, :cep, :uf, :cidade, :complemento)");
		$query->bindValue(":logradouro", trim($dados['endereco']->logradouro), PDO::PARAM_STR);
		$query->bindValue(":cep", trim($dados['endereco']->cep), PDO::PARAM_STR);
		$query->bindValue(":uf", trim($dados['endereco']->uf), PDO::PARAM_STR);
		$query->bindValue(":cidade", trim($dados['endereco']->cidade), PDO::PARAM_STR);
		$query->bindValue(":complemento", trim($dados['endereco']->complemento), PDO::PARAM_STR);
		if($query->executar())
		{
			$query->prepare('SELECT * FROM endereco ORDER BY endereco_id DESC LIMIT 1');
			$dados['endereco_id'] = $query->executar()->fetch()->endereco_id;
		} else {
			return false;
		}
		/*
		$query->prepare("INSERT
							 login (login, senha, permissao, chave)
						 VALUES 
						 	(:login, :senha, :permissao, :chave)");
		$query->bindValue(":login", trim($dados['login']->login), PDO::PARAM_STR);
		$query->bindValue(":senha", trim($dados['login']->senha), PDO::PARAM_STR);
		$query->bindValue(":permissao", trim($dados['login']->permissao), PDO::PARAM_STR);
		$query->bindValue(":chave", trim($dados['login']->chave), PDO::PARAM_STR);
	    if($query->executar())
		{
			$query->prepare('SELECT * FROM login ORDER BY login_id DESC LIMIT 1');
			$dados['login_id'] = $query->executar()->fetch()->login_id;
		}else{
			return false;
		}*/
		$query->prepare('INSERT 
							profissional (nome, email, endereco_id, registro_id)
						VALUES
							(:nome, :email, :endereco_id, :login_id, :registro_id )');
		$query->bindValue(":nome", trim($dados['profissional']->nome), PDO::PARAM_STR);
		$query->bindValue(":email", trim($dados['profissional']->email), PDO::PARAM_STR);
		$query->bindValue(":endereco_id", trim($dados['endereco_id']), PDO::PARAM_INT);
		$query->bindValue(":registro_id", trim($dados['registro_id']), PDO::PARAM_INT);

		if($query->executar())
		{
			$query->prepare('SELECT * FROM login ORDER BY login_id DESC LIMIT 1');
			$dados['login_id'] = $query->executar()->fetch()->login_id;
		} else {
			return false;
		}
	}


 ?>