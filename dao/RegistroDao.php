<?php 

require_once('../config/Conexao.php');
require_once('../model/Registro.php');
class RegistroDao extends Conexao
{
	public function inserir($registro)
	{
		$query = $this->getConexao()->prepare('INSERT registro (tipo, numero) VALUES (:tipo, :numero)');
		$query->bindValue(':tipo', $registro->getTipo(),  PDO::PARAM_STR);
		$query->bindValue(':numero', $registro->getNumero(),  PDO::PARAM_STR);
		$query = $this->executar($query);
		if($query){
		 	return $this->getUltimoInserido();
		}
		else
			return false;
	}

	public function getUltimoInserido()
	{
		$query = $this->getConexao()->prepare('SELECT registro_id FROM registro ORDER BY registro_id DESC LIMIT 1');
		$query = $this->executar($query);
		if($query)
			return $query->fetch()->registro_id;
		else
			return false;
	}

	public function getRegistro($valor)
	{
		$query = $this->getConexao()->prepare('SELECT registro_id FROM registro WHERE numero = :numero');
		$query->bindValue(':numero', $valor, PDO::PARAM_STR);
		$query = $this->executar($query);
		if($query && $query->rowCount() > 0)
			return $query->rowCount();
		else
			return false;
	}

	public function get($id)
	{
		$query = $this->getConexao()->prepare('SELECT * FROM registro WHERE registro_id = :id');
		$query->bindValue(':id', $id, PDO::PARAM_INT);
		$query = $this->executar($query);
		if($query)
			return $query->fetch();
		else
			return false;
	}

	public function alterar($registro)
	{
		$query = $this->getConexao()->prepare('UPDATE
													registro
											   SET
											   		tipo = :tipo, numero = :numero
											   WHERE
													registro_id = :id');
		$query->bindValue(':id', $registro->getRegistroId(),  PDO::PARAM_INT);
		$query->bindValue(':tipo', $registro->getTipo(),  PDO::PARAM_STR);
		$query->bindValue(':numero', $registro->getNumero(),  PDO::PARAM_STR);
		$query = $this->executar($query);
		if($query){
		 	return true;
		}
		else
			return false;
	}

}

?>