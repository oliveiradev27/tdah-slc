<?php 
	function __autoload( $classe )
	{
		if(file_exists('../model/'.$classe.'.php'))
			include('../model/'.$classe.'.php');
		if(file_exists('../dao/'.$classe.'.php'))
			include('../dao/'.$classe.'.php');
	}

	if(isset($_POST['empresa']) && isset($_POST['numeroDocumento']))
	{
		$registro = new Registro();
		$registro->setTipo(trim($_POST['documento']));
		$registro->setNumero(trim($_POST['numeroDocumento']));
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

		$empresa = new Empresa();
		$empresa->setEmpresa(trim($_POST['empresa']));
		$empresa->setDataRegistro(trim($_POST['dataRegistro']));
		$empresa->setRegistro($registro->getRegistroId());
		$empresa->setEndereco($endereco->getEnderecoId());
		$empresaDao = new EmpresaDao();
		$empresa->setEmpresaId($empresaDao->inserir($empresa));
		if($empresa->getEmpresaId())
			echo json_encode($empresa->getEmpresaId());
		else
			echo json_encode(false);
	}else{
		echo json_encode(false);
	}


 ?>