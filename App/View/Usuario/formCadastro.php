<?php

use App\Library\Formulario;

echo $this->loadView("Comuns/cabecalho");
echo $this->loadView("Comuns/menu");

?>

<script type="text/javascript" src="<?= baseUrl(); ?>assets/js/usuario.js"></script>

<h1 class="title-contact mt-5">Seja Bem-vindo,</h1>
<div class="container  mx-auto mb-5">
    <?= Formulario::titulo("Vamos Criar Sua Conta?", false, false) ?>
    <div class="col-md-6 text-left mx-auto">
        <form method="POST" action="<?= baseUrl() ?>Login/novaContaVisitante">
            <p class="text-center texto-home">
                Ainda não tem uma conta?<br/>É rapidinho fazer uma! :)
            </p>

            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" id="nome"  class="form-control" maxlength="50" 
                value="<?= setValor('nome') ?>" 
                required autofocus placeholder="Nome completo do usuário">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" name="email" id="email"  class="form-control" maxlength="100" 
                value="<?= setValor('email') ?>" 
                required placeholder="E-mail: seu-nome@dominio.com">
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" name="senha" id="senha"  class="form-control" maxlength="250" 
                value="<?= setValor('senha') ?>" 
                required placeholder="Informe uma senha"
                onkeyup="checa_segur_senha('senha', 'msgSenha', 'btGravar');">
                <div id="msgSenha" class="msgNivel_senha"></div>
            </div>

            <div class="mb-3">
                <label for="confSenha" class="form-label">Confere a senha</label>
                <input type="password" name="confSenha" id="confSenha"  class="form-control" maxlength="250" 
                value="<?= setValor('senha') ?>" 
                required placeholder="Confirme a senha"
                onkeyup="checa_segur_senha('confSenha', 'msgConfSenha', 'btGravar');">
                <div id="msgConfSenha" class="msgNivel_senha"></div>
            </div>

            <input type="hidden" name="id" value="<?= setValor('id') ?>">
            <input type="hidden" name="statusRegistro" id="statusRegistro" value="1">
            <input type="hidden" name="nivel" id="nivel" value="11">

            <div class="form-group col-12 mt-5 text-center">
                <?php if ($this->getAcao() != "view"): ?>
                    <button type="submit" value="submit" id="btGravar" class="button button-login btn btn-outline-danger">Cadastrar</button>
                <?php endif; ?>
                <a href="<?= baseUrl() ?>/Home/Login" class="btn btn-outline-secondary">Voltar</a>
            </div>
        </form>
    </div>
    <a href="<?= baseUrl() ?>Home/login" class="mensagem-redirecionamento">
        <p>Já tem uma conta? Entre por aqui!</p>
    </a>
</div>

<?= $this->loadView('Comuns/rodape') ?>