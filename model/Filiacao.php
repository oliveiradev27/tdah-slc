<?php 


class Filiacao
{
	private $filiacao_id,
			$paciente_id,
			$responsavel_id,
			$descricao;

	public function getFiliacaoId()
	{
		return $this->filiacao_id;
	}

	public function setFiliacaoId($id)
	{
		$this->filiacao_id = $id;
	}

	public function getPacienteId()
	{
		return $this->paciente_id;
	}

	public function setPacienteId($paciente_id)
	{
		$this->paciente_id = $paciente_id;
	}

	public function getResponsavelId()
	{
		return $this->responsavel_id;
	}

	public function setResponsavelId($responsavel_id)
	{
		$this->responsavel_id = $responsavel_id;
	}

	public function getDescricao()
	{
		return $this->descricao;
	}

	public function setDescricao($descricao)
	{
		$this->descricao = $descricao;
	}

}