<?php

class Paciente
{

	private $id,
			$nome,
			$dataNascimento;

	public function getPacienteId()
	{
		return $this->id;
	}

	public function setPacienteId($id)
	{
		$this->id = $id;
	}

	public function getNome()
	{
		return $this->nome;
	}

	public function setNome($nome)
	{
		$this->nome = $nome;
	}

	public function getDataNascimento()
	{
		return $this->dataNascimento;
	}

	public function setDataNascimento($dataNascimento)
	{
		$this->dataNascimento = $dataNascimento;
	}
}