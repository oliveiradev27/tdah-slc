<?php 

require_once('Login.php');
require_once('Endereco.php');

class Profissional  
{

	private $id,
			$nome,
			$cpf,
			$registro,
            $email,
			$login,
            $dataNascimento,
            $empresa_id,
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

    public function getDataNascimento()
    {
    	return $this->dataNascimento;
    }

    public function setDataNascimento( $dataNascimento )
    {
    	$this->dataNascimento = $dataNascimento;
    }
    public function getRegistroId()
    {
    	return $this->registro;
    }

    public function setRegistroId( $registro )
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

    public function getEmail()
    {
    	return $this->email;
    }

    public function setEmail( $email )
    {
    	$this->email = $email;
    }

    public function getEnderecoId()
    {
    	return $this->endereco;
    }

    public function setEnderecoId( $endereco )
    {
    	$this->endereco = $endereco;
    }

    public function getEmpresaId()
    {
    	return $this->empresa_id;
    }

    public function setEmpresaId( $empresa_id )
    {
    	$this->empresa_id = $empresa_id;
    }

}
