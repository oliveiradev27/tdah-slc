<?php 

class Login
{
	private $id,
			$login,
			$senha,
			$permissao,
			$chave;

	function __autoload( $classe )
	{
			if(file_exists($classe.'/.php'))
				require_once($classe.'/php');
	}

    public function __construct()
    {
        
    }

    public function getId()
    {
    	return $this->id;
    }

    public function setId( $id )
    {
    	$this->id = $id;
    }

    public function getLogin()
    {
    	return $this->login;
    }

    public function setLogin( $login )
    {
    	$this->login = $login;
    }

    public function setSenha( $senha )
    {
    	$this->senha = md5( $senha );
    }

    public function getSenha()
    {
    	return $this->senha;
    }

    public function getPermissao()
    {
    	return $this->permissao;
    }

    public function setPermissao($permissao)
    {
    	$this->permissao = $permissao;
    }

    public function getChave()
    {
    	return $this->chave;
    }

    public function setChave($chave)
    {
    	$this->chave = $chave;
    }
}