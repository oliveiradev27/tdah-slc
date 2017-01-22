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
                       <input type="date" name="data" class="tmp_p tmp_w" value="" style="width: 200px;border: 1px solid">
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
                <input type="hidden" name="empresa_id" id="empresa_id" class="tmp_p tmp_w" >
                <input type="text" name="filial" id="filial" class="tmp_p tmp_w" value="" style="width: 360px" >
                <input type="button" name="localiza-empresa" id="localiza-empresa" class="submit"  >
                <div class="ClearHr"><div class="icons_t"></div></div>
                <div id="info-contatos-tel">
                    <select class="tmp tmp_phone" name="telefones" >
                        <option value="Celular">Telefone</option>
                        <option value="Celular2">Celular</option>
                    </select>
                    <input type="text" name="telefone1" class="tmp_p tmp_w" value="" onKeyPress="MascaraTelefone(ava_pac.telefone1)" maxlength="15" >
                    <input type="button" name="add-number" id="add-number" class="submit_more">
                    <div class="toggle-number">
                        <select class="tmp tmp_phone" name="telefones" >
                            <option value="Celular">Telefone</option>
                            <option value="Celular2">Celular</option>
                        </select>
                        <input type="text" name="telefone2" class="tmp_p tmp_w" value="" onKeyPress="MascaraTelefone(ava_pac.telefone2)" maxlength="15" >
                    </div>
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
<script  type="text/javascript" src="../js/validations.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($){
        $('.submit_more').on('click', function(event) {
            event.preventDefault();
            $('#info-contatos-tel').append('');
        });
        $('#avancar').submit(function(event) {
            event.preventDefault();
            var contatos = new [];
            sessionStorage.setItem();
        }); 

        $('#localiza-empresa').on('click', function(event){
            $.get('../controller/empresa.php?get=all',
                function(data)
                {
                    data = JSON.parse(data);
                    console.log(data);
                    var html = "";
                    for(var i = 0; i < data.length; i++) {
                        html += "<tr id=\""+data[i].empresa_id +"\" style='font-size:9px'>id="+ data[i].cnpj +">";
                        html +=     "<td>"+ data[i].nome +"</td>";
                        html +=     "<td>"+ data[i].cnpj +"</td>";
                        html +=     "<td><button onclick=\"selecionaEmpresa("+ data[i].empresa_id +",'"+data[i].cnpj+" - "+ data[i].nome +"')\">Selecionar</button></td>";
                        html += "</tr>";
                    }
                        
                        $('#modal-table tbody').append(html);
                   $('#modal-table').dialog({
                       show: { effect: 'fade', speed: '1500' },
                       hide: { effect: 'fade', speed: '1000' },
                       buttons: {
                           OK: function() {
                                 $('input[name="valor"]').focus();
                                 $(this).dialog("close");
                                 $('#modal-table tbody tr').remove();
                             }
                          },
                      close: function() {
                          $('#modal-table tbody tr').remove();
                      }
                   });
                }
            );

        });

        $('#add-number').on('click', function(){
            var tel1 = $('input[name="telefone1"]').val();
            if(tel1 != "" && $('.toggle-number').css('display') == "none")
            {
                $('.toggle-number').toggle();
            }else if(tel1 != "" && $('.toggle-number').css('display') != "none") {

            } else {
                $("#mensagem p").text("Preencha o número principal!");
                 $("#mensagem small").text("");
                 $("#mensagem").dialog({
                        show: { effect: 'fade', speed: '1500' },
                        hide: { effect: 'fade', speed: '1000' },
                        buttons: {
                            OK: function() {
                                $(this).dialog("close");
                            }
                        }
                    });
            }

        });

        $("#search-empresa").keyup(function(){
            //pega o css da tabela 
            //var tabela = $(this).attr('alt');
            if( $(this).val() != ""){
                $("#modal-table  tbody>tr").hide();
                $("#modal-table  tbody>tr td:contains-ci('" + $(this).val() + "')").parent("tr").show();
            } else{
                $("#modal-table  tbody>tr").show();
            }
        }); 

        });
        $.extend($.expr[":"], {
        "contains-ci": function(elem, i, match, array) {
            return (elem.textContent || elem.innerText || $(elem).text() || "").toLowerCase().indexOf((match[3] || "").toLowerCase()) >= 0;
        }

  });
    function selecionaEmpresa(id, cnpj)
    {
       $('#filial').val(cnpj);
       $('#empresa_id').val(id);
       $('#modal-table').dialog("close");
       $('#modal-table tbody tr').remove();
             
    }
</script>
<div id="modal-table" title="Empresas" style="max-height:200px !important; display:none; text-align:center;" >
<input type="text" name="search-empresa" id="search-empresa" alt="lista-empresas" value="" placeholder="Buscar">
<table border="0" style="width:100%" class="lista-empresas">
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