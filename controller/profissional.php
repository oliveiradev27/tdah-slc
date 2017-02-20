<?php 
	
	require_once("../dao/ProfissionalDao.php");
    require_once("../dao/EnderecoDao.php");
	require_once("../dao/RegistroDao.php");
	require_once("../dao/ContatoProfissionalDao.php");
	require_once("../model/ContatoProfissional.php");
    require_once("../model/Profissional.php");
	require_once("../model/Endereco.php");
	require_once("../model/Registro.php");


	if(isset($_POST['nome']))
	{
		$registro = new Registro();
		$registro->setTipo(trim($_POST['cat_registro']));
		$registro->setNumero(trim($_POST['registro']));
		$registroDao = new registroDao();
		$registro->setRegistroId($registroDao->inserir($registro));

		$endereco = new Endereco();
		$endereco->setLogradouro(trim($_POST['logradouro']));
		$endereco->setCep(trim($_POST['cep']));
		$endereco->setBairro(trim($_POST['bairro']));
		$endereco->setComplemento(trim($_POST['complemento']));
		$endereco->setUf(trim($_POST['uf']));
		$endereco->setCidade(trim($_POST['cidade']));
		$endereco->setNumero(trim($_POST['numero']));
		$enderecoDao= new EnderecoDao();
		$endereco->setEnderecoId($enderecoDao->inserir($endereco));

		$profissional = new Profissional();
		$profissional->setEmpresaId($_POST['empresa_id']);
		$profissional->setNome(trim($_POST['nome']));
		$profissional->setCpf(trim($_POST['documento']));
		$profissional->setEmail(trim($_POST['email']));
		$profissional->setEnderecoId($endereco->getEnderecoId());
		$profissional->setRegistroId($registro->getRegistroId());
		$profissional->setDataNascimento(trim($_POST['data_nascimento']));

		$profissionalDao = new ProfissionalDao();
		$profissional->setId($profissionalDao->inserir($profissional));

		$contatos = json_decode($_POST['telefones']);
		foreach($contatos as $c)
		{
			$contato = new ContatoProfissional();
			$contato->setTipo($c[0]);
			$contato->setValor($c[1]); 
			$contato->setProfissionalId($profissional->getId());

			$contatoProfissionalDao = new ContatoProfissionalDao();
			
		}
		$id = $profissional->getId();
		//header("location: ../tmp/profissional.php?id=");
		header("location: ../tmp/profissional.php?id=$id&novo=1");

	} else if(isset($_GET['cpf'])) {
		$cpf = trim($_GET['cpf']);
		$profissionalDao = new ProfissionalDao();
		if($profissionalDao->buscarCPF($cpf))
			echo json_encode(true);
		else
			echo json_encode(false);
	}


 ?>