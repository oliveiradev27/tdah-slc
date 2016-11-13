<?php 

require_once('Login.php');
require_once('Endereco.php');

class Profissional  
{

	private $id,
			$nome,
			$cpf,
			$registro,
			$login,
			$endereco;

	//Esse método é usado para realizar os imports automáticos na classe

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

    public function getNome()
    {
    	return $this->nome;
    }

    public function setNome( $nome )
    {
    	$this->nome = $nome;
    }

    public function getCpf()
    {
    	return $this->cpf;
    }

    public function setCpf( $cpf )
    {
    	$this->cpf = $cpf;
    }

    public function getRegistro()
    {
    	return $this->registro;
    }

    public function setRegistro( $registro )
    {
    	$this->registro = $registro;
    }

    public function getLogin()
    {
    	return $this->login;
    }

    public function setLogin( $login )
    {
    	$this->login = $login;
    }

    public function getEndereco()
    {
    	return $this->endereco;
    }

    public function setEndereco( $endereco )
    {
    	$this->endereco = $endereco;
    }

}
