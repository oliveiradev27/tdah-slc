<?php 

require_once('../model/Paciente.php');
require_once('../model/Filiacao.php');
require_once('../dao/PacienteDao.php');
require_once('../dao/FiliacaoDao.php');

if (isset($_POST['nome']) && !isset($_POST['paciente_id'])){

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
	$filiacao->setDescricao(trim($_POST['descricao_filiacao']));
	$filiacao->setResponsavelId($_POST['responsavel_id']);


	$filiacaoDao = new FiliacaoDao();
	if ($filiacaoDao->inserir($filiacao))
		echo json_encode($paciente->getPacienteId());
	else
		echo json_encode(false);
	return;
} else if (isset($_POST['paciente_id']) && $_POST['paciente_id'] != ""){
	
	$paciente = new Paciente();
	$paciente->setPacienteId($_POST['paciente_id']);
	$paciente->setNome(trim($_POST['nome']));
	$paciente->setDataNascimento($_POST['data']);

	$pacienteDao = new PacienteDao();
	if (!$pacienteDao->alterar($paciente)){
		echo json_encode(false);
		return;
	}

	$filiacao    = new Filiacao();
	$filiacaoDao = new FiliacaoDao();
	$filiacao->setFiliacaoId($filiacaoDao->getPorPacienteId($paciente->getPacienteId())->filiacao_id);
	$filiacao->setPacienteId($paciente->getPacienteId());
	$filiacao->setResponsavelId($_POST['responsavel_id']);
	$filiacao->setDescricao(trim($_POST['descricao_filiacao']));
	if ($filiacaoDao->alterar($filiacao))
		echo json_encode(true);
	else
		echo json_encode(false);

} else if (isset($_GET['id'])) {

	$pacienteDao 		= new PacienteDao();
	$paciente  			= $pacienteDao->get($_GET['id']);
	$filiacaoDao    	= new FiliacaoDao();
	$filiacao 			= $filiacaoDao->getPorPacienteId($paciente->id);
	$filiacao->paciente = $paciente;
	echo json_encode($filiacao);

} else if(isset($_GET['nome'])) {
		$pacienteDao = new PacienteDao();
		$pacientes 	 = $pacienteDao->getPorNome($_GET['nome']);
		echo json_encode($pacientes);
}

?>