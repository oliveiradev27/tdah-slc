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
    <link href="../css/boilerplate.css" rel="stylesheet" type="text/css">
    <link href="../css/style.css" rel="stylesheet" type="text/css">

    <script src="../js/respond.min.js"></script>
    <script>

    </script>
</head>
<body>
<header>
    <nav role="custom-dropdown">
        <input type="checkbox" id="button">
        <label for="button" onclick><div class="Link icon_p" ><a href="../tmp/">Painel</a></div></label>
        <div class="linkPainel icon_p" ><a href="../tmp/">Painel</a></div>
        <ul>
            <li class="add"><a href="../tmp/add_profissional.php">Adicionar Profissional</a></li>
            <li class="add1"><a href="../tmp/add_responsavel.php">Adicionar Respons&aacute;vel</a></li>
            <li class="add2"><a href="../tmp/add_paciente.php">Adicionar Paciente</a></li>
            <li class="add3"><a href="../tmp/add_testes.php">Adicionar Testes</a></li>
            <li class="add4"><a href="../tmp/rel_categorias.php">Relatorios</a></li>
            <li class="add5"><a href="../tmp/config.php">Configura&ccedil;&otilde;es</a></li>
            <li class="add6"><a href="../">Sair</a></li>
        </ul></nav>
</header>
<section>
    <article>

        <ul class="menuCenter painel">
            <li class="icons icons_av Tam1 green" style="width: 260px"><a href="../tmp/ava_categ.php"><span class="green">Avaliados</span><br><span>Avalição finalizadas</span>
                </a><strong class="pad"> 15</strong></li>
            <li class="icons icons_ap Tam1 red" style="width: 260px"><a href="../tmp/std_categ.php"><span class="red">Stand by</span><br><span>Aguardando avaliação</span>
                </a><strong style="margin-left:15px;"> 10</strong></li>

        </ul>

        <div class="Clear"></div>
    </article>
    <div class="Clear"></div>
</section>
<footer>
    <div class="Prof">
        <img src="../img/Id-Card-32.png" class="img_prof"/>
        <p>
            Dr. Paulo Mattos<br />
            CRP 00000</p>
    </div>
    <div class="Pacien" style="display: none;">
        <img src="../img/Male-User-32.png" class="img_prof"/>
        <p>
            Carlos Jose<br />
            P 0000</p>
    </div>
</footer>
</body>
</html>
