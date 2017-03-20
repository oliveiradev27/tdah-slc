<?php 
	
	require_once("../dao/ProfissionalDao.php");
    require_once("../dao/EnderecoDao.php");
	require_once("../dao/RegistroDao.php");
	require_once("../dao/ContatoProfissionalDao.php");
	require_once("../model/ContatoProfissional.php");
    require_once("../model/Profissional.php");
	require_once("../model/Endereco.php");
	require_once("../model/Registro.php");


	if(isset($_POST['nome']) && empty($_POST['profissional_id']))
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
			$contatoProfissionalDao->inserir($contato);
		}
		$id = $profissional->getId();
		header("location: ../tmp/profissional.php?id=$id");

	} else if(isset($_POST['profissional_id']) && $_POST['profissional_id'] != 0) {

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
		$enderecoDao->alterar($endereco);

		$registro = new Registro();
		$registro->setRegistroId(trim($_POST['registro_id']));
		$registro->setTipo(trim($_POST['cat_registro']));
		$registro->setNumero(trim($_POST['registro']));
		$registroDao = new registroDao();
		$registroDao->alterar($registro);	

		$contatos = json_decode($_POST['telefones']);
		foreach($contatos as $c)
		{
			$contato = new ContatoProfissional();
			$contato->setId($c->contato_id);
			$contato->setTipo($c->tipo);
			$contato->setValor($c->valor);

			$contatoProfissionalDao = new ContatoProfissionalDao();
			$contatoProfissionalDao->alterar($contato);
		}		
	
		$profissional = new Profissional();
		$profissional->setId($_POST['profissional_id']);
		$profissional->setNome(trim($_POST['nome']));
		$profissional->setDataNascimento(trim($_POST['data_nascimento']));
		$profissional->setCpf(trim($_POST['documento']));
		$profissional->setEmail(trim($_POST['email']));

		$profissionalDao = new ProfissionalDao();
		if($profissionalDao->alterar($profissional)){
			//echo json_encode(true);
			$id = $profissional->getId();
			header("location: ../tmp/profissional.php?id=$id");
	  } else
			echo json_encode(false);
		
	} else if(isset($_GET['cpf'])) {
		$cpf = trim($_GET['cpf']);
		$profissionalDao = new ProfissionalDao();
		if($profissionalDao->buscarCPF($cpf))
			echo json_encode(true);
		else
			echo json_encode(false);
	} else if(isset($_GET['id']) ) {
		$id = $_GET['id'];
		$profissionalDao = new ProfissionalDao();
		if(isset($_GET['single']) && $_GET['single']){
			echo json_encode($profissionalDao->getBasico($id));			
		} else {
			echo json_encode($profissionalDao->get($id));
		}
	}


 ?>