<?php 
$pagina['titulo'] = 'Profissional';
include('header.php');
$profissional_id = "";
if(isset($_GET['id']))
    $profissional_id = $_GET['id'];
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
            <form name="ava_pac" method="post" action="profissional.php" >
                <input type="hidden" name="profissional_id" id="profissional_id" value="<?php echo $profissional_id ?>">
               <div>
                   <div style="float: left;">
                        <img src="../img/people.png">
                   </div>
                   <div style="float: right;width: 360px;">
                       <input type="text" name="nome" id="nome" placeholder="Nome do Profissional" class="tmp_p tmp_w" value="" style="border: 1px solid" required>
                       <div class="ClearBox"></div>
                       <input type="date" name="data" class="tmp_p tmp_w" value="" style="width: 200px;border: 1px solid" required>
                       <input type="button" name="localiza" class="submit_calen"  >
                   </div>

               </div>
                <input type="hidden" name="registro_id" id="registro_id" value="">
                <div class="ClearBox"></div>
                <select class="tmp tmp_phone" name="cat_registro" required>
                    <option value="">Registro</option>
                    <option value="CRP">CRP</option>
                    <option value="CRM">CRM</option>
                </select>
                <input type="text" name="registro" class="tmp_p tmp_w" placeholder="ex: número do CRP"value=""  style="width: 200px" required>
                <div class="ClearHr"><div class="icons_p"></div></div>
                <h3>Filial</h3>
                <select name="filial" id="filial" class="tmp_p tmp_w">
                    <option value=""> ----- </option>
                </select>
                <div class="ClearHr"><div class="icons_con"></div></div>                
                <h3>CPF</h3>
                <input type="text" name="documento" id="cpf" class="tmp_p tmp_w" required placeholder="___.___.___-__" onKeyPress="MascaraCPF(ava_pac.documento);" maxlength="14" value="" style="width: 142px">
                <div class="ClearBox"></div>
                <h3>E-mail</h3>
                <input type="email" name="email" id="email" class="tmp_p tmp_w" value="" required placeholder="ex: nome@dominio.com">
                <div class="ClearBox"></div>
                <div id="info-contatos-tel">
                    <select class="tmp tmp_phone" name="telefone_tipo" >
                        <option value="telefone">Telefone</option>
                        <option value="celular">Celular</option>
                    </select>
                    <input type="text" name="telefone" class="tmp_p tmp_w" value="" onKeyPress="MascaraTelefone(ava_pac.telefone)" maxlength="15" required style="width: 160px" placeholder="(00) 00000-0000">
                    <input type="button" name="add-number" id="add-number" class="submit_more" title="Clique aqui para adicionar mais um número.">
                     <div class="ClearBox"></div>
                    <div class="toggle-number">
                        <select class="tmp tmp_phone" name="telefone_tipo2" >
                            <option value="telefone2">Telefone</option>
                            <option value="celular2">Celular</option>
                        </select>
                        <input type="text" name="telefone2" class="tmp_p tmp_w" value="" onKeyPress="MascaraTelefone(ava_pac.telefone)" maxlength="15" required placeholder="(00) 00000-0000" >
                    </div>
                </div>
                <input type="hidden" name="endereco_id" id="endereco_id" value="">
                <div class="ClearHr"><div class="icons_hom"></div></div>
                <h3> CEP</h3>
                <input type="text" name="cep" id="cep" placeholder="00000-000" required class="tmp_p tmp_w" value="" style="width: 110px;font-weight: 500;padding: 0 3px" onKeyPress="MascaraCep(ava_pac.cep);"  maxlength="9" >
                <div class="ClearBoxli"></div>
                <h3> Endereço</h3>
                <input type="text" name="endereco" id="endereco" placeholder="ex: Rua João Carlos" class="tmp_p tmp_w" value="" style="width: 365px;font-weight: 500;padding: 0 3px" >
                <div class="ClearBoxli"></div>
                <h3> Número</h3>
                <input type="text" name="numero" id="numero" placeholder="Nº:" class="tmp_p tmp_w" value="" style="width: 100px;font-weight: 500;padding: 0 3px" >
                <div class="ClearBoxli"></div>
                <h3> Complemento</h3>
                <input type="text" name="complemento" id="complemento" placeholder="ex: Bloco A - Apto. 100" class="tmp_p tmp_w" value="" style="width: 335px;font-weight: 500;padding: 0 3px" >
                <div class="ClearBoxli"></div>
                <h3> Bairro</h3>
                <input type="text" name="bairro" id="bairro" placeholder="ex: Belém" class="tmp_p tmp_w" value="" style="width: 395px;font-weight: 500;padding: 0 3px" >
                <div class="ClearBoxli"></div>
                <h3> Cidade</h3>
                <input type="text" name="cidade" id="cidade" placeholder="ex: São Paulo" class="tmp_p tmp_w" value="" style="width: 390px;font-weight: 500;padding: 0 3px" >
                <div class="ClearBoxli"></div>
                <h3> Estado</h3>
                <select class="tmp tmp_phone" name="uf" id="estado" style="width:390px;font-weight: 500;padding: 0 3px;background: #FFF;" required>
                    <option value="" disabled selected>----</option>
                    <option value="AC">Acre (AC)</option>
                    <option value="AL">Alagoas (AL)</option>
                    <option value="AP">Amapá (AP)</option>
                    <option value="AM">Amazonas (AM)</option>
                    <option value="BA">Bahia (BA)</option>
                    <option value="CE">Ceará (CE)</option>
                    <option value="DF">Distrito Federal (DF)</option>
                    <option value="ES">Espírito Santo (ES)</option>
                    <option value="GO">Goiás (GO)</option>
                    <option value="MA">Maranhão (MA)</option>
                    <option value="MT">Mato Grosso (MT)</option>
                    <option value="MS">Mato Grosso do Sul (MS)</option>
                    <option value="MG">Minas Gerais (MG)</option>
                    <option value="PR">Pará (PA)</option>
                    <option value="PB">Paraíba (PB)</option>
                    <option value="PA">Paraná (PR)</option>
                    <option value="PE">Pernambuco (PE)</option>
                    <option value="PI">Piauí (PI)</option>
                    <option value="RJ">Rio de Janeiro (RJ)</option>
                    <option value="RN">Rio Grande do Norte (RN)</option>
                    <option value="RS">Rio Grande do Sul (RS)</option>
                    <option value="RO">Rondônia (RO)</option>
                    <option value="RR">Roraima (RR)</option>
                    <option value="SC">Santa Catarina (SC)</option>
                    <option value="SP">São Paulo (SP)</option>
                    <option value="SE">Sergipe (SE)</option>
                    <option value="TO">Tocantins (TO)</option>
                </select>
                <div class="ClearBox"></div>
                <input type="submit" name="avancar" class="avancar" value="Concluir"  >

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
        carregaSelectEmpresas();
        buscar();

        $('.submit_more').on('click', function(event) {
            event.preventDefault();
            $('#info-contatos-tel').append('');
        });

        $('#filial').select2();

        $('#add-number').on('click', function(){
            var tel1 = $('input[name="telefone"]').val();
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

        $('#cep').keyup(function(){
            var cep = $(this).val();
            if(cep.length == 9){
                cep = cep.replace('-','');
                console.log(cep);
                $.getJSON("http://viacep.com.br/ws/"+cep+"/json/")
                .done(function(dados){
                    if(!("erro" in dados))
                    {
                        console.log(dados);
                        $('#endereco').val(dados.logradouro);
                        $('#bairro').val(dados.bairro);
                        $('#complemento').val(dados.complemento);
                        $('#cidade').val(dados.localidade);
                        $('#estado').val(dados.uf);
                    }
               }).fail(function(jqxhr, textStatus, error){
                    var erro = textStatus+ ' - '+ error;
                });
            }
        });

        $('#cpf').keyup(function(){
            var cpf = $(this).val();
            console.log(cpf.length);
            if(cpf.length == 14)
                 ValidarCPF(ava_pac.documento);
            
        });

        $('form[name="ava_pac"]').submit(function(event){
            event.preventDefault();
            if($('#profissional_id').val() != ""){
                 $("#mensagem p").text("Deseja os atualizar os dados?");
                 $("#mensagem small").text("Clique em OK para Atualizar dados. Novo para iniciar com um novo cadastro.");
                 $("#mensagem").dialog({
                                show : {effect: 'fade', speed: '1500'},
                                hide : {effect: 'fade', speed: '1000'},
                                buttons: {
                                    OK: function() {
                                        $('input[name="valor"]').focus();
                                        $(this).dialog("close");
                                        alterar();
                                    },
                                    Novo: function() {
                                        $('input[name="valor"]').focus();
                                        $(this).dialog("close");
                                        window.location = "add_profissional.php";
                                    },
                                    Cancelar: function() {
                                        $('input[name="valor"]').focus();
                                        $(this).dialog("close");
                                    },
                                }
                            });
             } else {

                 $.get("../controller/profissional.php?cpf="+$('#cpf').val())
                      .done(function(data){
                            data = JSON.parse(data);
                            if(data == true){
                                $("#mensagem p").text("CPF já Cadastrado!");
                                $("#mensagem small").text("");
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
                                inserir();
                            }
                      });
             }            
        });

        function verificarCPF(cpf){
            console.log(cpf.value);
            var valido = ValidarCPF(cpf);
            console.log(valido);
            if(ValidarCPF(cpf)){
                $.get('../controller/profissional.php?cpf='+cpf.value)
                 .done(function(data){
                    data = JSON.parse(data);
                    if(data == true)
                    {
                        $("#mensagem p").text("CPF já Cadastrado!");
                        $("#mensagem small").text("");
                        $("#mensagem").dialog({
                            show : {effect: 'fade', speed: '1500'},
                            hide : {effect: 'fade', speed: '1000'},
                            buttons: {
                                OK: function() {
                                        $(this).dialog("close");
                                         $('#cpf').val("")
                                                  .focus();
                                    }
                                }
                        });

                        $('#cpf-validador').val("1");
                     } else {
                        $('#cpf-validador').val("0");
                     }     
                });
            } else {
               $('#cpf-validador').val("0");
            }
        }
        
        function buscar()
        {
            var id = $('#profissional_id').val();
            if(id != ""){
              $.get("../controller/profissional.php?id="+id,
                function(data){
                if(data)
                {
                    data = JSON.parse(data);
                    console.log(data);
                    $('[name="nome"]').val(data.nome);
                    $('[name="tipo_documento"]').val();
                    $('[name="documento"]').val(data.cpf);
                    $('[name="data"]').val(data.data_nascimento);
                    $('#filial').val(data.empresa_id).trigger('change');
                    $('#telefones').val(JSON.stringify(data.contato));
                    $('#endereco').val(data.endereco.logradouro);
                    $('#bairro').val(data.endereco.bairro);
                    $('#numero').val(data.endereco.numero);
                    $('#complemento').val(data.endereco.complemento);
                    $('#cidade').val(data.endereco.cidade);
                    $('#estado').val(data.endereco.uf);
                    $('#cep').val(data.endereco.cep);
                    $('#registro_id').val(data.registro.registro_id);
                    $('#empresa_id').val(data.empresa_id).trigger('change');
                    $('#email').val(data.email);
                    $('#endereco_id').val(data.endereco.endereco_id);
                    $('[name = "cat_registro"]').val(data.registro.tipo);
                    $('[name = "registro"]').val(data.registro.numero);
                   }
                });

                $.get('../controller/contato_profissional.php?profissional_id='+id,
                    function(data){
                    data = JSON.parse(data);
                    if (data.length > 0){
                        $('[name="telefone_tipo"]').val(data[0].tipo);
                        $('[name="telefone"]').val(data[0].valor);
                        if (data.length > 1){
                            $('#add-number').click();
                            $('[name="telefone_tipo2"]').val(data[1].tipo);
                            $('[name="telefone2"]').val(data[1].valor);
                        }
                    }
                });
            }
        }


        });

    function inserir(){
            var nome            = $('#nome').val();
            var empresa_id      = $('#filial').val();
            var email           = $('#email').val();
            var data_nascimento = $('[name="data"]').val();
            var cpf             = $('#cpf').val();
            var cep             = $('#cep').val();
            var endereco        = $('#endereco').val();
            var numero          = $('#numero').val();
            var bairro          = $('#bairro').val();
            var complemento     = $('#complemento').val();
            var cidade          = $('#cidade').val();
            var estado          = $('#estado').val();
            var cat_registro    = $('[name = "cat_registro"]').val();
            var registro        = $('[name = "registro"]').val();
            var contatos        = [
                                    [$('[name="telefone_tipo"]').val(), $('[name="telefone"]').val()],
                                    [$('[name="telefone_tipo2"]').val(), $('[name="telefone2"]').val()]
                                  ];
            contatos = JSON.stringify(contatos);

            $.post('../controller/profissional.php',
                    {
                        nome            : nome,
                        cpf             : cpf,
                        email           : email,
                        empresa_id      : empresa_id,
                        data_nascimento : data_nascimento,
                        telefones       : contatos,
                        cep             : cep,
                        logradouro      : endereco,
                        numero          : numero,
                        bairro          : bairro,
                        complemento     : complemento,
                        cidade          : cidade,
                        uf              : estado,
                        registro        : registro,
                        cat_registro    : cat_registro,
                    }, function(data, textStatus, xhr) {
                        if(data)
                        if(data){
                            
                            $('#profissional_id').val(data);

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

    function alterar(){
            var profissional_id = $('#profissional_id').val();
            var nome            = $('#nome').val();
            var empresa_id      = $('#filial').val();
            var email           = $('#email').val();
            var data_nascimento = $('[name="data"]').val();
            var cpf             = $('#cpf').val();
            var endereco_id     = $('#endereco_id').val();
            var cep             = $('#cep').val();
            var endereco        = $('#endereco').val();
            var numero          = $('#numero').val();
            var bairro          = $('#bairro').val();
            var complemento     = $('#complemento').val();
            var cidade          = $('#cidade').val();
            var estado          = $('#estado').val();
            var registro_id     = $('#registro_id').val();
            var cat_registro    = $('[name = "cat_registro"]').val();
            var registro        = $('[name = "registro"]').val();
            var contatos        = [
                                    [$('[name="telefone_tipo"]').val(), $('[name="telefone"]').val()],
                                    [$('[name="telefone_tipo2"]').val(), $('[name="telefone2"]').val()]
                                  ];
            contatos = JSON.stringify(contatos);
            console.log(empresa_id);
            $.post('../controller/profissional.php',
                    {
                        profissional_id : profissional_id,
                        nome            : nome,
                        cpf             : cpf,
                        email           : email,
                        empresa_id      : empresa_id,
                        data_nascimento : data_nascimento,
                        telefones       : contatos,
                        endereco_id     : endereco_id,
                        cep             : cep,
                        logradouro      : endereco,
                        numero          : numero,
                        bairro          : bairro,
                        complemento     : complemento,
                        cidade          : cidade,
                        uf              : estado,
                        registro_id     : registro_id,
                        registro        : registro,
                        cat_registro    : cat_registro
                    }, function(data, textStatus, xhr) {
                        if(data)
                        if(data){
                            
                            $('#profissional_id').val(data);

                            $("#mensagem p").text("Salvo com Sucesso!");
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

    function carregaSelectEmpresas() {
        $.get('../controller/empresa.php?get=all',
                function(data)
                {
                    data = JSON.parse(data);
                    console.log(data);
                    var html = "";
                    for(var i = 0; i < data.length; i++) {
                        html += "<option value=\""+data[i].empresa_id +"\" >";
                        html +=     data[i].nome +" - "+ data[i].cnpj;
                        html += "</option>";    
                    }

                    $('#filial').append(html);
                }
        );
    }
</script>
