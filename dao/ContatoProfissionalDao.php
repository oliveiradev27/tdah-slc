<?php 

require_once('../model/ContatoProfissional.php');

class ContatoProfissionalDao extends Conexao {

    public function inserir(ContatoProfissional $contatoProfissional)
    {
        $query = $this->getConexao()->prepare('INSERT INTO
                                                    contato_profissional (tipo, valor, profissional_id)
                                              VALUES
                                                    (:tipo, :valor, :id)'
                                             );
        $query->bindValue(':tipo',  $contatoProfissional->getTipo(), PDO::PARAM_STR);
        $query->bindValue(':valor', $contatoProfissional->getValor(), PDO::PARAM_STR);
        $query->bindValue(':id',    $contatoProfissional->getProfissionalId(), PDO::PARAM_STR);
        
        $query = $this->executar($query);
        if($query){
            return $this->getUltimoInserido();
        } else 
            return false;

    }

    public function getUltimoInserido()
	{
		$query = $this->getConexao()->prepare('SELECT 
                                                    contato_id
                                               FROM 
                                                    contato_profissional
                                              ORDER BY
                                                    contato_id
                                              DESC LIMIT 
                                                    1');
		$query = $this->executar($query);
		if($query)
			return $query->fetch()->contato_id;
		else
			return false;
	}

    public function getPorProfissional($id)
    {
        $query = $this->getConexao()->prepare('SELECT 
                                                    *
                                               FROM 
                                                    contato_profissional
                                              WHERE
                                                    profissional_id = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);                                            
		$query = $this->executar($query);
		if($query)
			return $query->fetchAll();
		else
			return false;
    }

}