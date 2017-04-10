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

}