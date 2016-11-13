<?php 

function __autoload( $classe )
{
	if(file_exists('../model/'. $classe.'.php'))
			require_once('../model/'. $classe.'.php');
	if(file_exists($classe.'.php'))
			require_once( $classe.'.php');
}

require_once('../config/Conexao.php');
class LoginDao extends Conexao
{
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
    		unset($_SESSION['usuario']);
            session_abort();
			return true;
    	} else {
			return false;
    	}
    }
}