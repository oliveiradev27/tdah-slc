<?php

require_once('Contato.php');

class ContatoProfissional extends Contato {
    private  $profissional_id;
    public function getProfissionalId()
    {
       return $this->profissional_id;
    }

    public function setProfissionalId($profissional_id)
    {
       $this->profissional_id = $profissional_id;
    }
}