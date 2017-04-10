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
}