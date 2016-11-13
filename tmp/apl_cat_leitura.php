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
        <label for="button" onclick><div class="Link icon_p" ><a href="javascript:window.history.go(-1)">Pedagógia</a></div></label>
        <div class="linkPainel icon_p" ><a href="javascript:window.history.go(-1)">Pedagógia</a></div>
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
        <div class="boxMain" style="border:0">
            <form name="ava_pac" method="post" action="apl_tst_leitura.php" >

                <div class="ClearBox"><div class="icons_Lei">Leitura</div></div>

                <p>
                    <input type="checkbox" id="test1" value="Rumores da floresta" />
                    <label for="test1">Rumores da floresta</label>

                <div class="Clear"></div>
                </p>

                <p>
                    <input type="checkbox" id="test2" value="Mundo encantado" />
                    <label for="test2">Mundo encantado</label>

                <div class="Clear"></div>
                </p>

                <p>
                    <input type="checkbox" id="test3" value="Laranjeira" />
                    <label for="test3">Laranjeira</label>

                <div class="Clear"></div>
                </p>


                <div class="ClearBox"></div>

                <input type="submit" name="avancar" class="avancar" value="Avançar"  >
                <div class="Clear"></div>
            </form>
        </div>
    </article>

</section>
<footer>
    <div class="Prof">
        <img src="../img/Id-Card-32.png" class="img_prof"/>
        <p>
            Dr. Paulo Mattos<br />
            CRP 00000</p>
    </div>
    <div class="Pacien" style="display: ;">
        <img src="../img/Male-User-32.png" class="img_prof"/>
        <p>
            Marcos José Teixeira<br />
            P 051</p>
    </div>
</footer>
</body>
</html>
