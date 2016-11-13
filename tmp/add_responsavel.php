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
        <label for="button" onclick><div class="Link icon_p" ><a href="javascript:window.history.go(-1)">Responsável</a></div></label>
        <div class="linkPainel icon_p" ><a href="javascript:window.history.go(-1)">Responsável</a></div>
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
            <form name="ava_pac" method="post" action="index.php" >


                <div class="ClearBox"></div>
                <select class="tmp tmp_phone" name="cat_filiacao" style="width: 90px;">
                    <option >Filiação </option>
                    <option value="Pai">Pai</option>
                    <option value="Mão">Mão</option>
                </select>
                <input type="text" name="filiacao" class="tmp_p tmp_w" value=""  style="width: 305px">
                <input type="submit" name="filiacao" class="submit_more"  >
                <div class="ClearBox"></div>
                <select class="tmp tmp_phone" name="cat_registro" style="width: 120px;" >
                    <option >Documento </option>
                    <option value="CPF">CPF</option>
                    <option value="RG">RG</option>
                </select>
                <input type="text" name="telefones" class="tmp_p tmp_w" value=""  style="width: 200px">
                <input type="submit" name="localiza" class="submit_more"  >
                <div class="ClearHr"><div class="icons_t"></div></div>
                <select class="tmp tmp_phone" name="telefones" >
                    <option value="Celular">Celular </option>
                    <option value="Celular2">Celular 2</option>
                    <option value="Telefone">Telefone </option>
                    <option value="Telefone2">Telefone 2 </option>
                </select>
                <input type="text" name="telefones" class="tmp_p tmp_w" value="" >
                <input type="submit" name="localiza" class="submit_more"  >
                <div class="ClearHr"><div class="icons_mail"></div></div>
                <select class="tmp tmp_phone" name="email" >
                    <option value="E-mail">E-mail </option>
                    <option value="E-mail2">E-mail 2</option>
                </select>
                <input type="text" name="email" class="tmp_p tmp_w" value="" >
                <input type="submit" name="localiza" class="submit_more"  >

                <div class="ClearHr"><div class="icons_hom"></div></div>
                <h3> CEP</h3>
                <input type="text" name="cep" class="tmp_p tmp_w" value="" style="width: 110px;font-weight: 500;padding: 0 3px" >
                <div class="ClearBoxli"></div>
                <h3> Endereço</h3>
                <input type="text" name="endereco" class="tmp_p tmp_w" value="" style="width: 365px;font-weight: 500;padding: 0 3px" >
                <div class="ClearBoxli"></div>
                <h3> Número</h3>
                <input type="text" name="numero" class="tmp_p tmp_w" value="" style="width: 100px;font-weight: 500;padding: 0 3px" >
                <div class="ClearBoxli"></div>
                <h3> Complemento</h3>
                <input type="text" name="complemento" class="tmp_p tmp_w" value="" style="width: 335px;font-weight: 500;padding: 0 3px" >
                <div class="ClearBoxli"></div>
                <h3> Bairro</h3>
                <input type="text" name="bairro" class="tmp_p tmp_w" value="" style="width: 395px;font-weight: 500;padding: 0 3px" >
                <div class="ClearBoxli"></div>
                <h3> Cidade</h3>
                <input type="text" name="cidade" class="tmp_p tmp_w" value="" style="width: 390px;font-weight: 500;padding: 0 3px" >
                <div class="ClearBoxli"></div>
                <h3> Estado</h3>
                <input type="text" name="estado" class="tmp_p tmp_w" value="" style="width:390px;font-weight: 500;padding: 0 3px" >
                <div class="ClearBoxli"></div>
                <div class="ClearBox"></div>

                <div class="ClearBox"></div>

                <input type="submit" name="avancar" class="concluir" value="Concluir"  >




                <div class="ClearBox"></div>
            </form>
        </div>

        <div class="ClearBox"></div>
    </article>
    <div class="ClearBox"></div>
</section>   <div class="ClearBox"></div>
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
