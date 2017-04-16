<?php

class FiliacaoDao extends Conexao
{
	public function inserir(Filiacao $filiacao)
	{
		$con  = $this->getConexao();
		$con->beginTransaction();
		$query = $con->prepare('INSERT
									filiacao_paciente (responsavel_id, paciente_id, descricao)
								VALUES 
									(:responsavel_id, :paciente_id, :descricao)');
		$query->bindValue(':responsavel_id', $filiacao->getResponsavelId(), PDO::PARAM_INT);
		$query->bindValue(':paciente_id', $filiacao->getPacienteId(), PDO::PARAM_INT);
		$query->bindValue(':descricao', $filiacao->getDescricao(), PDO::PARAM_STR);
		$query = $this->executar($query);
		if ($query){
			$con->commit();
			return true;
		} else {
			$con->rollback();
			return false;
		}
	}

	public function alterar(Filiacao $filiacao)
	{
		$con  = $this->getConexao();
		$con->beginTransaction();
		$query = $con->prepare('UPDATE
									filiacao_paciente
								SET 
									responsavel_id = :responsavel_id, paciente_id = :paciente_id, descricao = :descricao
								WHERE
									filiacao_id = :id');

		$query->bindValue(':id', $filiacao->getFiliacaoId(), PDO::PARAM_INT);
		$query->bindValue(':responsavel_id', $filiacao->getResponsavelId(), PDO::PARAM_INT);
		$query->bindValue(':paciente_id', $filiacao->getPacienteId(), PDO::PARAM_INT);
		$query->bindValue(':descricao', $filiacao->getDescricao(), PDO::PARAM_STR);
		$query = $this->executar($query);
		if ($query){
			$con->commit();
			return true;
		} else {
			$con->rollback();
			return false;
		}
	}

	public function getPorPacienteId($paciente_id)
	{
		$con   = $this->getConexao();
		$query = $con->prepare('SELECT
									filiacao_id, 
									paciente_id AS paciente,
									responsavel_id AS responsavel,
									descricao
								FROM
									filiacao_paciente
								WHERE
									paciente_id = :id');

		$query->bindValue(':id', $paciente_id, PDO::PARAM_INT);									
		$query 	  = $this->executar($query);
		$filiacao = $query->fetch();
		if($filiacao)
			return $filiacao;
		else
		 	false;
	
	}

}