<?php 

require_once('../config/Conexao.php');
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

    public function alterar($contatoProfissional)
    {
        $query = $this->getConexao()->prepare('UPDATE
                                                    contato_profissional 
                                              SET
                                                    tipo = :tipo, valor = :valor
                                              WHERE
                                                   contato_id = :id'
                                             );
        $query->bindValue(':tipo',  $contatoProfissional->getTipo(), PDO::PARAM_STR);
        $query->bindValue(':valor', $contatoProfissional->getValor(), PDO::PARAM_STR);
        $query->bindValue(':id',    $contatoProfissional->getId(), PDO::PARAM_INT);
        
        $query = $this->executar($query);
        if($query){
            return true;
        } else 
            return false;
    }

    public function excluir($id)
    {
        $query = $this->getConexao()->prepare('DELETE FROM
                                                  contato_profissional    
                                              WHERE
                                                  contato_id = :id'
                                             );
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        
        $query = $this->executar($query);
        if($query){
            return true;
        } else 
            return false;
    }


}