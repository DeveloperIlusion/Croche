<?php

use App\Library\Formulario;
use App\Library\Session;

echo $this->loadView('Comuns/cabecalho');
echo $this->loadView('Comuns/menu');

?>

<script type="text/javascript" src="<?= baseUrl(); ?>assets/js/usuario.js"></script>

<section>
    <div class="container">
        <div class="blog-banner">
            <div class="mt-5 mb-5 text-left">
                <h1 class="titulo-home text-center">Trocar Senha</h1>
            </div>
        </div>
    </div>
</section>

<div class="container mt-3">

    <div class="row justify-content-center">

        <div class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 div_login">                    

            <div class="card">

                <div class="card-body">

                    <form method="POST" id="recuperaSenhaform" class="form-horizontal" role="form" 
                        action="<?= baseUrl() ?>Usuario/atualizaTrocaSenha">

                        <input type="hidden" name="id" id="id" value="<?= Session::get('usuarioId') ?>">
                        
                        <div style="margin-bottom: 25px" class="input-group">
                            <label class="ml-1">Usuário: <b><?= Session::get('usuarioLogin') ?></b></label>                            
                        </div>

                        <div style="margin-bottom: 25px" class="control-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i> Senha Atual</span>
                            <div class="controls">
                                <input name="senhaAtual" id="senhaAtual" type="password" class="form-control" required="required">
                            </div>
                        </div>

                        <div style="margin-bottom: 25px" class="control-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i> Nova Senha</span>
                            <div class="controls">
                                <input name="novaSenha" id="novaSenha" type="password" class="form-control" required="required"
                                        onkeyup="checa_segur_senha( 'novaSenha', 'msgSenhaNova', 'btEnviar' );">
                                <div id="msgSenhaNova" class="msgNivel_senha"></div>
                            </div>
                        </div>

                        <div style="margin-bottom: 25px" class="control-group">
                            <span class="input-group-addon"><i class="fa fa-key"></i> Confirme a nova senha</span>
                            <div class="controls">
                                <input name="novaSenha2" id="novaSenha2" type="password" class="form-control" placeholder="Nova senha" required="required"
                                        onkeyup="checa_segur_senha( 'novaSenha2', 'msgSenhaNova2', 'btEnviar' );">
                                <div id="msgSenhaNova2" class="msgNivel_senha"></div>
                            </div>
                        </div>

                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->
                            <div class="col-xs-2 controls">
                                <button class="btn btn-outline-danger" id="btEnviar" disabled>Atualizar</button>
                            </div>

                            <div class="col-xs-10 controls mt-2">
                                <?php 

                                    if (!empty(Session::get("msgError"))) {
                                        ?>
                                        <div class="alert alert-danger" role="alert">
                                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                            <?= Session::getDestroy("msgError") ?>
                                        </div>     
                                        <?php
                                    }

                                    if (!empty(Session::get("msgSuccess"))) {
                                        ?>                                    
                                        <div class="alert alert-success" role="alert">
                                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                            <?= Session::getDestroy("msgSuccess") ?>
                                        </div>      
                                        <?php
                                    }
                                ?>
                            </div>

                        </div>

                    </form>     

                </div>
            </div>

            <br>
            <br>

        </div>  

    </div>
    
</div>  

<?= $this->loadView('Comuns/rodape') ?>