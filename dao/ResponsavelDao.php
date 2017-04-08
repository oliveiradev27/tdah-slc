<?php 

require_once('../config/Conexao.php');
require_once('../model/Responsavel.php');
require_once('../dao/EnderecoDao.php');

class ResponsavelDao extends Conexao
{
	public function inserir(Responsavel $responsavel)
	{
			$con   = $this->getConexao();
			$con->beginTransaction();
			$query = $con->prepare('INSERT INTO responsavel
										(nome, cpf,email ,data_nascimento,endereco_id)
									VALUES 
										(:nome, :cpf, :email, :data_nascimento, :endereco_id)');
			$query->bindValue(':nome', $responsavel->getNome(), PDO::PARAM_STR);
			$query->bindValue(':cpf', $responsavel->getCpf(), PDO::PARAM_STR);
			$query->bindValue(':email', $responsavel->getEmail(), PDO::PARAM_STR);
			$query->bindValue(':data_nascimento', $responsavel->getDataNascimento(), PDO::PARAM_STR);
			$query->bindValue(':endereco_id', $responsavel->getEndereco(), PDO::PARAM_INT);
			if($query->execute()){
				$con->commit();
				return $this->getUltimoInserido();
			}
			else {
				$con->rollback();
				return false;
			}
	}

	public function getUltimoInserido()
	{
		$query = $this->getConexao()->prepare('SELECT
													responsavel_id
											   	FROM 
											   	 	responsavel
											   	ORDER BY
											   		responsavel_id 
											   	DESC LIMIT 1');
		$query = $this->executar($query);
		if($query)
			return $query->fetch()->responsavel_id;
		else
			return false;
	}

	public function buscarCpf($cpf){
	
		$query = $this->getConexao()->prepare('SELECT
													 responsavel_id 
											   FROM 
													 responsavel 
											   WHERE
											   		cpf = :cpf');
		$query->bindValue(':cpf', $cpf, PDO::PARAM_STR);
		$query = $this->executar($query);
		if($query->fetch())
			return $query->fetch()->responsavel_id;
		else
			return false;
	}

	public function buscarEmail($email){
	
		$query = $this->getConexao()->prepare('SELECT
													 responsavel_id 
											   FROM 
													 responsavel 
											   WHERE
											   		email = :email');
		$query->bindValue(':email', $email, PDO::PARAM_STR);
		$query = $this->executar($query);
		if($query->fetch())
			return $query->fetch()->responsavel_id;
		else
			return false;
	}

	public function get( $id  = null)
	{
		if($id)
		{
			$query = $this->getConexao()->prepare('SELECT 
														responsavel_id, nome, cpf, email, data_nascimento, endereco_id AS endereco
												  FROM
												  		responsavel
												 WHERE
												 		responsavel_id = :id');
			$query->bindValue(':id', $id, PDO::PARAM_INT);									
			$query = $this->executar($query);
			$responsavel = $query->fetch();
			$enderecoDao = new EnderecoDao();
			$responsavel->endereco = $enderecoDao->get($responsavel->endereco);
			if($query)
				return $responsavel;
			else
			 	false;
		} else {
			return $this->getAll();
		}
	}

	public function getAll()
	{
			$query = $this->getConexao()->prepare('SELECT * FROM responsavel');
			$query = $this->executar($query);
			$responsavel = $query->fetch();
		    
			$enderecoDao = new EnderecoDao();
			$responsavel->endereco = $enderecoDao->get($responsavel->endereco_id);
			if($query)
				return $this->getAll();
			else
			 	false;
	}

	public function alterar(Responsavel $responsavel)
	{
			$con   = $this->getConexao();
			$con->beginTransaction();
			$query = $con->prepare('UPDATE
										 responsavel
								   SET
										nome = :nome, cpf = :cpf, email = :email, data_nascimento = :data_nascimento
								  WHERE
								  		responsavel_id = :id');
			$query->bindValue(':id', $responsavel->getId(), PDO::PARAM_INT);							  
			$query->bindValue(':nome', $responsavel->getNome(), PDO::PARAM_STR);
			$query->bindValue(':cpf', $responsavel->getCpf(), PDO::PARAM_STR);
			$query->bindValue(':email', $responsavel->getEmail(), PDO::PARAM_STR);
			$query->bindValue(':data_nascimento', $responsavel->getDataNascimento(), PDO::PARAM_STR);
			
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


?>