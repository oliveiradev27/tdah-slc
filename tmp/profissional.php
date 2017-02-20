<!DOCTYPE html>
<?php
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
 include('../dao/ProfissionalDao.php');

 $email         = "";
 $registro      = "";
 $nome          = "";
 $data          = "";
 $empresa_id    = "";
 $registro      = "";
 if(isset($_POST['nome']))
 {
    $data       = $_POST['data'];
    $email      = $_POST['email'];
    $nome       = $_POST['nome'];
    $empresa_id = $_POST['empresa_id'];
    $registro   = $_POST['registro'];

    $telefones = [];
    if(isset($_POST['telefone']) && !$_POST['telefone'] == null)
        array_push($telefones, [$_POST['telefone_tipo'],  $_POST['telefone']]);
    if(isset($_POST['telefone']) && !$_POST['telefone2'] == null)
    array_push($telefones, [$_POST['telefone_tipo2'], $_POST['telefone2']]); 

    $email = !isset($_POST['email']) ? $_POST['email']: "";

 } else if(isset($_GET['id'])){
    if(isset($_GET['novo']) && $_GET['novo'] == 1)
        echo '<span id="novo"></span>';

    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    if($id){
        $profissionalDao = new ProfissionalDao();
        $profissional = $profissionalDao->get($id);
    //    if($profissional)
           // print_r($profissional);
    }

} else {
        header("location: add_profissional.php");
}



//print_r(json_encode($telefones));
 ?>
    <section>
        <article>
            <div class="boxMain">
                <form name="ava_pac" method="post" action="../controller/profissional.php" >
                    <input type="hidden" name="empresa_id" id="empresa_id" value="<?php echo $empresa_id?>">
                    <input type="hidden" name="telefones" id="telefones" value='<?php echo json_encode($telefones)?>'>
                    <input type="hidden" name="email" id="email" value="<?php echo $email ?>";

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
                        $('#numero').val(dados.complemento);
                        $('#cidade').val(dados.localidade);
                        $('#estado').val(dados.uf);
                    } else {
                     
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
            if(cpf.length == 14){
                ValidarCPF(ava_pac.documento);
            }
        });

        $('form[name="ava_pac"]').submit(function(event){
          
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

        function inserir(){
            var nome       = $('[name="nome"]').val();
            var documento  = [$('[name="tipo_documento"]').val(), $('[name="documento"]').val()];
            var data       = $('[name="data_nascimento"]').val();
            var empresa_id = $('[name = "empresa_id"]').val();
            var telefones  = $('#telefones').val();
            var logradouro = $('#endereco').val();
            var bairro     = $('#bairro').val();
            var numero     = $('#numero').val();
            var cidade     = $('#cidade').val();
            var uf         = $('#estado').val();
            var cep        = $('#cep').val()
            var registro  = [$('[name = "cat_registro"]').val(), $('[name = "registro"]')];
            console.log(telefones);

            $.post("../controller/profissional.php", 
                  {
                      nome            : nome,
                      empresa_id      : empresa_id,
                      dataNascimento  : data,
                      registro        : JSON.stringify(registro),
                      documento       : JSON.stringify(documento),
                      telefones       : telefones,
                      cep             : cep,
                      logradouro      : logradouro,
                      complemento     : complemento,
                      bairro          : bairro,
                      numero          : numero,
                      cidade          : cidade,
                      uf              : uf
                  }, function(data) {
                    console.log("foi");
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
                                        $(this).dialog("close");
                                    }
                                }
                            });
                            }
                        }
                    );
                  }
        
    </script>
</html>