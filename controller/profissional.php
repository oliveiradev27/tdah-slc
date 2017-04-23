<?php 

	require_once("../dao/ProfissionalDao.php");
    require_once("../dao/EnderecoDao.php");
	require_once("../dao/RegistroDao.php");
	require_once("../dao/ContatoProfissionalDao.php");
	require_once("../model/ContatoProfissional.php");
    require_once("../model/Profissional.php");
	require_once("../model/Endereco.php");
	require_once("../model/Registro.php");

	if (isset($_POST['nome']) && !isset($_POST['profissional_id'])) 
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
		$profissional->setCpf(trim($_POST['cpf']));
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
		if ($id)
			echo json_encode($id);
		else
			echo json_encode(false);

	} else if (isset($_POST['profissional_id']) && $_POST['profissional_id'] != 0)
	{
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

		if (!$enderecoDao->alterar($endereco)){
			json_encode(false);
			return;
		}

		$registro = new Registro();
		$registro->setRegistroId(trim($_POST['registro_id']));
		$registro->setTipo(trim($_POST['cat_registro']));
		$registro->setNumero(trim($_POST['registro']));
		$registroDao = new registroDao();
		if (!$registroDao->alterar($registro)){
			json_encode(false);	
			return;
		}

		$contatoProfissionalDao = new ContatoProfissionalDao();
		$contatosExistentes		= $contatoProfissionalDao->getPorProfissional($_POST['profissional_id']);
		$contatosNovos 			= json_decode($_POST['telefones']);
		$numeroDeContatos 		= count($contatosExistentes);
		for ($i = 0; $i < $numeroDeContatos ; $i++){
			if ($contatosNovos[$i][0] == $contatosExistentes[$i]->tipo && $contatosNovos[$i][1] == $contatosExistentes[$i]->valor){
				unset($contatosExistentes[$i]);
				unset($contatosNovos[$i]);
				continue;
			}

			if ($contatosNovos[$i][1] == ""){
				unset($contatosNovos[$i]);
				continue;
			}

			$contato = new ContatoProfissional();
			$contato->setId($contatosExistentes[$i]->contato_id);
			$contato->setTipo($contatosNovos[$i][0]);
			$contato->setValor($contatosNovos[$i][1]); 
			if (!$contatoProfissionalDao->alterar($contato)) {
				echo json_encode(false);
				return;
			} else {
				unset($contatosExistentes[$i]);
				unset($contatosNovos[$i]);
			}
		}

		if (count($contatosExistentes) > 0){
			$contatosExistentes = array_values($contatosExistentes);
			if(!$contatoProfissionalDao->excluir($contatosExistentes[0]->contato_id))
				echo json_encode(false);
				return;
		}

		if (count($contatosNovos) > 0){
			$contatosNovos = array_values($contatosNovos);
			if ($contatosNovos[0][1] != ""){
				$contato = new ContatoProfissional();
				$contato->setTipo($contatosNovos[0][0]);
				$contato->setValor($contatosNovos[0][1]); 
				$contato->setProfissionalId($_POST['profissional_id']);
	
				if (!$contatoProfissionalDao->inserir($contato)){
					json_encode(false);
					return;
				}
			}
		}	
	
		$profissional = new Profissional();
		$profissional->setId($_POST['profissional_id']);
		$profissional->setNome(trim($_POST['nome']));
		$profissional->setDataNascimento(trim($_POST['data_nascimento']));
		$profissional->setCpf(trim($_POST['cpf']));
		$profissional->setEmail(trim($_POST['email']));
		$profissional->setEmpresaId($_POST['empresa_id']);

		$profissionalDao = new ProfissionalDao();
		if($profissionalDao->alterar($profissional))
			echo json_encode(true);
	   else
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
	} else {
		echo json_encode(false);
	}