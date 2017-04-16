<?php 
$pagina['titulo'] = 'Responsável';
include_once('header.php');

$responsavel_id = "";
if(isset($_GET['id']))
    $responsavel_id = $_GET['id'];



 ?>
<section>
    <article>

        <div class="boxMain">
            <form name="ava_pac" method="post" action="../controller/responsavel.php" >
                <input type="hidden" name="responsavel_id" id="responsavel_id" value="<?php echo $responsavel_id ?>">
                <div class="ClearHr"><div class="icons_peo">Responsável</div></div>
                <h3>Nome:</h3>
                <input type="text" name="nome" id="nome" placeholder="ex: Antonio Carlos" required class="tmp_p tmp_w" value=""  style="width: 390px">
                <div class="ClearBox"></div>
                <h3>Data de nascimento:</h3>
                <input type="date" name="data_nascimento" class="tmp_p" value="" style="width: 180px;">

                <div class="ClearBox"></div>
                <h3>CPF</h3>
                <input type="text" name="cpf" id="cpf" placeholder="___.___.___-__" required class="tmp_p tmp_w" value=""  style="width: 142px" onKeyPress="MascaraCPF(ava_pac.cpf);" maxlength="14">
                <div class="ClearBox" ><div class="icons_t" style="display: none"></div></div>
                <div id="info-contatos-tel">
                    <input type="hidden" name="telefone_id1" id="telefone_id1" value="">
                    <select class="tmp tmp_phone" name="telefone_tipo" >
                        <option value="telefone">Telefone</option>
                        <option value="celular">Celular</option>
                    </select>
                    <input type="text" name="telefone" class="tmp_p tmp_w" placeholder="(00) 00000-0000" value="" onKeyPress="MascaraTelefone(ava_pac.telefone)" maxlength="15" required>
                    <input type="button" name="add-number" id="add-number" class="submit_more" title="Clique aqui para adicionar mais um número.">
                    <div class="toggle-number">
                        <input type="hidden" name="telefone_id2" id="telefone_id2" value="">
                        <select class="tmp tmp_phone" name="telefone_tipo2" >
                            <option value="telefone">Telefone</option>
                            <option value="celular">Celular</option>
                        </select>
                        <input type="text" name="telefone2" class="tmp_p tmp_w" placeholder="(00) 00000-0000" value="" onKeyPress="MascaraTelefone(ava_pac.telefone2)" maxlength="15"  >
                    </div>
                </div>
                <div class="ClearBox"><div class="icons_mail" style="display: none"></div></div>
                <h3>E-mail</h3>
                <input type="email" name="email" id="email" placeholder="ex: nome@dominio.com" required class="tmp_p tmp_w" value="" >
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
                <div class="ClearBoxli"></div>
                <div class="ClearBox"></div>

                <div class="ClearBox"></div>

                <input type="submit" name="avancar" class="concluir" value="Concluir" >

                <div class="ClearBox"></div>
            </form>
        </div>

        <div class="ClearBox"></div>
    </article>
    <div class="ClearBox"></div>
