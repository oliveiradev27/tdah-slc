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
            <form name="ava_pac" method="post" action="apl_cat_leitura.php" >
        <ul class="btnCategoria">
            <li class="btnCategoria escrita">
                <input name="btnCategoria" type="radio" id="escrita" value="Escrita">
                <label for="escrita">Escrita</label>
            </li>

            <li class="btnCategoria leitura">
                <input name="btnCategoria" type="radio" id="leitura" value="leitura">
                <label for="leitura">Leitura</label>
            </li>
            <li class="btnCategoria matematico">
                <input name="btnCategoria" type="radio" id="matematico" value="Matematico">
                <label for="matematico">Matematico</label>
            </li>
            <div class="Clear"></div>
        </ul>

            <div class="ClearBox"></div>
            <h3> Chave de liberação</h3>
            <input type="password" name="paciente" class="tmp tmp_w" value="" >

            <div class="ClearBox"><div class="icons_Avi">Digite sua chave de liberação e clique em avançar.</div></div>
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
