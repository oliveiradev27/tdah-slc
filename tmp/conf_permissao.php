<?php 
    $pagina['titulo'] = 'Configuração';
    include_once('header.php');
?>
 <style>
     .select2-container--default .select2-selection--single .select2-selection__rendered {
         line-height: 34px;
         border-bottom: 1px solid;
         border-radius: 0px;
         background: #fff;
         font-weight: bold;
         font-size: 16px;
    } 
      .select2-container--default .select2-selection--single {
              background-color: #fff;
              border: 0;
              line-height: 34px;
      }
</style>
<section>
    <article>

        <div class="boxMain">
            <form name="ava_pac" method="post" action="../controller/login.php" >


                <div class="ClearBox"></div>

                <div class="ClearBox"></div>
                    <div class="ClearHr"><div class="icons_pro"></div></div>
               <h3> Responsável</h3>
                <select name="profissional_id" id="profissional_id" required class="tmp_p tmp_w">
                  
                </select>                
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
       getProfissionais();
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

       $('#profissional_id').select2();
    });
    
    function selecionaProfissional(id, registro)
    {
       $('#responsavel').val(registro);
       $('#profissional_id').val(id);
       $('#modal-table').dialog("close");
       $('#modal-table tbody tr').remove();            
    }

    function getProfissionais(){
      $.get('../controller/profissional.php?id=&single=1',
            function(data)
            {
               data = JSON.parse(data);
               var html = "";
               for (var i = 0; i < data.length; i++) {
                   html += "<option value=\""+data[i].profissional_id +"\">";
                   html +=    data[i].nome+" - "+data[i].numero;
                   html +=  "</option>";
               }
               $('#profissional_id').append(html);
        });
    }

    </script>
    </div>
</html>