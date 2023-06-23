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
        <div class="col-md-6 vertical-align pl-4 pr-4 text-left">
            <form action="<?= baseUrl() ?>Home/contatoEnviaEmail" method="POST" id="contactForm" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" aria-describedby="Seu nome">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="Seu e-mail">
                </div>
                <div class="mb-3">
                    <label for="topic" class="form-label">Assunto</label>
                    <input type="text" class="form-control" id="topic" name="topic" aria-describedby="Assunto a ser tratado">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Mensagem</label>
                    <textarea type="textarea" class="form-control" id="message" name="message" aria-describedby="Mensagem a ser enviada">
                    </textarea>
                </div>
                <div class="mb-3">
                    <label for="attachments" class="form-label">Anexos</label>
                    <input class="form-control" type="file" id="attachments" name="attachments[]" multiple>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="newsletter" name="newsletter">
                    <label class="form-check-label" for="newsletter">Quero receber novidades sobre novos blogs, cupons de desconto etc...</label>
                </div>
                <button type="submit" class="btn btn-outline-danger">Enviar</button>
            </form>
        </div>
        <div class="col-md-6">
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