<?php  

class Empresa
{
	private $empresaId,
			$empresa,
			$dataRegistro,
			$registro,
			$endereco;

    public function __construct()
    {
        
    }

    public function getEmpresaId()
    {
    	return $this->empresaId;
    }

    public function setEmpresaId($empresaId)
    {
    	$this->empresaId = $empresaId;
    }

    public function getEmpresa()
    {
    	return $this->empresa;
    }

    public function setEmpresa($empresa)
    {
    	$this->empresa = $empresa;
    }

    public function getDataRegistro()
    {
    	return $this->dataRegistro;
    }

    public function setDataRegistro($dataRegistro)
    {
    	$this->dataRegistro = $dataRegistro;
    }

    public function getRegistro()
    {
    	return $this->registro;
    }

    public function setRegistro($registro)
    {
    	$this->registro = $registro;
    }

    public function getEndereco()
    {
    	return $this->endereco;
    }

    public function setEndereco($endereco)
    {
    	$this->endereco = $endereco;
    }
}

?>