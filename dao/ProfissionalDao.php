<?php 
require_once('../config/Conexao.php');
require_once('RegistroDao.php');
require_once('EnderecoDao.php');
class ProfissionalDao extends Conexao
{

	public function inserir($profissional)
	{
			//Configura variável de conexão
			$con   = $this->getConexao();
			$con->beginTransaction();
			//Prepara a query que realizará o insert
			$query = $con->prepare('INSERT INTO profissional
										(nome, cpf,email ,data_nascimento, registro_id, endereco_id, empresa_id)
									VALUES 
										(:nome, :cpf, :email, :data_nascimento, :registro_id, :endereco_id, :empresa_id)');
			$query->bindValue(':nome', $profissional->getNome(), PDO::PARAM_STR);
			$query->bindValue(':cpf', $profissional->getCpf(), PDO::PARAM_STR);
			$query->bindValue(':email', $profissional->getEmail(), PDO::PARAM_STR);
			$query->bindValue(':data_nascimento', $profissional->getDataNascimento(), PDO::PARAM_STR);
			$query->bindValue(':endereco_id', $profissional->getEnderecoId(), PDO::PARAM_INT);
			$query->bindValue(':registro_id', $profissional->getRegistroId(), PDO::PARAM_INT);
			$query->bindValue(':empresa_id', $profissional->getEmpresaId(), PDO::PARAM_INT);
			if ($query->execute()){
				$con->commit();
				return $this->getUltimoInserido();
			}
			else {
				$con->rollback();
				return false;
			}
	}

	//Função encarregada de retornar os registros
	public function listar($id = null)
	{
		//Verifica se o id foi preenchido, pois caso esteja ele irá retornar apenas o registro correspondente ao id
		if($id)
		{
			$con 	= getConexao();
			$query 	= $con->prepare('SELECT * from profissional WHERE profissional_id : id');
			$query->bindValue(':id', (int) $id, PDO::PARAM_INT);
			if($query->execute())
			{
				$resultado = $query->fetch();
			}else {
				return false;
			}
		} else {
			$resultado = $this->listarTodos();
		}

		$query = null;
		return $resultado;
	}

	public function listarTodos()
	{
	
		$query 	= getConexao()->prepare('SELECT * from profissional');
			if($query->executar())
				$resultado = $query->fetchAll();
			else 
				return false;
	}

	public function excluir( $id = null)
	{
		if(!$id)
		{
			return false;
		} else {
			$id = (int) $id;
			//Abre a transação
			$query = getConexao()->beginTransaction();
			$query->prepare('DELETE profissional WHERE profissional_id :id');
			$query->bindValue(':id', $id, PDO::PARAM_INT);
			if($query->executar())
			{
				//Se for executado com sucesso a transação é comitada
				$query->commit();
				$query = null;
				return true;
			} else {
				//Se ocorrer algum erro a operação é desfeita
				$query->rollback();
				$query = null;
				return false;
			}
		}
	}

	public function getUltimoInserido()
	{
		$query = $this->getConexao()->prepare('SELECT profissional_id FROM profissional ORDER BY profissional_id DESC LIMIT 1');
		$query = $this->executar($query);
		if($query)
			return $query->fetch()->profissional_id;
		else
			return false;
	}

	public function buscarCPF($cpf){
		$query = $this->getConexao()->prepare('SELECT
													 profissional_id 
											   FROM 
													 profissional 
											   WHERE
											   		cpf = :cpf');
		$query->bindValue(':cpf', $cpf, PDO::PARAM_STR);											   
		$query = $this->executar($query);
		if($query)
			return $query->fetch();
		else
			return false;
	}

	public function get( $id  = null)
	{
		if($id)
		{
			$con    = $this->getConexao(); 	
			$query 	= $con->prepare('SELECT
											profissional_id,
											nome,
											endereco_id AS endereco,
											profissional.registro_id AS registro,
											login_id AS login,
											email,
											cpf,
											data_nascimento,
											empresa_id
									 FROM
									  		profissional
									 WHERE
									 		profissional.profissional_id = :id');
			$query->bindValue(':id', $id, PDO::PARAM_INT);									
			$query = $this->executar($query);
			$profissional = $query->fetch();
			$enderecoDao = new EnderecoDao();
			$profissional->endereco = $enderecoDao->get($profissional->endereco);
			$registroDao = new RegistroDao();
			$profissional->registro = $registroDao->get($profissional->registro);
			if($query)
				return $profissional;
			else
			 	false;
		} else {
			return $this->getAll();
		}
	}

	public function getAll()
	{
			$query = $this->getConexao()->prepare('SELECT
														profissional_id,
														nome,
														endereco_id AS endereco,
														registro_id AS registro,
														login_id AS login,
														email,
														cpf,
														data_nascimeto,
														empresa_id
												  FROM
												  		profissional
												 LEFT JOIN
												 	   registro
												 ON
												 		profissional.registro_id = registro.registro_id');
			$query = $this->executar($query);

			$contatoProfissionalDao = new ContatoProfissionalDao();
			$enderecoProfissionalDao = new EnderecoDao();

			$profissionais = $query->fetchAll();

			$i = 0;
			foreach ($profissionais as $profissional) {
				$profissional->contato  = $contatoProfissionalDao->getPorProfissional($profissional->profissional_id);
				$profissional->endereco = $enderecoProfissionalDao->get($profissional->endereco);

				$profissionais[$i] = $profissional;
				$i++;
			}

			if($query)
				return $profissionais;
			else
			 	false;
	}

	public function alterar(Profissional $profissional)
	{
			$con   = $this->getConexao();
			$con->beginTransaction();
			$query = $con->prepare('UPDATE
										 profissional
								   SET
										nome = :nome, cpf = :cpf, email = :email, data_nascimento = :data_nascimento, empresa_id = :empresa_id
								  WHERE
								  		profissional_id = :id');
			$query->bindValue(':id', $profissional->getId(), PDO::PARAM_INT);							  
			$query->bindValue(':nome', $profissional->getNome(), PDO::PARAM_STR);
			$query->bindValue(':cpf', $profissional->getCpf(), PDO::PARAM_STR);
			$query->bindValue(':email', $profissional->getEmail(), PDO::PARAM_STR);
			$query->bindValue(':data_nascimento', $profissional->getDataNascimento(), PDO::PARAM_STR);
			$query->bindValue(':empresa_id', $profissional->getEmpresaId(), PDO::PARAM_INT);							  

			if($this->executar($query)){
				$con->commit();
				return true;
			}
			else {
				$con->rollback();
				return false;
			}
	}

	public function alterarLogin($login, $profissional_id)
	{
		if(is_object($login))
			$login = $login->getId();
			$con   = $this->getConexao();
			$con->beginTransaction();
			$query = $con->prepare('UPDATE
										profissional
								   SET
										login_id = :login_id
								  WHERE
								  		profissional_id = :id');
			$query->bindValue(':id', $profissional_id, PDO::PARAM_INT);							  
			$query->bindValue(':login_id', $login, PDO::PARAM_INT);
			
			if($query->execute()){
				$con->commit();
				return true;
			}
			else {
				$con->rollback();
				return false;
			}
		
	}

	 public function getBasico($id = null)
	 {
		 if($id)
		 {
			 $query = $this->getConexao()->prepare('SELECT
														 profissional.profissional_id, profissional.nome, registro.tipo ,registro.numero
											   		FROM
											   			 profissional
											   		INNER JOIN
											   			registro
											  		ON
											   			profissional.registro_id = registro.registro_id
											 		WHERE
											   			profissional_id = :id');
			$query->bindValue(':id', $id, PDO::PARAM_INT);										   
			return $this->executar($query)->fetch();

		 } else {
			 return $this->getAllBasico();
		 }

	 }

	 public function getAllBasico()
	 {
		$query = $this->getConexao()->prepare('SELECT
												   profissional.profissional_id, profissional.nome, registro.tipo ,registro.numero
											   	FROM
											   	   profissional
											    INNER JOIN
											   		registro
											  	ON
											   		profissional.registro_id = registro.registro_id');

			return $this->executar($query)->fetchAll();
	 }
}