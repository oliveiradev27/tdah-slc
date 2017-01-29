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
	var referrer = "";
	<?php $referer = (strpos($_SERVER['HTTP_REFERER'], 'tdah-slc/index.php')) ? 1 : 0 ?>
	//referrer = referrer.localeCompare("http://localhost:8080/tdah-slc/index.php");
	referer = <?php echo $referer ?>; 
	sessionStorage.setItem("nome","<?php echo  $_SESSION['nome'] ?>");
	jQuery(document).ready(function($) {
		
		function bemVindo(usuario)
		{
			 	$("#mensagem p").text("Bem Vindo ").append("<strong>"+usuario+"</strong>!");
			 	$("#mensagem small").text("");
			 	$("#mensagem").dialog({
					 show: { effect: 'fade', speed: '500' },
           			 hide: { effect: 'fade', speed: '1500' },
					buttons: {
                		OK: function() {
                   		 $(this).dialog("close");
                		}
					}
				 });
			 	$('#login').val("");
			 	$('#password').val("");
		}
	//	if(referrer == 0 && sessionStorage.getItem("logado") != 1){
		if(referrer == 0 && sessionStorage.getItem("logado") != 1){

			sessionStorage.setItem("logado", 1);
			bemVindo(sessionStorage.getItem("nome"));
		}
	});
	
</script>
</html>
