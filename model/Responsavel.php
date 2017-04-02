<?php 

class Responsavel
{
	private $id,
			$nome,
			$cpf,
			$endereco,
			$dataNascimento,
			$email;

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function setCpf($cpf)
	{
		$this->cpf = $cpf;
	}

	public function getCpf()
	{
		return $this->cpf;
	}

	public function setDataNascimento($dataNascimento)
	{
		$this->dataNascimento = $dataNascimento;
	}

	public function getDataNascimento()
	{
		return $this->dataNascimento;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getEmail()
	{
		return $this->email;
	}


	public function setEndereco($endereco)
	{
		$this->endereco = $endereco;
	}

	public function getEndereco()
	{
		return $this->endereco;
	}

}

 ?>