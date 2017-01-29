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
 if(!isset($_POST['nome']))
    header("location: add_profissional.php");

 $pagina['titulo'] = 'Profissional';
 include('header.php');
 $data = new DateTime($_POST['data']);

 $data = $data->format('d/m/Y');

 $empresa_id = $_POST['empresa_id'];
 echo $empresa_id;
 ?>
    <section>
        <article>
            <div class="boxMain">
                <form name="ava_pac" method="post" action="../controller/profissional.php" >
                    <div>
                        <div style="float: left;">
                            <img src="../img/people.png">
                        </div>

                        <div style="float: right;width: 360px;">
                            <input type="text" name="nome" class="tmp_p" value="<?php echo $_POST['nome']?>" readonly>
                            <div class="ClearBox"></div>
                            <input type="date" name="data_nascimento" class="tmp_p" value="<?php echo $_POST['data'] ?>" style="width: 200px;">
                            <input type="submit" name="localiza" class="submit_calen"  >
                        </div>

                    </div>
                    <div class="ClearBox"></div>
                    <select class="tmp tmp_phone" name="cat_registro" > 
                        <option disabled >Registro</option>
                        <option value="CRP">CRP</option>
                        <option value="CRM">CRM</option>
                    </select>
                    <input type="text" name="registro" class="tmp_p" value="<?php echo $_POST['registro'] ?>"  style="width: 200px">
                    <div class="ClearHr"><div class="icons_con"></div></div>
                    <select class="tmp tmp_phone" name="tipo_documento" STYLE="width: 110px">
                        <option value="CPF" selected>CPF</option>
                    </select>
                    <input type="text" name="documento" class="tmp_p tmp_w" value="<?php echo $_POST['registro'] ?>" >
                        <div class="ClearHr"><div class="icons_hom"></div></div>
                    <h3>CEP</h3>
                    <input type="text" name="cep" id ="cep" class="tmp_p tmp_w" value="" style="width: 110px;font-weight: 500;padding: 0 3px" onKeyPress="MascaraCep(ava_pac.cep);"  maxlength="9" >
                    <div class="ClearBoxli"></div>
                    <h3> Endereço</h3>
                    <input type="text" name="endereco" id="endereco" class="tmp_p tmp_w" value="" style="width: 365px;font-weight: 500;padding: 0 3px" >
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
                    <select class="tmp tmp_phone" name="estado" id="estado" style="width:390px;font-weight: 500;padding: 0 3px;background: #FFF;">
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
    <script type="text/javascript" src="../js/validations.js" async></script>
    <script type="text/javascript">
        $('#cep').keyup(function(){
            var cep = $(this).val();
            if(cep.length == 9){
                 alert('entrei!')
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
        
    </script>
</html>