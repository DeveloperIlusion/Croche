<?php
use App\Library\Session;

echo $this->loadView('Comuns/cabecalho');
echo $this->loadView('Comuns/menu');

?>

<section>
    <div class="container">
        <div class="blog-banner">
            <div class="mt-5 mb-5 text-center title-contact">
                <h1>Solicita Recuperação de Senha</h1>
            </div>
        </div>
    </div>
</section>

<section class="section-margin section-login">
    
    <div class="container mt-3 mb-5">
        
        <div class="row">
            <div class="col-lg-4 offset-lg-4">
                <form class="form-contact contact_form" action="<?= baseUrl() . "Login/gerarLinkRecuperaSenha" ?>" method="post" id="contactForm" novalidate="novalidate">
                <div class="row">

                    <div class="col-sm-12 header-login mb-4">
                        <h6 class="intro-title header-login-title p-2 font-weight-bold titulo-home">Informe seu e-mail</h6>
                    </div>        
                    
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input class="form-control" name="email" id="email" 
                                    type="text" 
                                    placeholder="e-mail"
                                    required>
                        </div>
                    </div>
                </div>

            <?php

            if (Session::get('msgError')) {
                ?>
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            <?= Session::getDestroy('msgError') ?>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

            <div class="form-group mt-3 controls">
                    <button type="submit" class="btn btn-outline-danger">Enviar</button>
                </div>
            </div>

        </form>

        </div>

    </div>
</section>

<?= $this->loadView('Comuns/rodape') ?>