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
}

?>