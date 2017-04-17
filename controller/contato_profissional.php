<?php 
require_once('../dao/ContatoProfissionalDao.php');
require_once('../model/ContatoProfissional.php');

if(isset($_GET['profissional_id'])){
	$contatoProfissionalDao = new ContatoProfissionalDao();
	echo json_encode($contatoProfissionalDao->getPorProfissional($_GET['profissional_id']));
}