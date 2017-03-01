<?php 
require_once('../config/Conexao.php');
require_once('RegistroDao.php');
require_once('EnderecoProfissionalDao.php');
class ProfissionalDao extends Conexao
{

	public function inserir($profissional)
	{
			//Configura variável de conexão
			$con   = $this->getConexao();
			$con->beginTransaction();
			//Prepara a query que realizará o insert
			$query = $con->prepare('INSERT INTO profissional
										(nome, cpf,email ,data_nascimento, registro_id, endereco_id)
									VALUES 
										(:nome, :cpf, :email, :data_nascimento, :registro_id, :endereco_id)');
			$query->bindValue(':nome', $profissional->getNome(), PDO::PARAM_STR);
			$query->bindValue(':cpf', $profissional->getCpf(), PDO::PARAM_STR);
			$query->bindValue(':email', $profissional->getEmail(), PDO::PARAM_STR);
			$query->bindValue(':data_nascimento', $profissional->getDataNascimento(), PDO::PARAM_STR);
			$query->bindValue(':endereco_id', $profissional->getEnderecoId(), PDO::PARAM_INT);
			$query->bindValue(':registro_id', $profissional->getRegistroId(), PDO::PARAM_INT);
			
			if($query->execute()){
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
			$query = $this->getConexao()->prepare('SELECT * 
												  FROM
												  		profissional
												 INNER JOIN
												 	   registro
												 ON
												 		profissional.registro_id = registro.registro_id
												 WHERE
												 		profissional.profissional_id = :id');
			$query->bindValue(':id', $id, PDO::PARAM_INT);									
			$query = $this->executar($query);

			$contatoProfissionalDao = new ContatoProfissionalDao();
			$profissional = $query->fetch();
			$profissional->contato  = $contatoProfissionalDao->getPorProfissional($profissional->profissional_id);
		    
			$enderecoProfissionalDao = new EnderecoProfissionalDao();
			$profissional->endereco = $enderecoProfissionalDao->getPorProfissional($profissional->endereco_id);
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
		   $query = $this->getConexao()->prepare('SELECT * 
												  FROM
												  		profissional
												  INNER JOIN
												  		endereco
												  ON
												  		profissional.endereco_id = endereco.endereco_id
												 INNER JOIN
												 	   registro
												 ON
												 		profissional.registro_id = registro.registro_id
												 INNER JOIN
												 	 	contato_profissional
												 ON
												 		profissional.profissional_id = contato_profissional.profissional_id');
			$query = $this->executar($query);
			if($query)
				return $query->fetchAll();
	}

	public function alterar($profissional)
	{
			$con   = $this->getConexao();
			$con->beginTransaction();
			$query = $con->prepare('UPDATE
										 profissional
								   SET
										nome = :nome, cpf = :cpf, email = :email,data_nascimento = :data_nascimento)
								  WHERE
								  		profissional_id = :id');
			$query->bindValue(':id', $profissional->getId(), PDO::PARAM_INT);							  
			$query->bindValue(':nome', $profissional->getNome(), PDO::PARAM_STR);
			$query->bindValue(':cpf', $profissional->getCpf(), PDO::PARAM_STR);
			$query->bindValue(':email', $profissional->getEmail(), PDO::PARAM_STR);
			$query->bindValue(':data_nascimento', $profissional->getDataNascimento(), PDO::PARAM_STR);
			
			if($query->execute()){
				$con->commit();
				return true;
			}
			else {
				$con->rollback();
				return false;
			}
	}
}