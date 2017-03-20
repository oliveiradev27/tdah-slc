<?php 
$pagina['titulo'] = 'Configuração';
include('header.php');

 ?>
<section>
    <article>

        <div class="boxMain">
            <form name="ava_pac" method="post" action="index.php" >
               <div class="ClearBox"></div>
               <div>
                   <div style="float: left;">
                        <img src="../img/instituicao.gif">
                   </div>
                   <div style="float: right;width: 360px;">
                       <input type="hidden" name="id" id="id" value="">
                       <input type="text" name="empresa" class="tmp_p tmp_w" required value="" placeholder="Nome da Empresa" style="border: 1px solid">
                       <div class="ClearBox"></div>
                       <input type="date" name="data" class="tmp_p tmp_w" required value="" placeholder="Data de Registro" style="width: 200px;border: 1px solid">
                       <input type="button" name="localiza" class="submit_calen"  >
                   </div>
               </div>
                <div class="ClearBox"></div>              
                <select class="tmp tmp_phone" name="documento" STYLE="width: 110px">
                    <option value="CNPJ" selected>CNPJ</option>
                </select>
                <input type="text" name="valor" class="tmp_p tmp_w" value="" onKeyPress="MascaraCNPJ(ava_pac.valor);" maxlength="18" >
                <div class="ClearHr"><div class="icons_hom"></div></div>
                <h3> CEP</h3>
                <input type="text" name="cep" class="tmp_p tmp_w" required value="" style="width: 110px;font-weight: 500;padding: 0 3px" onKeyPress="MascaraCep(ava_pac.cep);"  maxlength="10" >
                <div class="ClearBoxli"></div>
                <h3> Endereço</h3>
                <input type="text" name="endereco" class="tmp_p tmp_w" value="" required style="width: 365px;font-weight: 500;padding: 0 3px" >
                <div class="ClearBoxli"></div>
                <h3> Número</h3>
                <input type="number" name="numero" maxlength="8" size="8" min="1" class="tmp_p tmp_w" required value="" style="width: 110px;font-weight: 500;padding: 0 3px" >
                <div class="ClearBoxli"></div>
                <h3> Complemento</h3>
                <input type="text" name="complemento" class="tmp_p tmp_w " required value="" style="width: 335px;font-weight: 500;padding: 0 3px" >
                <div class="ClearBoxli"></div>
                <h3> Bairro</h3>
                <input type="text" name="bairro" class="tmp_p tmp_w" required value="" style="width: 395px;font-weight: 500;padding: 0 3px" >
                <div class="ClearBoxli"></div>
                <h3> Cidade</h3>
                <input type="text" name="cidade" class="tmp_p tmp_w" required value="" style="width: 390px;font-weight: 500;padding: 0 3px" >
                <div class="ClearBoxli"></div>
                <h3> Estado</h3>
                <select class="tmp tmp_phone" name="estado" style="width:390px;font-weight: 500;padding: 0 3px;background: #FFF;">
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
                    <option value="SE">São Paulo (SP)</option>
                    <option value="SP">Sergipe (SE)</option>
                    <option value="TO">Tocantins (TO)</option>
                </select>
                <div class="ClearBoxli"></div>
                <div class="ClearBox"></div>

                <div class="ClearBox"></div>

                <input type="button" name="avancar" id ="concluir" class="concluir" value="Concluir"  >




                <div class="ClearBox"></div>
            </form>
        </div>

        <div class="ClearBox"></div>
    </article>
    <div class="ClearBox"></div>
