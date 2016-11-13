<footer>
	<div class="Prof">
		<img src="../img/Id-Card-32.png" class="img_prof"/>
		<p>Dr. <?php echo $_SESSION['nome'] ?><br /><?php echo $_SESSION['usuario']->tipo ?>: <?php echo $_SESSION['usuario']->numero ?></p>
	</div>
	<div class="Pacien" style="display: none;">
		<img src="../img/Male-User-32.png" class="img_prof"/>
		<p>Carlos Jose<br />P 0000</p>
	</div>
</footer>
</body>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/custom.js" async></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<div id="mensagem" title="Mensagem do Sistema" style="display:none; text-align:center;">
    <p>Usuário não encontrado!</p>
    <small>tente novamente</small>
</div>