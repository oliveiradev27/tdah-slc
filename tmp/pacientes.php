<?php 
$pagina['titulo'] = "Pacientes";
include_once('header.php') ?>
<section>
    <article>
        <div class="boxMain">
            <div class="ClearBox"></div>
            <h3> Paciente</h3>
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
            $('#pacientes li').remove();
            pesquisar();
        });

        function pesquisar(){
            var nome = $('#paciente').val();
            if (nome != ""){
                $.get('../controller/paciente.php?nome='+nome)
                 .done(function(data){
                    if (data){
                        data     = JSON.parse(data);
                        var qtd  = data.length;
                        var html = "";

                        for (var i = 0; i < data.length; i++){
                            html += "<li>";
                            html +=   "<a href=\"add_paciente.php?id="+ data[i].id +"\">";
                            html +=     "<img src=\"../img/Male-User-48.png\">";
                            html +=     "<strong>"+ data[i].nome +"<br>";
                            html +=     "<span>"+ data[i].data_nascimento +"</span>";
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