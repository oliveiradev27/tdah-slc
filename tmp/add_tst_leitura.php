<?php require_once 'header.php' ?>
<section>
    <article>

        <div class="boxMain">
            <form name="ava_pac" method="post" action="index.php" >


                <div class="ClearBox"></div>

                <div class="ClearBox"><div class="icons_Lei">Leitura</div></div>
                <h3> Titulo</h3>
                <input type="text" name="titulo" class="tmp_p tmp_w" value="" style="width: 380px;font-weight: 500;padding: 0 3px" >
                <div class="ClearBoxli"></div>
                <h3> Texto</h3>
                <textarea class="BoxTxt" name="texto"></textarea>
                <div class="ClearBoxli"></div>
                <h3> Autor</h3>
                <input type="text" name="autor" class="tmp_p tmp_w" value="" style="width: 380px;font-weight: 500;padding: 0 3px" >
                <div class="ClearBoxli"></div>
                <h3> Bibliografia</h3>
                <input type="text" name="bibliografia" class="tmp_p tmp_w" value="" style="width: 335px;font-weight: 500;padding: 0 3px" >
                <div class="ClearBoxli"></div>

                <div class="ClearBox"></div>

                <div class="ClearBox"></div>

                <input type="submit" name="avancar" class="concluir" value="Concluir"  >

                <div class="ClearBox"></div>
            </form>
        </div>


    </article>

</section>
<?php require_once 'footer.php'; ?>