</section>   <div class="ClearBox"></div>
<?php include_once('footer.php'); ?>
<script type="text/javascript" src="../js/validations.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        buscar();

        $('#add-number').on('click', function(){
            var tel1 = $('input[name="telefone"]').val();
            if(tel1 != "" && $('.toggle-number').css('display') == "none")
            {
                $('.toggle-number').toggle();
            } else if(tel1 != "" && $('.toggle-number').css('display') != "none") {

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

        $('#cpf').keyup(function(){
            var cpf = $(this).val();
            console.log(cpf.length);
            if(cpf.length == 14)
                 ValidarCPF(ava_pac.cpf);
            verificarCPF(cpf);
        });

        $('#email').blur(function(event) {
            var email = $(this).val();
            $.get("../controller/responsavel.php?email="+email)
                .done(function(data){
                   data = JSON.parse(data);
                   if(data == true){
                       $("#mensagem p").text("E-mail já Cadastrado!");
                       $("#mensagem small").text("");
                       $("#mensagem").dialog({
                            show : {effect: 'fade', speed: '1500'},
                            hide : {effect: 'fade', speed: '1000'},
                            buttons: {
                               OK: function() {
                                   $(this).dialog("close");
                                   $('#email').val('')
                                              .focus();
                               }
                           }
                       });
                   } 
             });
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

        $('[name="ava_pac"]').submit(function(event){
            event.preventDefault();

            if($('#responsavel_id').val() == ""){
             inserir();
            } else {
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
                                       window.location = "add_responsavel.php";
                                   },
                                   Cancelar: function() {
                                       $('input[name="valor"]').focus();
                                       $(this).dialog("close");
                                   },
                        }
                 });
            }
        });

        function inserir(){
            var responsavel_id  = $('#responsavel_id').val();
            var nome            = $('#nome').val();
            var email           = $('#email').val();
            var data            = $('[name="data_nascimento"]').val();
            var cpf             = $('#cpf').val();
            var cep             = $('#cep').val();
            var endereco        = $('#endereco').val();
            var numero          = $('#numero').val();
            var bairro          = $('#bairro').val();
            var complemento     = $('#complemento').val();
            var cidade          = $('#cidade').val();
            var estado          = $('#estado').val();
            var contatos        = [
                                    [$('[name="telefone_tipo"]').val(), $('[name="telefone"]').val()],
                                    [$('[name="telefone_tipo2"]').val(), $('[name="telefone2"]').val()]
                                  ];
            contatos = JSON.stringify(contatos);
            console.log(contatos);

            $.post('../controller/responsavel.php',
                    {
                        responsavel_id  : responsavel_id,
                        nome            : nome,
                        cpf             : cpf,
                        email           : email,
                        data            : data,
                        telefones       : contatos,
                        cep             : cep,
                        logradouro      : endereco,
                        numero          : numero,
                        bairro          : bairro,
                        complemento     : complemento,
                        cidade          : cidade,
                        uf              : estado,
                    },function(data, textStatus, xhr) {
                        if(data){
                            $('#responsavel_id').val(data);

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
            });

        }

        function alterar(){
            var responsavel_id  = $('#responsavel_id').val();
            var nome            = $('#nome').val();
            var email           = $('#email').val();
            var data            = $('[name="data_nascimento"]').val();
            var cpf             = $('#cpf').val();
            var cep             = $('#cep').val();
            var endereco_id     = $('#endereco_id').val();
            var endereco        = $('#endereco').val();
            var numero          = $('#numero').val();
            var bairro          = $('#bairro').val();
            var complemento     = $('#complemento').val();
            var cidade          = $('#cidade').val();
            var estado          = $('#estado').val();
            var contatos        = [
                                    [$('[name="telefone_tipo"]').val(), $('[name="telefone"]').val()],
                                    [$('[name="telefone_tipo2"]').val(), $('[name="telefone2"]').val()]
                                  ];

            contatos = JSON.stringify(contatos);
           
            $.post('../controller/responsavel.php',
                    {
                        responsavel_id  : responsavel_id,
                        nome            : nome,
                        cpf             : cpf,
                        email           : email,
                        data            : data,
                        telefones       : contatos,
                        endereco_id     : endereco_id,
                        cep             : cep,
                        logradouro      : endereco,
                        numero          : numero,
                        bairro          : bairro,
                        complemento     : complemento,
                        cidade          : cidade,
                        uf              : estado,
                    },function(data, textStatus, xhr) {
                        data = JSON.parse(data);
                        if(data){
                            $("#mensagem p").text("Salvo com Sucesso!");
                            $("#mensagem small").text("Dados salvos na aplicação.");
                            $("#mensagem").dialog({
                                show : {effect: 'fade', speed: '1500'},
                                hide : {effect: 'fade', speed: '1000'},
                                buttons: {
                                    OK: function() {
                                        $('input[name="valor"]').focus();
                                        $(this).dialog("close");
                                        if($('[name="telefone2"]').val() == "" && $('.toggle-number').css('display') != "none")
                                            $('.toggle-number').toggle();
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
            });

        }

        function verificarCPF(cpf) {
            $.get("../controller/responsavel.php?cpf="+cpf)
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
                                   $('#cpf').val('');
                               }
                           }
                       });
                   } 
             });
        }

        function buscar(){

            var responsavel_id  = $('#responsavel_id').val();
            if(responsavel_id != ""){
                $.get("../controller/responsavel.php?id="+responsavel_id)
                    .done(function(data){
                       data = JSON.parse(data);
                       if(data){
                            $('#nome').val(data.nome);
                            $('#email').val(data.email);
                            $('[name="data_nascimento"]').val(data.data_nascimento);
                            $('#cpf').val(data.cpf);
                            $('#cep').val(data.endereco.cep)
                            $('#endereco_id').val(data.endereco.endereco_id);
                            $('#endereco').val(data.endereco.logradouro);
                            $('#numero').val(data.endereco.numero);
                            $('#bairro').val(data.endereco.bairro);
                            $('#complemento').val(data.endereco.complemento);
                            $('#estado').val(data.endereco.uf);
                            $('#cidade').val(data.endereco.cidade);
                       } 
                });

                $.get("../controller/contato_responsavel.php?responsavel_id="+responsavel_id)
                    .done(function(data){
                       data = JSON.parse(data);
                       if(data){
                            $('[name="telefone_tipo"]').val(data[0].tipo);
                            $('[name="telefone"]').val(data[0].valor);
                            if(data.length > 1){
                                $('#add-number').click();
                                $('[name="telefone_tipo2"]').val(data[1].tipo);
                                $('[name="telefone2"]').val(data[1].valor);
                            }
                       }
                   });
            }
        }

    });
</script>