<?php 

require_once('../model/Paciente.php');
require_once('../model/Filiacao.php');
require_once('../dao/PacienteDao.php');
require_once('../dao/FiliacaoDao.php');

if (isset($_POST['nome'])){

	$paciente = new Paciente();
	$paciente->setNome(trim($_POST['nome']));
	$paciente->setDataNascimento($_POST['data']);

	$pacienteDao = new PacienteDao();
	$paciente->setPacienteId($pacienteDao->inserir($paciente));
	if (!$paciente->getPacienteId()){
		echo json_encode(false);
		return;
	}

	$filiacao = new Filiacao();
	$filiacao->setPacienteId($paciente->getPacienteId());
	$filiacao->setResponsavelId($_POST['responsavel_id']);
	$filiacao->setDescricao(trim($_POST['descricao_filiacao']));

	$filiacaoDao = new FiliacaoDao();
	if ($filiacaoDao->inserir($filiacao))
		echo json_encode($paciente->getPacienteId());
	else
		echo json_encode(false);
	return;
} else if ($_POST['paciente_id']){
	
}

?>