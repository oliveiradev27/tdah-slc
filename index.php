<!DOCTYPE html>
<?PHP
/**
 * PROJETO TDAH - TADS ANHANGUERA 2015-2017
 */
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
<title>SLC - Painel</title>
<link href="css/boilerplate.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">

<script src="js/respond.min.js"></script>
<script>

</script>
</head>
<body id="PageLogin">
<header></header>
<section>
<article>
<div class="Login">
<form name="form" id="form-login" >

<input id="login" name="login" class="login" type="text" placeholder="Digite seu login" required/>
<div class="Clear"></div>
<input id="password" name="password" required class="password" type="password" placeholder="Digite sua senha" />
<input type="button" alt="Entrar" class="submit" value="OK" />
</form>
</div>

</article>

</section>
<footer></footer>
<div id="mensagem" title="Mensagem do Sistema" style="display:none; text-align:center;">
    <p>Usuário não encontrado!</p>
    <small>tente novamente</small>
</div>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/custom.js" async></script>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript">
	jQuery(document).keypress(function(e) {
	if(e.which == 13)
		jQuery('#form-login .submit').click();
	});	
</script>
</body>
</html>
