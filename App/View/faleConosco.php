<?php

use App\Library\Formulario;

?>

<script src="<?= baseUrl() ?>assets/ckeditor5/ckeditor.js"></script>

<div class="container mb-5">
    <h1 class="title-contact mt-5">Alguma dúvida ou problema?<br>Conta pra gente!</h1>

    <div class="mt-5 mb-3">
        <?= Formulario::mensagem() ?>
    </div>
    
    <div class="row mt-5">
        <div class="col-md-6 vertical-align p-0 text-left">
            <script charset="utf-8" type="text/javascript" src="//js.hsforms.net/forms/embed/v2.js"></script>
            <script>
            hbspt.forms.create({
                region: "na1",
                portalId: "40228971",
                formId: "bc486e0d-07bb-4539-960a-8bc1ea77ca90"
            });
            </script>
        </div>
        <div class="col-md-6 p-4">
            <img class="rounded-circle img-fluid alignment image-contact" src="<?= baseUrl(); ?>uploads/crochetando.jpg" id="sobreNosImagem">
        </div>
    </div>
</div>
<script type="text/javascript">
    ClassicEditor
        .create( document.querySelector('#mensagem'))
        .catch( error => {
            console.error( error );
        })
</script>