<?php 

require_once('../config/Conexao.php');
require_once('../model/Responsavel.php');

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
		$query = $this->getConexao()->prepare('SELECT responsavel_id FROM responsavel ORDER BY responsavel_id DESC LIMIT 1');
		$query = $this->executar($query);
		if($query)
			return $query->fetch()->responsavel_id;
		else
			return false;
	}

	public function buscarCPF($cpf){
		$query = $this->getConexao()->prepare('SELECT
													 responsavel_id 
											   FROM 
													 responsavel 
											   WHERE
											   		cpf = :cpf');
		$query->bindValue(':cpf', $cpf, PDO::PARAM_STR);											   
		$query = $this->executar($query);
		if($query)
			return $query->fetch();
		else
			return false;
	}

}


?>