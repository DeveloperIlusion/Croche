<?php

use App\Library\Formulario;

?>

<h1 class="title-contact mt-5">Seja Bem-vindo!</h1>
<div class="container mb-5">
    <div class="col-md-12 mt-3">
        <?= Formulario::exibeMsgError() ?>
    </div>

    <div class="col-md-12 mt-3">
        <?= Formulario::exibeMsgSucesso() ?>
    </div>
    <div class="col-md-6 text-left mx-auto">
        <form method="POST" class="row login_form" action="<?= baseUrl() ?>Login/signIn" id="contactForm">
            <div class="col-md-12 mb-3">
                <p class="justify-content-center text-justify texto-home">
                    º Não compartilhe sua senha com ninguém!<br/>
                    º Entre em sua conta somente usando dispositivos cofiaveís!<br/>
                    º Lembre-se de anotar sua senha em algum lugar que só você tenha acesso!
                </p>
            </div>
            <div class="col-md-12 mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'E-mail'" required>
            </div>
            <div class="col-md-12 mb-3">
                <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Senha'" required>
            </div>
            <div class="col-md-12 form-group justify-content-center text-center">
                <div>
                    <button type="submit" value="submit" class="btn btn-outline-danger">Entrar</button>
                </div>
                <div>
                    <a href="<?= baseUrl() ?>Login/solicitaRecuperacaoSenha" class="mensagem-redirecionamento">Esqueceu a senha?</a>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-12 form-group">
        <a href="<?= baseUrl() ?>Home/criarConta" class="mensagem-redirecionamento">
            <p>Ainda não tem uma conta? Crie uma aqui!</p>
        </a>
    </div>  
</div>