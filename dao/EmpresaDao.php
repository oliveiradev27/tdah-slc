<?php 

require_once('../config/Conexao.php');
require_once('../model/Empresa.php');
class EmpresaDao extends Conexao 
{
	public function inserir($empresa)
	{
		$query = $this->getConexao()->prepare('INSERT
													empresa (nome, data_registro, endereco_id, registro_id)
											   VALUES
											   		(:nome, :data, :endereco_id, :registro_id)');
		$query->bindValue(':nome', $empresa->getEmpresa(),  PDO::PARAM_STR);
		$query->bindValue(':data', $empresa->getDataRegistro(),  PDO::PARAM_STR);
		$query->bindValue(':registro_id', $empresa->getRegistro(),  PDO::PARAM_INT);
		$query->bindValue(':endereco_id', $empresa->getEndereco(),  PDO::PARAM_INT);
		$query = $this->executar($query);
		if($query){
		 	return $this->getUltimoInserido();
		}
		else
			return false;
	}

	public function getUltimoInserido()
	{
		$query = $this->getConexao()->prepare('SELECT empresa_id FROM empresa ORDER BY empresa_id DESC LIMIT 1');
		$query = $this->executar($query);
		if($query)
			return $query->fetch()->empresa_id;
		else
			return false;
	}

	public function buscarCNPJ($cnpj = null)
	 {
	 	if($cnpj)
	 	{	
	 		$registroDao = new RegistroDao();
	 		if($registroDao->getRegistro($cnpj))
	 			return true;
	 		else 
	 			return false;
	 	}
	 	return false; 
	 }

	 public function get($id = null)
	 {
		 if($id)
		 {
			 $query = $this->getConexao()->prepare('SELECT
														 empresa.empresa_id, empresa.nome, registro.numero as "cnpj"
											   		FROM
											   			 empresa
											   		INNER JOIN
											   			registro
											  		ON
											   			empresa.registro_id = registro.registro_id
											 		WHERE
											   			empresa_id = :id');
			$query->bindValue(':id', $id, PDO::PARAM_INT);										   
			return $this->executar($query)->fetch();

		 } else {
			 return $this->getAll();
		 }

	 }

	 public function getAll()
	 {
		$query = $this->getConexao()->prepare('SELECT
													 empresa.empresa_id, empresa.nome, registro.numero as "cnpj"
											   FROM
											   		 empresa
											   INNER JOIN
											   		registro
											   ON
											   		empresa.registro_id = registro.registro_id');

			return $this->executar($query)->fetchAll();
	 }
	 
}

?>