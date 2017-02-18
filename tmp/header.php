<!DOCTYPE html>
<?php
/**
* PROJETO TDAH - TADS ANHANGUERA 2015-2017
*/
	session_start();
	if(!isset($_SESSION['usuario']))
	{
		session_destroy();
		header("location: ../");
	}
?>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="pt-br">
<!--<![endif]-->
	<head>
	<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,  user-scalable=no, initial-scale=1">
		<title>SLC - <?php echo (isset($pagina['titulo'])) ? $pagina['titulo'] : "TDAH SLC" ?></title>
		<link href="../css/boilerplate.css" rel="stylesheet" type="text/css">
		<link href="../css/style.css" rel="stylesheet" type="text/css">
		<script src="../js/respond.min.js"></script>
	</head>
	<body>
		<header>
			<nav role="custom-dropdown">
				<input type="checkbox" id="button">
				<label for="button" onclick><div class="Link icon_p" ><a href="../tmp/"><?php echo (isset($pagina['titulo'])) ? $pagina['titulo'] : "bla" ?></a></div></label>
				<div class="linkPainel icon_p" >
					<a href="../tmp/"><?php echo (isset($pagina['titulo'])) ? $pagina['titulo'] : "bla" ?></a>
				</div>
				<ul>
					<li class="add"><a href="../tmp/add_profissional.php">Adicionar Profissional</a></li>
					<li class="add1"><a href="../tmp/add_responsavel.php">Adicionar Responsável</a></li>
					<li class="add2"><a href="../tmp/add_paciente.php">Adicionar Paciente</a></li>
					<li class="add3"><a href="../tmp/add_testes.php">Adicionar Testes</a></li>
					<li class="add4"><a href="../tmp/rel_categorias.php">Relatorios</a></li>
					<li class="add5"><a href="../tmp/config.php">Configurações</a></li>
					<li class="add6" id="sair"><a href="#">Sair</a></li>
				</ul>
			</nav>
		</header>