</section>   <div class="ClearBox"></div>
<?php include('footer.php') ?>
<script type="text/javascript" src="../js/validations.js"></script>
<script type ="text/javascript">
    var retorno;
    jQuery(document).ready(function($) {
        
        $('.concluir').on('click', function(event) {
            event.preventDefault();
            //console.log("passei aqui!");
            if(!verificarForm())
                return false;

            var empresa         = $('[name="empresa"]').val();
            var dataRegistro    = $('[name="data"]').val();
            var documento       = $('[name="documento"]').val();
            var numeroDocumento = $('[name="valor"]').val();
            var cep             = $('[name="cep"]').val();
            var logradouro      = $('[name="endereco"]').val();
            var complemento     = $('[name="complemento"]').val();
            var bairro          = $('[name="bairro"]').val();
            var numero          = $('[name="numero"]').val();
            var cidade          = $('[name="cidade"]').val();
            var uf              = $('[name="estado"]').val(); 

             if(!ValidarCNPJ(ava_pac.valor))
             {
                 $("#mensagem p").text("CNPJ inválido!");
                 $("#mensagem small").text("Por favor, insirá um CNPJ válido.");
                 $("#mensagem").dialog({
                       show: { effect: 'fade', speed: '1500' },
                       hide: { effect: 'fade', speed: '1000' },
                       buttons: {
                           OK: function() {
                                 $('input[name="valor"]').focus();
                                 $(this).dialog("close");
                             }
                          }
                        });

                    return false;
             }

             if(!ValidaCep(ava_pac.cep))
             {
                 $("#mensagem p").text("CEP inválido!");
                 $("#mensagem small").text("Por favor, insirá um CEP válido.");
                 $("#mensagem").dialog({
                        show: { effect: 'fade', speed: '1500' },
                        hide: { effect: 'fade', speed: '1000' },
                        buttons: {
                            OK: function() {
                                $(this).dialog("close");
                            }
                        }
                    });

                    return false;
             }



            if(empresa == "" ||  empresa == null || numeroDocumento == "" || dataRegistro == "")
            {
                   $("#mensagem p").text("Preencha os campos obrigatórios!");
                   $("#mensagem small").text("Preencha as informações da instituicao.");
                   $("#mensagem").dialog({
                        show : {effect: 'fade', speed: '1500'},
                        hide : {effect: 'fade', speed: '1000'},
                        buttons: {
                            OK: function() {
                                $(this).dialog("close");
                            }
                        }
                    });
            } else if(cep == "" || logradouro == "" || cidade == "" || uf == ""){
                   $("#mensagem p").text("Preencha os campos obrigatórios!");
                   $("#mensagem small").text("Preencha as informações de endereço.");
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
                verificaCNPJ(numeroDocumento);
            }
        });

        function verificarForm()
        {
            var id = $('#id').val();
            if( id != "" || id > 0)
            {
                console.log($('#id').val() );
                $("#mensagem p").text("Deseja realizar outro cadastro?");
                $("#mensagem small").text("Clique em Sim para iniciar com um novo cadastro.");
                $("#mensagem").dialog({
                       show: { effect: 'fade', speed: '1500' },
                       hide: { effect: 'fade', speed: '1000' },
                       buttons: {
                            Sim: function() {
                                  location.reload();
                            },
                            Cancelar: function() {
                                 $(this).dialog("close");
                                 return false;                            
                        }
                   }
             });
             
            } else {
                return true;
            }
        }

        function inserir()
        {
            var empresa         = $('[name="empresa"]').val();
            var dataRegistro    = $('[name="data"]').val();
            var documento       = $('[name="documento"]').val();
            var numeroDocumento = $('[name="valor"]').val();
            var cep             = $('[name="cep"]').val();
            var logradouro      = $('[name="endereco"]').val();
            var complemento     = $('[name="complemento"]').val();
            var bairro          = $('[name="bairro"]').val();
            var numero          = $('[name="numero"]').val();
            var cidade          = $('[name="cidade"]').val();
            var uf              = $('[name="estado"]').val(); 
             $.post("../controller/empresa.php",
                    { empresa         : empresa,
                      dataRegistro    : dataRegistro,
                      documento       : documento,
                      numeroDocumento : numeroDocumento,
                      cep             : cep,
                      logradouro      : logradouro,
                      complemento     : complemento,
                      bairro          : bairro,
                      numero          : numero,
                      cidade          : cidade,
                      uf              : uf
                    },
                    function(data) {
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
        }

        function verificaCNPJ(cnpj) {
            $.get("../controller/empresa.php?cnpj="+cnpj)
             .done(function(data){
                data = JSON.parse(data);
                //retorno = data;
                if(data == true)
                {
                    $("#mensagem p").text("CNPJ já Cadastrado!");
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

</script>
</html>
