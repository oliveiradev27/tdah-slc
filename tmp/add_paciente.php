<?php 
$pagina['titulo'] = 'Paciente';
require_once('header.php');
$paciente_id = "";
if(isset($_GET['paciente_id']))
    $paciente_id = $_GET['paciente_id'];
 ?>
<section>
    <article>

        <div class="boxMain">
            <form name="ava_pac" method="post" action="index.php" >
                <div>
                    <div style="float: left;">
                        <img src="../img/people.png">
                    <div style="float: right;width: 360px;">
                        <input type="hidden" name="paciente_id" id="paciente_id" value="<?php echo $paciente_id ?>">
                        <input type="text" name="nome"  id="nome" placeholder="Nome:" required class="tmp_p tmp_w" value="" style="border: 1px solid">
                        <div class="ClearBox"></div>
                        <input type="date" name="data" id="data" required class="tmp_p tmp_w" value="" style="width: 200px;border: 1px solid">
                        <input type="button" name="localiza" class="submit_calen">
                    </div>

                </div>
                <div class="ClearBox"></div>
                <div class="ClearHr"><div class="icons_peo"></div></div>
                <div class="ClearBox"></div>
                <h3> Responsável</h3>
                <select name="responsavel_id" id="responsavel_id" required class="tmp_p tmp_w" style="width: 310px">
                  <option value="" selected> ----- </option>
                </select>
                <input type="button" name="localiza" class="submit_cont" style="float: right;" >
                <div class="ClearBox"></div>
                <h3>Vínculo</h3>
                <select name="filiacao" id="filiacao" placeholder="Filiação" required class="tmp_p tmp_w" style="width: 370px">
                    <option value=""> ----- </option>
                    <option value="pai">Pai</option>
                    <option value="mae">Mãe</option>
                    <option value="outros">Outros</option>
                </select>
                <div class="ClearBox"></div>
                <input type="submit" name="avancar" class="concluir" value="Concluir"  >
                <div class="ClearBox"></div>
            </form>
        </div>

        <div class="ClearBox"></div>
    </article>
    <div class="ClearBox"></div>
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
</section>   <div class="ClearBox"></div>
<?php require_once('footer.php') ?>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        carregaSelectResponsavel();
        $('#responsavel_id').select2();


        $('[name="ava_pac"]').on('submit', function(event) {
            event.preventDefault();
            var paciente_id = $('#paciente_id').val();
            if (paciente_id == "")
                inserir();     

        });


        function inserir() {
            var responsavel_id         = $('#responsavel_id').val();
            var nome                   = $('#nome').val();
            var data                   = $('#data').val();
            var descricao_filiacao     = $('#filiacao').val();

            $.post('../controller/paciente.php',
                     {
                        responsavel_id     : responsavel_id,
                        nome               : nome,
                        data               : data,
                        descricao_filiacao : descricao_filiacao
                     },
                      function (data, textStatus, xhr) {
                      if (data){
                            data = JSON.parse(data);
                            $('#paciente_id').val(data);
                            $("#mensagem p").text("Cadastrado com Sucesso!");
                            $("#mensagem small").text("Dados salvos na aplicação.");
                            $("#mensagem").dialog({
                                show : {effect: 'fade', speed: '1500'},
                                hide : {effect: 'fade', speed: '1000'},
                                buttons: {
                                    OK: function() {
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
                                        $(this).dialog("close");
                                    }
                                }
                            });
                    }
            });
        }

        function carregaSelectResponsavel() {
            $.get('../controller/responsavel.php?nome')
             .done(function(data){
                if (data){
                    data = JSON.parse(data);
                    var html = "";
                    var qtdResponsaveis = data.length-1;
                    for (var i = 0; i < qtdResponsaveis; i++){
                        html +=  '<option value="'+data[i].responsavel_id+'">';
                        html +=     data[i].nome+' - '+data[i].cpf;
                        html +=  '</option>';
                    }

                    $('#responsavel_id').append(html);
                }
             });
        }
    });    
</script>