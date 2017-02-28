<?php 

require_once('../config/Conexao.php');
require_once('../model/Endereco.php');
class EnderecoProfissionalDao extends Conexao
{
	public function inserir($endereco)
	{
		$query = $this->getConexao()->prepare('INSERT
													endereco (logradouro, complemento, numero, cep, bairro, cidade, uf)
											   VALUES
											   		(:logradouro, :complemento, :numero, :cep, :bairro, :cidade, :uf)');
		$query->bindValue(':logradouro', $endereco->getLogradouro(), PDO::PARAM_STR);
		$query->bindValue(':complemento', $endereco->getComplemento(), PDO::PARAM_STR);
		$query->bindValue(':numero', $endereco->getNumero(), PDO::PARAM_INT);
		$query->bindValue(':cep', $endereco->getCep(), PDO::PARAM_STR);
		$query->bindValue(':bairro', $endereco->getBairro(), PDO::PARAM_STR);
		$query->bindValue(':cidade', $endereco->getCidade(), PDO::PARAM_STR);
		$query->bindValue(':uf', $endereco->getUf(), PDO::PARAM_STR);

		$query = $this->executar($query);
		if($query)
			return $this->getUltimoInserido();
		else
			return false;
	}

	public function getUltimoInserido()
	{
		$query = $this->getConexao()->prepare('SELECT endereco_id FROM endereco ORDER BY endereco_id DESC LIMIT 1');
		$query = $this->executar($query);
		if($query)
			return $query->fetch()->endereco_id;
		else
			return false;
	}

    public function getPorProfissional($id)
	{
		$query = $this->getConexao()->prepare('SELECT
                                                    *
                                               FROM 
                                                    endereco 
                                                WHERE
                                                    endereco_id = :id');
		$query->bindValue(':id', $id, PDO::PARAM_INT);
        $query = $this->executar($query);
		if($query)
			return $query->fetch();
		else
			return false;
	}
}


?>