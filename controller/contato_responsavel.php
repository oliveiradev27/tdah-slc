<?php 
require_once('../dao/ContatoResponsavelDao.php');
require_once('../model/ContatoResponsavel.php');

if(isset($_GET['responsavel_id'])){
	$contatoResponsavelDao = new ContatoResponsavelDao();
	echo json_encode($contatoResponsavelDao->getPorResponsavel($_GET['responsavel_id']));
}



 ?>