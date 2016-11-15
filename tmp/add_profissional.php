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
include('header.php');
 ?>
<section>
    <article>

        <div class="boxMain">
            <form name="ava_pac" method="post" action="profissional.php" >
               <div>
                   <div style="float: left;">
                        <img src="../img/people.png">


                   </div>

                   <div style="float: right;width: 360px;">

                       <input type="text" name="nome" placeholder="Digite o nome:" class="tmp_p tmp_w" value="" style="border: 1px solid">
                       <div class="ClearBox"></div>
                       <input type="text" name="telefones" class="tmp_p tmp_w" value="" style="width: 200px;border: 1px solid">
                       <input type="button" name="localiza" class="submit_calen"  >
                   </div>

               </div>


                <div class="ClearBox"></div>
                <select class="tmp tmp_phone" name="cat_registro" >
                    <option disabled selected>Registro </option>
                    <option value="CRP">CRP</option>
                    <option value="CRM">CRM</option>
                </select>
                <input type="text" name="telefones" class="tmp_p tmp_w" value=""  style="width: 200px">
                <div class="ClearHr"><div class="icons_p"></div></div>
                <h3> Filial</h3>
                <input type="text" name="filia" class="tmp_p tmp_w" value="" style="width: 360px" >
                <input type="button" name="localiza-empresa" id="localiza-empresa" class="submit"  >
                <div class="ClearHr"><div class="icons_t"></div></div>
                <div id="info-contatos-tel">
                    <select class="tmp tmp_phone" name="telefones" >
                        <option value="Celular">Celular </option>
                        <option value="Celular2">Celular 2</option>
                    </select>
                    <input type="text" name="telefones" class="tmp_p tmp_w" value="" >
                    <input type="button" name="localiza" class="submit_more" >
                </div>
                <div class="ClearHr"><div class="icons_mail"></div></div>
                <select class="tmp tmp_phone" name="email" >
                    <option value="E-mail" selected>E-mail </option>
                </select>
                <input type="text" name="email" class="tmp_p tmp_w" value="" >
                <!--<input type="submit" name="localiza" class="submit_more"  >-->
                <div class="ClearBox"></div>
                <input type="submit" name="avancar" class="avancar" value="Continuar"  >

                <div class="ClearBox"></div>
            </form>

        </div>

        <div class="ClearBox"></div>
    </article>
    <div class="ClearBox"></div>
</section>   <div class="ClearBox"></div>
<?php include('footer.php'); ?>
<script type="text/javascript">
    jQuery(document).ready(function($){
        $('.submit_more').on('click', function(event) {
            event.preventDefault();
            $('#info-contatos-tel').append('');
        });
        $('#avancar').on('click', function(event) {
            event.preventDefault();
            var contatos = new [];
            sessionStorage.setItem();
        }); 

        $('#localiza-empresa').on('click', function(event){
            $.get('../controller/empresa.php?get=all',
                function(data)
                {
                    data = JSON.parse(data);
                    
                }
            );

        });
    });
  
</script>
<div id="modal-table" title="Empresas" style="display:none; text-align:center;" >
<input type="text" name="search-empresa" value="" placeholder="Buscar">
<table border="0">
    <thead>
        <tr>
            <th>Nome</th>
            <th>CNPJ</th>
        </tr>  
    </thead>
    <tbody>
           
    </tbody>
</table>
</div>
</html>
