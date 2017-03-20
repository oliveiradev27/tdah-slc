<?php 
session_start();

require_once('../config/Conexao.php');
require_once('../model/Login.php');
require_once('../model/Profissional.php');
require_once('ProfissionalDao.php');

class LoginDao extends Conexao
{
	public function inserir(Login $login, $profissional_id)
	{

		$query = $this->getConexao()->prepare("INSERT INTO
    												login (login, senha, permissao, chave)
                                               VALUES 
                                                    (:login, :senha, :permissao, :chave)");
		$query->bindValue(':login', $login->getLogin(), PDO::PARAM_STR);
		$query->bindValue(':senha', $login->getSenha(), PDO::PARAM_STR);											
		$query->bindValue(':permissao',$login->getPermissao(), PDO::PARAM_STR);
		$query->bindValue(':chave', $login->getChave(), PDO::PARAM_STR);
		$query = $this->executar($query);
   		if($query)
    	{
			$login->setId($this->getUltimoInserido());
			$profissionalDao = new ProfissionalDao();
			if($profissionalDao->alterarLogin($login, $profissional_id))
    			return true;
			else
				return false;
    	} else {
    		$query = null;
    		return false;
    	}	

	}

	public function getUltimoInserido()
	{
		$query = $this->getConexao()->prepare('SELECT login_id FROM login ORDER BY login_id DESC LIMIT 1');
		$query = $this->executar($query);
		if($query)
			return $query->fetch()->login_id;
		else
			return false;
	}



    public function logar($login, $senha)
    {
    	$usuario = new Profissional();
    	$usuario->setLogin(new Login());
    	$usuario->getLogin()->setLogin( $login );
    	$usuario->getLogin()->setSenha( $senha );

    	$query = $this->getConexao()->prepare("SELECT * FROM
    												profissional
    								  			INNER JOIN
    												login
    								  			ON
    								   				profissional.login_id = login.login_id
                                                INNER JOIN 
                                                    registro 
                                                ON 
                                                    profissional.registro_id = registro.registro_id
    								  			WHERE 
    												login.login = :login
    								  			AND 
    												login.senha = :senha");
    	$query->bindValue(':login', $usuario->getLogin()->getLogin(), PDO::PARAM_STR);
    	$query->bindValue(':senha', $usuario->getLogin()->getSenha(), PDO::PARAM_STR);
    	$query = $this->executar($query);
    	if($query)
    	{
    		return $query->fetch();
    	} else {
    		$query = null;
    		return false;
    	}
 

    }

    public function logout()
    {
    	if(isset($_SESSION['usuario']))
    	{
			session_destroy();
			return true;
    	} else {
			return false;
    	}
    }
}