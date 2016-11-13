<?php 
require_once('../config/Conexao.php');
class ProfissonalDao extends Conexao
{
	function __autoload( $classe )
	{
		if(file_exists('../model/'.$classe.'php'))
			require_once('../model/'.$classe.'/php');
	}

	public function inserir($dados)
	{
		if(is_array($dados))
		{ 
			//Configura variável de conexão
			$con   = getConexao();
			//Prepara a query que realizará o insert
			$query = $con->prepare('INSERT');
		}
	}

	//Função encarregada de retornar os registros
	public function listar($id = null)
	{
		//Verifica se o id foi preenchido, pois caso esteja ele irá retornar apenas o registro correspondente ao id
		if($id)
		{
			$con 	= getConexao();
			$query 	= $con->prepare('SELECT * from profissional WHERE profissional_id : id');
			$query->bindValue(':id', (int) $id, PDO::PARAM_INT);
			if($query->execute())
			{
				$resultado = $query->fetch();
			}else {
				return false;
			}
		} else {
			$resultado = $this->listarTodos();
		}

		$query = null;
		return $resultado;
	}

	public function listarTodos()
	{
	
		$query 	= getConexao()->prepare('SELECT * from profissional');
			if($query->executar())
				$resultado = $query->fetchAll();
			else 
				return false;
	}

	public function excluir( $id = null)
	{
		if(!$id)
		{
			return false;
		} else {
			$id = (int) $id;
			//Abre a transação
			$query = getConexao()->beginTransaction();
			$query->prepare('DELETE profissional WHERE profissional_id :id');
			$query->bindValue(':id', $id, PDO::PARAM_INT);
			if($query->executar())
			{
				//Se for executado com sucesso a transação é comitada
				$query->commit();
				$query = null;
				return true;
			} else {
				//Se ocorrer algum erro a operação é desfeita
				$query->rollback();
				$query = null;
				return false;
			}
		}
	}

}