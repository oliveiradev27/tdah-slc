<?php 
	$pagina['titulo'] = 'Painel';
	include('header.php');
 ?>
<section>
<article>

<ul class="menuCenter painel">
<li class="icons Tam3"><a href="../tmp/avaliacao.php">Avaliação de Teste</a></li>
<li class="icons icons_a Tam3"><a href="../tmp/aplicacao.php">Aplicação de Teste</a></li>

</ul>

    <div class="Clear"></div>
</article>
<div class="Clear"></div>
</section>
<?php include('footer.php') ?>
<script type="text/javascript">
	var referrer = document.referrer.toString();
	console.log(referrer);
	referrer = referrer.localeCompare("http://localhost:8080/tdah-slc/index.php");
	sessionStorage.setItem("nome","<?php echo  $_SESSION['nome'] ?>");
	jQuery(document).ready(function($) {
		
		function bemVindo(usuario)
		{
			 	$("#mensagem p").text("Bem Vindo ").append("<strong>"+usuario+"</strong>!");
			 	$("#mensagem small").text("");
			 	$("#mensagem").dialog();
			 	$('#login').val("");
			 	$('#password').val("");
		}
		if(referrer == 0 && sessionStorage.getItem("logado") != 1){
			sessionStorage.setItem("logado", 1);
			bemVindo(sessionStorage.getItem("nome"));
		}
	});
	
</script>
</html>
