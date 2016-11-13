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
            <form name="ava_pac" method="post" action="index.php" >

                <div class="ClearBox"><div class="icons_Lei">Laranjeira</div></div>

                <p>
                <div><input type="checkbox" id="test1" value="Fluente" />
                    <label for="test1">Fluente</label></div>
                <div><input type="checkbox" id="test2" value="Não lê" />
                    <label for="test2" class="spac">Não lê</label></div>
                <div class="Clear"></div>
                </p>
                <p>
                    <input type="checkbox" id="test3" value="Silabada" />
                    <label for="test3">Silabada</label>
                    <input type="checkbox" id="test4" value="Inverte palavras" />
                    <label for="test4" class="spac">Inverte palavras</label>
                <div class="Clear"></div>
                </p>

                <p>
                    <input type="checkbox" id="test5" value="Não respeita pontuação" />
                    <label for="test5">Não respeita pontuação</label>
                    <input type="checkbox" id="test6" value="Omite letras" />
                    <label for="test6" class="spac">Omite letras</label>
                <div class="Clear"></div>
                </p>

                <p>
                    <input type="checkbox" id="test7" value="Se perde durante a leitura" />
                    <label for="test7">Se perde durante a leitura</label>
                    <input type="checkbox" id="test8" value="Acrescenta letras" />
                    <label for="test8" class="spac">Acrescenta letras</label>
                <div class="Clear"></div>
                </p>

                <div class="ClearBoxli"></div>
                <h3> Observação:</h3>
                <textarea class="txtBox"></textarea>
                <div class="ClearBox"></div>


                <ul class="btnRadio">
                    <li class="btnRadio naoadequada">
                        <input name="btnRadio" type="radio" id="naoadequada" value="Não Adequada">
                        <label for="naoadequada">Não Adequada</label>
                    </li>

                    <li class="btnRadio adequada">
                        <input name="btnRadio" type="radio" id="adequada" value="Adequada">
                        <label for="adequada">Adequada</label>
                    </li>
                </ul>



                <div class="ClearBox"></div>
                <input type="submit" name="avancar" class="concluir" value="Salvar" style="float: left">
                <input type="submit" name="avancar" class="concluir" value="Concluir"  >


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
