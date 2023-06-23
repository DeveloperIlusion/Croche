<?php

use App\Library\Formulario;
use App\Library\Session;

echo $this->loadView("Comuns/cabecalho");
echo $this->loadView("Comuns/menu");

$total = 0;
?>
<div class="col-md-8 mx-auto card-product m-5 p-3">
    <h2 class="text-center titulo-home mb-4">Carrinho <i class="fa fa-shopping-cart"></i></h2>
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
        <?php
            $totalDeItens = sizeof($dados);
            if (!empty($dados[0]) && $totalDeItens > 3):
            ?>
            <div class="row mx-auto my-auto">
                <div id="carousel-carrinho" class="carrinho carrinho-carousel carousel slide w-100" data-ride="carousel">
                    <div class="carrinho carousel-inner w-100" role="listbox">
                    <?php $count = 0;
                    foreach ($dados as $produto):
                        if ($produto['Status'] == 1): 
                            if ($count != 0):
                        ?>
                            <div class="carrinho-carousel-item carrinho carousel-item">
                            <?php else:?>
                            <div class="carrinho-carousel-item carrinho carousel-item active">
                            <?php 
                                endif;
                                $count = 1;
                            ?>
                                <div class="card col-md-4 p-0">
                                    <img class="card-img-top image-products" src="<?= baseUrl(); ?>uploads/produtos/<?= $produto['imagem']; ?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $produto['Titulo']; ?></h5>
                                    </div>
                                    <div class="card-footer">
                                        <p class="card-text"><?= $produto['Quantidade']; ?> unidades por R$ <?= $produto['Preco']; ?> cada</p>
                                        <form method="POST" action="<?= baseUrl() ?>Carrinho/delete" enctype="multipart/form-data">
                                            <input type="hidden" value="<?= $produto["id"] ?? ""; ?>" name="id">
                                            <button type="submit" class="btn btn-outline-danger mt-4">Remover<i class="fa fa-cart-minus"></i></a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endif;
                            $total += $produto['Quantidade'] * $produto['Preco'];
                        ?>
                    <?php endforeach;?>
                    </div>
                </div>
            </div>
            <a class="carrinho carousel-control-prev" href="#carousel-carrinho" role="button" data-slide="prev">
                <span class="carrinho carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>
            <a class="carrinho carousel-control-next" href="#carousel-carrinho" role="button" data-slide="next">
                <span class="carrinho carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only"></span>
            </a>
        <?php elseif (!empty($dados[0]) && $totalDeItens > 0 && $totalDeItens <= 3): ?>
            <div class="card-deck mx-auto">
                <?php foreach ($dados as $produto): ?>
                    <div class="card col-md-4 p-0">
                        <img class="card-img-top image-products" src="<?= baseUrl(); ?>uploads/produtos/<?= $produto['imagem']; ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?= $produto['Titulo']; ?></h5>
                        </div>
                        <div class="card-footer">
                            <p class="card-text"><?= $produto['Quantidade']; ?> unidades por R$ <?= $produto['Preco']; ?> cada</p>
                            <form method="POST" action="<?= baseUrl() ?>Carrinho/delete" enctype="multipart/form-data">
                                <input type="hidden" value="<?= $produto["id"] ?? ""; ?>" name="id">
                                <button type="submit" class="btn btn-outline-danger mt-4">Remover<i class="fa fa-cart-minus"></i></a>
                            </form>
                        </div>
                    </div>
                <?php
                    $total += $produto['Quantidade'] * $produto['Preco'];
                ?>
            <?php endforeach;?>
            </div>
        <?php else:
            $total = 0;
        ?>
            <h5 class="card-title titulo-produtos my-auto mx-auto">Você ainda não adicionou nada ao carrinho.</h5>
        <?php endif; ?>
    <div class="mt-5">
        <h4 class="titulo-home">Total: R$ <?= $total ?></h4>
        <a href="#" class="btn btn-outline-danger">Finalizar Compra <i class="fa fa-mouse-pointer"></i></a>
    </div>
</div>

<?= $this->loadView('Comuns/rodape') ?>


<script type="text/javascript" src="<?= baseUrl(); ?>assets/js/carrinho.js"></script>