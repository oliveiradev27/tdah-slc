<?php 

//defined('BASEPATH') OR exit('No direct script access allowed');
include('config.php');
class Conexao{

	private $con;
	public function __construct()
	{
		try
		{
			$con = new PDO( $config['dns'], $config['user'], $config['password'] );
		} catch ( PDOException $e ) {
			echo "<h1>Erro ao conectar na base de dados!</h1>\n<h2>$e->getMessage()</h2>";
		}

	}

	public function getConexao()
	{
		return $con;
	}

	public function executarQuery( $conexao )
	{
		try
		{
			$conexao->execute();
			return true;
		}catch(PDOException $e)
		{
			echo "<h1>Erro ao executar query!</h1>\n<h2>$e->getMessage()</h2>";
		}
		
	}

}