<?php

require_once ('Contato.php');

class ContatoResponsavel extends Contato {
	private $responsavel_id;
	public function getResponsavelId() {
		return $this->responsavel_id;
	}

	public function setResponsavelId($responsavel_id) {
		$this->responsavel_id = $responsavel_id;
	}
}