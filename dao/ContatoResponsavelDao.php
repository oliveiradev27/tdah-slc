<?php 

require_once('../config/Conexao.php');
require_once('../model/ContatoResponsavel.php');

class ContatoResponsavelDao extends Conexao {

    public function inserir(ContatoResponsavel $ContatoResponsavel)
    {
        $query = $this->getConexao()->prepare('INSERT INTO
                                                    contato_responsavel (tipo, valor, responsavel_id)
                                              VALUES
                                                    (:tipo, :valor, :id)'
                                             );
        $query->bindValue(':tipo',  $ContatoResponsavel->getTipo(), PDO::PARAM_STR);
        $query->bindValue(':valor', $ContatoResponsavel->getValor(), PDO::PARAM_STR);
        $query->bindValue(':id',    $ContatoResponsavel->getResponsavelId(), PDO::PARAM_INT);
        
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
                                                    contato_responsavel
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

    public function getPorResponsavel($id)
    {
        $query = $this->getConexao()->prepare('SELECT 
                                                    *
                                               FROM 
                                                    contato_responsavel
                                              WHERE
                                                    responsavel_id = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);                                            
		$query = $this->executar($query);
		if($query)
			return $query->fetchAll();
		else
			return false;
    }

    public function alterar(ContatoResponsavel $contatoResponsavel)
    {
        $query = $this->getConexao()->prepare('UPDATE
                                                    contato_responsavel 
                                              SET
                                                    tipo = :tipo, valor = :valor
                                              WHERE
                                                    contato_id = :id'
                                             );
        $query->bindValue(':tipo',  $contatoResponsavel->getTipo(), PDO::PARAM_STR);
        $query->bindValue(':valor', $contatoResponsavel->getValor(), PDO::PARAM_STR);
        $query->bindValue(':id',    $contatoResponsavel->getId(), PDO::PARAM_INT);
        
        $query = $this->executar($query);
        if($query){
            return true;
        } else 
            return false;
    }

    public function excluir($id)
    {
        $query = $this->getConexao()->prepare('DELETE FROM
                                                  contato_responsavel    
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