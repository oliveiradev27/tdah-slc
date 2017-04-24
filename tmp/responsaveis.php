<?php 
$pagina['titulo'] = "Responsaveis";
include_once('header.php') ?>
<style type="text/css" media="screen">

    .boxMain li {
        background: url(../img/li_bg_white.gif) no-repeat -10px 0px !important;
    }
    .boxMain li:hover {
        background: url(../img/li_bg_white.gif) no-repeat -10px -62px !important;
    }

    #pacientes li:hover{
        box-shadow: 0px 2px 17px 1px black;
        -webkit-transition: width 2s; /* Safari */
        transition: width 2s;
        -webkit-transform:scale(1.05); /* prefixo para browsers webkit */
        -moz-transform:scale(1.1); /* prefixo para browsers gecko */
        -o-transform:scale(1.1); /* prefixo para opera */
        transform:scale(1.1);
    }
    #pacientes li:hover strong{
        font-size: 16px;
    } 
</style>
<section>
    <article>
        <div class="boxMain">
            <div class="ClearBox"></div>
            <h3>Responsavél</h3>
            <input type="text" name="paciente" id="paciente" class="tmp_p" placeholder="Nome:" value="" >
            <input type="submit" name="localiza" class="submit"  >
            <div class="ClearBox"></div>

            <ul id="pacientes">
            </ul>
            <div class="ClearBox"></div>
        </div>

        <div class="ClearBox"></div>
    </article>
    <div class="ClearBox"></div>
</section>   <div class="ClearBox"></div>
<?php include_once('footer.php') ?>
<script type="text/javascript">
    $(document).ready(function(){

        $('#paciente').keyup(function() {
            $('#pacientes li').fadeOut(2000)
                              .remove();
            pesquisar();
        });

        function pesquisar(){
            var nome = $('#paciente').val();
            if (nome != ""){
                $.get('../controller/responsavel.php?nome='+nome)
                 .done(function(data){
                    if (data){
                        data     = JSON.parse(data);
                        var qtd  = data.length;
                        var html = "";

                        for (var i = 0; i < data.length; i++){
                            html += "<li>";
                            html +=   "<a href=\"add_responsavel.php?id="+ data[i].responsavel_id +"\">";
                            html +=     "<img src=\"../img/Male-User-48.png\">";
                            html +=     "<strong>"+ data[i].nome +"<br>";
                            html +=     "<span>"+ data[i].cpf +"</span>";
                            html +=     "</strong>";
                            html +=    "</a>";
                            html +=  "</li>";
                            html +=  "<input type=\"checkbox\">";
                        }

                        $('#pacientes').append(html);
                    }
                });
            }
        }

    });
</script>