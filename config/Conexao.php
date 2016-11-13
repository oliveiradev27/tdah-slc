<?php 

require_once('config.php');

class Conexao{

	private $con;
	private static $config;
	public function getConexao()
	{

		$config = ['dns'   		=> 'mysql:host=localhost;dbname=tdah',
		           'user'  		=> 'root',
			       'password'  	=> 'root',
			      ];
		try
		{
			$con = new PDO( $config['dns'], $config['user'], $config['password'] );
			$con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
		} catch ( Exception $e ) {
			echo "<h1>Erro ao conectar na base de dados!</h1>\n<h2>$e->getMessage()</h2>";
			return false;
		}
		return $con; 
	}

	public function executar( $con )
	{
		try
		{
			if($con->execute())
				return $con;
			return false;
		}catch( PDOException $e )
		{
			echo "<h1>Erro ao executar query!</h1>\n<h2>$e->getMessage()</h2>";
		}
		
	}

}