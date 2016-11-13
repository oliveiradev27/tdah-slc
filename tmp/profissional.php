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
<?php
 $pagina['titulo'] = 'Profissional';
 include('header.php'); ?>
<section>
    <article>

        <div class="boxMain">
            <form name="ava_pac" method="post" action="index.php" >
                <div>
                    <div style="float: left;">
                        <img src="../img/people.png">


                    </div>

                    <div style="float: right;width: 360px;">

                        <input type="text" name="telefones" class="tmp_p" value="Andrea Voltar">
                        <div class="ClearBox"></div>
                        <input type="text" name="telefones" class="tmp_p" value="01/01/0001" style="width: 200px;">
                        <input type="submit" name="localiza" class="submit_calen"  >
                    </div>

                </div>


                <div class="ClearBox"></div>
                <select class="tmp tmp_phone" name="cat_registro" >
                    <option >Registro </option>
                    <option value="CRP" selected>CRP</option>
                    <option value="CRM">CRM</option>
                </select>
                <input type="text" name="telefones" class="tmp_p" value="00000"  style="width: 200px">
                <div class="ClearHr"><div class="icons_con"></div></div>
                <select class="tmp tmp_phone" name="email" STYLE="width: 110px">
                    <option>Documento </option>
                    <option value="CPF">CPF</option>
                    <option value="RG">RG</option>
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

                <input type="submit" name="avancar" class="concluir" value="Concluir"  >




                <div class="ClearBox"></div>
            </form>
        </div>

        <div class="ClearBox"></div>
    </article>
    <div class="ClearBox"></div>
</section>
<div class="ClearBox"></div>
<?php include('footer.php'); ?>
</html>