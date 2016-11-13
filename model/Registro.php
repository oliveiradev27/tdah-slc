<?php 

class Registro
{
	private $registro_id,
			$tipo,
			$numero;

	public function getRegistroId()
	{
		return $this->registro_id;
	}

	public function setRegistroId($registro_id)
	{
		$this->registro_id = $registro_id;
	}

	public function getTipo()
	{
		return $this->tipo;
	}

	public function setTipo($tipo)
	{
		$this->tipo = $tipo;
	}

	public function getNumero()
	{
		return $this->numero;
	}

	public function setNumero($numero)
	{
		$this->numero = $numero;
	}

}

?>