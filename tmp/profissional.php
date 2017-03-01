<?php 
 $pagina['titulo'] = 'Profissional';
 include('header.php');
 $profissional_id   = "";
 $email             = "";
 $registro          = "";
 $nome              = "";
 $data              = "";
 $empresa_id        = "";
 $registro          = "";
 $telefones         = [];
 if(isset($_POST['nome']))
 {
    $data       = $_POST['data'];
    $email      = $_POST['email'];
    $nome       = $_POST['nome'];
    $empresa_id = $_POST['empresa_id'];
    $registro   = $_POST['registro'];

    if(isset($_POST['telefone']) && !$_POST['telefone'] == null)
        array_push($telefones, [$_POST['telefone_tipo'],  $_POST['telefone']]);
    if(isset($_POST['telefone']) && !$_POST['telefone2'] == null)
    array_push($telefones, [$_POST['telefone_tipo2'], $_POST['telefone2']]); 

    $email = isset($_POST['email']) ? $_POST['email']: "";

 } else if(isset($_GET['id'])){
     $profissional_id = $_GET['id'];

    $id = isset($_GET['id']) ? $_GET['id'] : 0;
} else {
        header("location: add_profissional.php");
}

?>
    <section>
        <article>
            <div class="boxMain">
                <form name="ava_pac" method="post" action="../controller/profissional.php" >
                    <input type="hidden" name="profissional_id" id="profissional_id" value="<?php echo $profissional_id ?>">
                    <input type="hidden" name="empresa_id" id="empresa_id" value="<?php echo $empresa_id?>">
                    <input type="hidden" name="telefones" id="telefones" value='<?php echo json_encode($telefones)?>'>
                    <input type="hidden" name="email" id="email" value="<?php echo $email ?>">

                    <div>
                        <div style="float: left;">
                            <img src="../img/people.png">
                        </div>

                        <div style="float: right;width: 360px;">
                            <input type="text" name="nome" class="tmp_p" value="<?php echo $nome ?>" readonly>
                            <div class="ClearBox"></div>
                            <input type="date" name="data_nascimento" class="tmp_p" value="<?php echo $data ?>" style="width: 200px;">
                            <input type="submit" name="localiza" class="submit_calen"  >
                        </div>

                    </div>
                    <div class="ClearBox"></div>
                    <select class="tmp tmp_phone" name="cat_registro" > 
                        <option disabled >Registro</option>
                        <option value="CRP">CRP</option>
                        <option value="CRM">CRM</option>
                    </select>
                    <input type="text" name="registro" class="tmp_p" value="<?php echo $registro ?>"  style="width: 200px">
                    <div class="ClearHr"><div class="icons_con"></div></div>
                    <select class="tmp tmp_phone" name="tipo_documento" STYLE="width: 110px">
                        <option value="CPF" selected>CPF</option>
                    </select>
                    <input type="text" name="documento" id="cpf" class="tmp_p tmp_w" onKeyPress="MascaraCPF(ava_pac.documento);" maxlength="14" value="" >
                        <div class="ClearHr"><div class="icons_hom"></div></div>
                    <h3>CEP</h3>
                    <input type="text" name="cep" id ="cep" class="tmp_p tmp_w" value="" style="width: 110px;font-weight: 500;padding: 0 3px" onKeyPress="MascaraCep(ava_pac.cep);"  maxlength="9" required >
                    <div class="ClearBoxli"></div>
                    <h3> Endereço</h3>
                    <input type="text" name="logradouro" id="endereco" class="tmp_p tmp_w" value="" style="width: 365px;font-weight: 500;padding: 0 3px" required >
                    <div class="ClearBoxli"></div>
                    <h3> Número</h3>
                    <input type="text" name="numero" id="numero" class="tmp_p tmp_w" value="" style="width: 100px;font-weight: 500;padding: 0 3px" >
                    <div class="ClearBoxli"></div>
                    <h3> Complemento</h3>
                    <input type="text" name="complemento" id="complemento" class="tmp_p tmp_w" value="" style="width: 335px;font-weight: 500;padding: 0 3px" >
                    <div class="ClearBoxli"></div>
                    <h3> Bairro</h3>
                    <input type="text" name="bairro" id="bairro" class="tmp_p tmp_w" value="" style="width: 395px;font-weight: 500;padding: 0 3px" >
                    <div class="ClearBoxli"></div>
                    <h3> Cidade</h3>
                    <input type="text" name="cidade" id="cidade" class="tmp_p tmp_w" value="" style="width: 390px;font-weight: 500;padding: 0 3px" >
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
    <span id="cpf-validador"></span>    
    <script type="text/javascript" src="../js/validations.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            var novo = sessionStorage.getItem("novo");
            if(novo == 1)
                $('body').append('<span id="novo">'+$('#profissional_id').val()+'</span>');
            buscar();
            sessionStorage.removeItem('novo');
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
                        //dados = JSON.parse(dados);
                        //console.log(dados);
                        $('#endereco').val(dados.logradouro);
                        $('#bairro').val(dados.bairro);
                        $('#complemento').val(dados.complemento);
                        $('#cidade').val(dados.localidade);
                        $('#estado').val(dados.uf);
                    }
               }).fail(function(jqxhr, textStatus, error){
                    var erro = textStatus+ ' - '+ error;
                    //console.log(erro);
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
                                        $('form[name="ava_pac"]').unbind('submit').submit();
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
                                sessionStorage.setItem("novo", 1);
                                $('form[name="ava_pac"]').unbind('submit').submit();
                            }
                      });
             }            
        });

        function verificarCPF(cpf){
            console.log(cpf.value);
            var valido = ValidarCPF(cpf);
            console.log(valido);
            if(ValidarCPF(cpf)){
                //console.log("entrou no else");
                $.get('../controller/profissional.php?cpf='+cpf.value)
                 .done(function(data){
                    data = JSON.parse(data);
                    //retorno = data;
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
                    $('[name="data_nascimento"]').val(data.data_nascimento);
                    $('[name = "empresa_id"]').val();
                    $('#telefones').val();
                    $('#endereco').val(data.endereco.logradouro);
                    $('#bairro').val(data.endereco.bairro);
                    $('#numero').val(data.endereco.numero);
                    $('#complemento').val(data.endereco.complemento);
                    $('#cidade').val(data.endereco.cidade);
                    $('#estado').val(data.endereco.uf);
                    $('#cep').val(data.endereco.cep);
                    $('[name = "cat_registro"]').val(data.tipo);
                    $('[name = "registro"]').val(data.numero);
                    if($('#novo').text() > 0){
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

                      $('#novo').remove();
                    }
                   }
                });
            }
        }
    </script>
</html>