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

        <div class="boxMain">
            <h3> Aplicar Testes</h3>
            <select class="tmp" name="avaliacao" >
                <option value="pedagogia">Pedagógia</option>
                <option value="cognitivo">Cognitivo</option>
                <option value="afetivo">Afetivo </option>
                <option value="psicomotor">Psicomotor</option>
            </select>
            <div class="ClearBox"></div>
            <h3> Paciente</h3>
            <input type="text" name="paciente" class="tmp_p" value="Marcos" >
            <input type="submit" name="localiza" class="submit"  >
            <div class="ClearBox"></div>

            <ul>
                <li>
                    <a href="../tmp/apl_categoria.php">
                        <img src="../img/Male-User-48.png">
                        <strong>P051 - Marcos José Teixeira <br>
                            <span>Teste realizados</span>-<span>Escrita</span>
                        </strong>

                    </a>
                    <input type="checkbox" >
                </li>

                <li>
                    <a href="../tmp/apl_categoria.php">
                        <img src="../img/Male-User-48.png">
                        <strong>P027 - Alberto Marcos Teixeira <br>
                            <span>Teste realizados</span>-<span>Nenhum</span>
                        </strong>

                    </a>
                    <input type="checkbox" >
                </li>


            </ul>

            <div class="ClearBox"></div>
        </div>


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
    <div class="Pacien"  style="display: none">
        <img src="../img/Male-User-32.png" class="img_prof"/>
        <p>
            Marcos José Teixeira<br />
            P 051</p>
    </div>
</footer>
</body>
</html>
