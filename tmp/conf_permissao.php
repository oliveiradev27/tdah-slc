<?php 
    $pagina['titulo'] = 'Configuração';
    include_once('header.php');
?>
<section>
    <article>

        <div class="boxMain">
            <form name="ava_pac" method="post" action="../controller/login.php" >


                <div class="ClearBox"></div>

                <div class="ClearBox"></div>
                    <div class="ClearHr"><div class="icons_pro"></div></div>
               <h3> Responsável</h3>
                <input type="hidden" id="profissional_id" name="profissional_id">
                <input type="text" id="responsavel" name="responsavel" required class="tmp_p tmp_w" value="" style="width: 310px" >
                <input type="button" id="localiza-profissional" name="localiza" class="submit_cont"  >
                <div class="ClearHr"><div class="icons_con"></div></div>
                 <h3>Login</h3>
               
               <input type="text" name="login" class="tmp_p tmp_w" value="" required style="width: 210px" >
               <select class="tmp tmp_phone" name="permissao" style="width: 110px;margin-left: 30px;" required>
                    <option selected>Permissão </option>
                    <option value="1">Gerente</option>
                    <option value="2">Psicologo</option>
                    <option value="3">Administrador</option>
                </select>
                <div class="ClearBox"></div>
               <h3>Senha</h3>
               
               <input type="password" name="password" class="tmp_p tmp_w" value=""  required style="width: 210px" >
  

                <div class="ClearHr"><div class="icons_ch"></div></div>
            <div class="ClearBox"></div>
            <h3>Registre chave de liberação</h3>
            <input type="password" name="chave" class="tmp tmp_w" value="" min="4" max="6" required>

            <div class="ClearBox"><div class="icons_Avi" style="line-height: 19px;">Digite número de 4 a 6 digitos para liberação a aplicações de teste a pacientes.</div></div>
            <div class="ClearBox"></div>
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
<?php  include_once('footer.php'); ?>
<script type="text/javascript">
  $('document').ready(function(){

       $('[name="ava_pac"]').on('submit', function(event){
           event.preventDefault();
           var login            = $('[name="login"]').val();
           var senha            = $('[name="password"]').val();
           var profissional_id  = $('#profissional_id').val();
           var permissao        = $('[name="permissao"]').val();
           var chave            = $('[name="chave"]').val();
            $.post('../controller/login.php', 
                {
                    login           : login,
                    senha           : senha,
                    profissional_id : profissional_id,
                    permissao       : permissao,
                    chave           : chave 
                }, function(data){
                        data = JSON.parse(data);
                        if(data){
                            $('#id').val(data);
                            $("#mensagem p").text("Cadastrado com Sucesso!");
                            $("#mensagem small").text("Dados salvos na aplicação.");
                            $("#mensagem").dialog({
                                show : {effect: 'fade', speed: '1500'},
                                hide : {effect: 'fade', speed: '1000'},
                                buttons: {
                                    OK: function() {
                                        $('input[name="valor"]').focus();
                                        $(this).dialog("close");
                                    }
                                }
                            });
                        } else {
                            $("#mensagem p").text("Erro!");
                            $("#mensagem small").text("Não foi possivel salvar as informações.");
                            $("#mensagem").dialog({
                                show : {effect: 'fade', speed: '1500'},
                                hide : {effect: 'fade', speed: '1000'},
                                buttons: {
                                    OK: function() {
                                        $('input[name="valor"]').focus();
                                        $(this).dialog("close");
                                    }
                                }
                            });
                        }

                }
            );

       });

       $('#responsavel').focus(function(){
           $('#localiza-profissional').click()
                                      .focus();
        });

        $('#localiza-profissional').on('click', function(event){
            $.get('../controller/profissional.php?id=&single=1',
                function(data)
                {
                    data = JSON.parse(data);
                    console.log(data);
                    var html = "";
                    for(var i = 0; i < data.length; i++) {
                        html += "<tr id=\""+data[i].profissional_id +"\" style='font-size:9px'>id="+ data[i].cnpj +">";
                        html +=     "<td>"+ data[i].nome +"</td>";
                        html +=     "<td>"+ data[i].tipo +" - "+data[i].numero+"</td>";
                        html +=     "<td><button onclick=\"selecionaProfissional("+ data[i].profissional_id +",'"+ data[i].nome +"')\">Selecionar</button></td>";
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

    function selecionaProfissional(id, registro)
    {
       $('#responsavel').val(registro);
       $('#profissional_id').val(id);
       $('#modal-table').dialog("close");
       $('#modal-table tbody tr').remove();            
    }
    </script>
    <div id="modal-table" title="Profissionais" style="max-height:200px !important; display:none; text-align:center;" >
        <input type="text" name="search-empresa" id="search-empresa" alt="lista-empresas" value="" placeholder="Buscar">
        <table border="0" style="width:100%" class="lista-empresas">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Registro</th>
                </tr>  
            </thead>
            <tbody>
                
            </tbody>
        </table>
    </div>
</html>