<?php 

class Contato {

    private $id,
            $tipo,
            $valor;

   public function getId()
   {
       return $this->id;
   }

   public function setId($id)
   {
       $this->id = $id;
   }

  public function getTipo()
   {
       return $this->tipo;
   }

   public function setTipo($tipo)
   {
       $this->tipo = $tipo;
   }

   public function getValor()
   {
       return $this->valor;
   }

   public function setValor($valor)
   {
       $this->valor = $valor;
   }

}