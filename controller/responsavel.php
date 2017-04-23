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

	} else if(isset($_POST['responsavel_id']) && $_POST['responsavel_id'] != "") 
	{
		$responsavelDao 	= new ResponsavelDao();

		$endereco = new Endereco();
		$endereco->setEnderecoId(trim($_POST['endereco_id']));
		$endereco->setLogradouro(trim($_POST['logradouro']));
		$endereco->setCep(trim($_POST['cep']));
		$endereco->setBairro(trim($_POST['bairro']));
		$endereco->setComplemento(trim($_POST['complemento']));
		$endereco->setUf(trim($_POST['uf']));
		$endereco->setCidade(trim($_POST['cidade']));
		$endereco->setNumero(trim($_POST['numero']));
		$enderecoDao= new EnderecoDao();
		if(!$enderecoDao->alterar($endereco))
		{
			echo json_encode(false);
			return;
		}

		$responsavel = new Responsavel();
		$responsavel->setId($_POST['responsavel_id']);
		$responsavel->setNome($_POST['nome']);
		$responsavel->setCpf($_POST['cpf']);
		$responsavel->setEmail($_POST['email']);
		$responsavel->setDataNascimento($_POST['data']);
		$responsavel->setEndereco($endereco->getEnderecoId());
		if(!$responsavelDao->alterar($responsavel))
		{
			echo json_encode(false);
			return;
		}

		$contatoResponsavelDao 	= new ContatoResponsavelDao();
		$contatosExistentes		= $contatoResponsavelDao->getPorResponsavel($responsavel->getId());
		$contatosNovos 			= json_decode($_POST['telefones']);
		$numeroDeContatos 		= count($contatosExistentes);
		for ($i = 0; $i < $numeroDeContatos ; $i++) {
			if ($contatosNovos[$i][0] == $contatosExistentes[$i]->tipo && $contatosNovos[$i][1] == $contatosExistentes[$i]->valor){
				unset($contatosExistentes[$i]);
				unset($contatosNovos[$i]);
				continue;
			}

			if ($contatosNovos[$i][1] == ""){
				unset($contatosNovos[$i]);
				continue;
			}

			$contato = new ContatoResponsavel();
			$contato->setId($contatosExistentes[$i]->contato_id);
			$contato->setTipo($contatosNovos[$i][0]);
			$contato->setValor($contatosNovos[$i][1]); 
			if (!$contatoResponsavelDao->alterar($contato)) {
				echo json_encode(false);
				return;
			} else {
				unset($contatosExistentes[$i]);
				unset($contatosNovos[$i]);
			}
		}

		if (count($contatosExistentes) > 0){
			$contatosExistentes = array_values($contatosExistentes);
			$contatoResponsavelDao->excluir($contatosExistentes[0]->contato_id);
		}

		if (count($contatosNovos) > 0){
			$contatosNovos = array_values($contatosNovos);
			if ($contatosNovos[0][1] != ""){
				$contato = new ContatoResponsavel();
				$contato->setTipo($contatosNovos[0][0]);
				$contato->setValor($contatosNovos[0][1]); 
				$contato->setResponsavelId($responsavel->getId());
	
				$contatoResponsavelDao->inserir($contato);
			}
		}

		echo json_encode(true);

	} else if (isset($_GET['cpf'])) {
		$cpf = trim($_GET['cpf']);
		$responsavelDao = new ResponsavelDao();
		if($responsavelDao->buscarCpf($cpf))
			echo json_encode(true);
		else
			echo json_encode(false);
	} else if (isset($_GET['email'])) {
		$email = trim($_GET['email']);
		$responsavelDao = new ResponsavelDao();
		if ($responsavelDao->buscarEmail($email))
			echo json_encode(true);
		else
			echo json_encode(false);
	} else if (isset($_GET['id'])){
		$responsavelDao = new ResponsavelDao();
		$responsavel 	= $responsavelDao->get($_GET['id']);
		echo json_encode($responsavel);
	} else if(isset($_GET['nome'])) {
		$responsavelDao = new ResponsavelDao();
		$responsavel 	= $responsavelDao->getAllSingle();
		echo json_encode($responsavel);
	}
 ?>