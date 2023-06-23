<?php

use App\Library\Formulario;

echo $this->loadView("Comuns/cabecalho");
echo $this->loadView("Comuns/menu");

?>

<script type="text/javascript" src="<?= baseUrl(); ?>assets/js/usuario.js"></script>

<main class="container">

    <?= Formulario::titulo("Usuário", false, true) ?>

    <section class="mb-5">

        <form method="POST" action="<?= baseUrl() ?>Usuario/<?= $this->getAcao() ?>">

            <div class="row">

                <div class="form-group col-12 col-md-8">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" name="nome" id="nome"  class="form-control" maxlength="50" 
                    value="<?= setValor('nome') ?>" 
                    required autofocus placeholder="Nome completo do usuário">
                </div>

                <div class="form-group col-12 col-md-4">
                    <label for="statusRegistro" class="form-label">Status</label>
                    <select name="statusRegistro" id="statusRegistro" class="form-control" required>
                        <option value=""  <?= setValor('statusRegistro') == ""  ? "selected" : "" ?>>.....</option>
                        <option value="1" <?= setValor('statusRegistro') == "1" ? "selected" : "" ?>>Ativo</option>
                        <option value="2" <?= setValor('statusRegistro') == "2" ? "selected" : "" ?>>Inativo</option>
                    </select>
                </div>

                <div class="form-group col-12 col-md-8">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="text" name="email" id="email"  class="form-control" maxlength="100" 
                        value="<?= setValor('email') ?>" 
                        required placeholder="E-mail: seu-nome@dominio.com">
                </div>

                <div class="form-group col-12 col-md-4">
                    <label for="nivel" class="form-label">Nível</label>
                    <select name="nivel" id="nivel" class="form-control" required>
                        <option value=""   <?= setValor('nivel') == ""    ? "selected" : "" ?>>.....</option>
                        <option value="1"  <?= setValor('nivel') == "1"   ? "selected" : "" ?>>Administrador</option>
                        <option value="11" <?= setValor('nivel') == "11"  ? "selected" : "" ?>>Visitante</option>
                    </select>
                </div>

                <div class="form-group col-12 col-md-6">
                    <label for="senha" class="form-label">Senha</label>
                    <input type="password" name="senha" id="senha"  class="form-control" maxlength="250" 
                        value="<?= setValor('senha') ?>" 
                        required placeholder="Informe uma senha"
                        onkeyup="checa_segur_senha('senha', 'msgSenha', 'btGravar');">
                    <div id="msgSenha" class="msgNivel_senha"></div>
                </div>

                <div class="form-group col-12 col-md-6">
                    <label for="confSenha" class="form-label">Confere a senha</label>
                    <input type="password" name="confSenha" id="confSenha"  class="form-control" maxlength="250" 
                        value="<?= setValor('senha') ?>" 
                        required placeholder="Confirme a senha"
                        onkeyup="checa_segur_senha('confSenha', 'msgConfSenha', 'btGravar');">
                    <div id="msgConfSenha" class="msgNivel_senha"></div>
                </div>

                <input type="hidden" name="id" value="<?= setValor('id') ?>">

                <div class="form-group col-12 col-md-12 mt-3 justify-content-center text-center">
                    <?php if ($this->getAcao() != "view"): ?>
                        <button type="submit" value="submit" id="btGravar" class="button button-login btn btn-outline-danger">Gravar</button>
                    <?php endif; ?>
                </div>

            </div>

        </form>

    </section>
    
</main>

<?= $this->loadView("Comuns/rodape") ?>