<?php 

	require_once("../dao/ResponsavelDao.php");
    require_once("../dao/EnderecoDao.php");
	require_once("../dao/ContatoResponsavelDao.php");
	require_once("../model/ContatoResponsavel.php");
    require_once("../model/Responsavel.php");
	require_once("../model/Endereco.php");

	if(isset($_POST['nome']) && !$_POST['responsavel_id'])
	{
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

		$responsavel = new Responsavel();
		$responsavel->setNome($_POST['nome']);
		$responsavel->setCpf($_POST['cpf']);
		$responsavel->setEmail($_POST['email']);
		$responsavel->setDataNascimento($_POST['data']);
		$responsavel->setEndereco($endereco->getEnderecoId());
		$responsavelDao = new ResponsavelDao();
		$responsavel->setId($responsavelDao->inserir($responsavel));

		$contatos = json_decode($_POST['telefones']);
		foreach($contatos as $c)
		{
			if($c[1] != ""){
				$contato = new ContatoResponsavel();
				$contato->setTipo($c[0]);
				$contato->setValor($c[1]); 
				$contato->setResponsavelId($responsavel->getId());
	
				$contatoResponsavelDao = new ContatoResponsavelDao();
				$contatoResponsavelDao->inserir($contato);
			}
		}

		if($responsavel->getId())
			echo json_encode($responsavel->getId());
		else
			echo json_encode(false);

	} else if(isset($_POST['responsavel_id'])) {

	} else if(isset($_GET['cpf'])) {
		$cpf = trim($_GET['cpf']);
		$responsavelDao = new ResponsavelDao();
		if($responsavelDao->buscarCPF($cpf))
			echo json_encode(true);
		else
			echo json_encode(false);
	}

 ?>