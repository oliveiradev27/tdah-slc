<?php 

require_once('../config/Conexao.php');

class PacienteDao extends Conexao
{
	public function inserir(Paciente $paciente)
	{
		$con  = $this->getConexao();
		$con->beginTransaction();
		$query = $con->prepare('INSERT
									paciente (nome, data_nascimento)
								VALUES 
									(:nome, :data_nascimento)');
		$query->bindValue(':nome', $paciente->getNome(), PDO::PARAM_STR);
		$query->bindValue(':data_nascimento', $paciente->getDataNascimento(), PDO::PARAM_STR);
		$query = $this->executar($query);
		if ($query){
			$con->commit();
			return $this->getUltimoInserido();
		} else {
			$con->rollback();
			return false;
		}
	}

	public function alterar(Paciente $paciente)
	{
		$con  = $this->getConexao();
		$con->beginTransaction();
		$query = $con->prepare('UPDATE
									paciente 
								SET 
									nome = :nome, data_nascimento = :data_nascimento
								WHERE
									paciente_id = :id');
		$query->bindValue(':nome', $paciente->getNome(), PDO::PARAM_STR);
		$query->bindValue(':data_nascimento', $paciente->getDataNascimento(), PDO::PARAM_STR);
		$query->bindValue(':id', $paciente->getPacienteId(), PDO::PARAM_INT);
		$query = $this->executar($query);
		if ($query){
			$con->commit();
			return true;
		} else {
			$con->rollback();
			return false;
		}
	}

	public function get( $id  = null)
	{
		if($id)
		{
			$query = $this->getConexao()->prepare('SELECT 
														paciente_id AS id, nome, data_nascimento
												  FROM
												  		paciente
												 WHERE
												 		paciente_id = :id');
			$query->bindValue(':id', $id, PDO::PARAM_INT);									
			$query 	  = $this->executar($query);
			$paciente = $query->fetch();
			if($query)
				return $paciente;
			else
			 	false;
		} else {
			return $this->getAll();
		}
	}

	public function getAll()
	{
			$query = $this->getConexao()->prepare('SELECT 
														paciente_id AS id, nome, data_nascimento
												  FROM
												  		paciente');
			$query 		= $this->executar($query);
			$pacientes	= $query->fetchAll();
		    			
			if($query)
				return $pacientes;
			else
			 	false;
	}
	public function getUltimoInserido()
	{
		$query = $this->getConexao()->prepare('SELECT
													paciente_id
											   	FROM 
											   	 	paciente
											   	ORDER BY
											   		paciente_id 
											   	DESC LIMIT 1');
		$query = $this->executar($query);
		if($query)
			return $query->fetch()->paciente_id;
		else
			return false;
	}

	public function getPorNome($nome)
	{
			$con   = $query = $this->getConexao();
			$query = $con->prepare('SELECT 
										paciente_id AS id, nome, data_nascimento
									FROM
									 	paciente
									WHERE
										nome LIKE  :nome');
			$query->bindValue(':nome', '%'.$nome.'%', PDO::PARAM_STR);									
			$query 	= $this->executar($query)->fetchAll();
			$pacientes = $query;
			if($pacientes)
				return $pacientes;
			else
			 	false;
	}
}