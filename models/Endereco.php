<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Endereco
{
	private $endereco_id,
			$logradouro,
			$cep,
			$uf,
			$numero,
			$complemento,
			$cidade;

	public function setLogradouro( $logradouro )
	{
		$this->logradouro = $logradouro;
	}

	public function getLogradouro()
	{
		return $this->logradouro;
	}

	public function setEnderecoId( $id )
	{
		$this->endereco_id = $id;
	}

	public function getEnderecoId()
	{
		return $this->endereco_id;
	}

	public function setCep( $cep )
	{
		$this->cep = $cep;
	}

	public function getCep()
	{
		return $this->cep;
	}

	public function setUf( $uf )
	{
		$this->uf = $uf;
	}

	public function getUf()
	{
		return $this->uf;
	}

	public function setCidade( $cidade )
	{
		$this->cidade = $cidade;
	}

	public function getCidade()
	{
		return $this->cidade;
	}

	public function setNumero( $numero )
	{
		$this->numero = $numero;
	}

	public function getNumero()
	{
		return $this->numero;
	}

	public function setComplemento( $complemento )
	{
		$this->complemento = $complemento;
	}

	public function getComplemento()
	{
		return $this->complemento;
	}

    public function __construct()
    {
        
    }

    public function save( $dados )
    {
    }

  	public function delete( $id )
    {

    }

    public function edit( $dados )
    {
   	
    }


}