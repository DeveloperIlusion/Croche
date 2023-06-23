<div class="col-md-8 mx-auto card-product m-5 p-5">
    <div class="row">
        <div class="col-md-5">
            <img src="<?= baseUrl(); ?>uploads/produtos/<?= $dados["imagem"]; ?>" class="img-fluid card-product-image rounded" alt="...">
        </div>
        <div class="col-md-7 my-auto">
            <div class="card-body">
                <h5 class="card-produtc-title mb-3"><?= $dados["Titulo"]; ?></h5>
                <p class="card-text mb-5 text-justify">
                    <?= $dados["Descricao"]; ?>
                </p>
                <form method="POST" action="<?= baseUrl() ?>Carrinho/insert" enctype="multipart/form-data">
                    <div class="row">
                        <?php if (!empty($_SESSION["usuarioId"])): ?>
                            <div class="col-md-6">
                                <label for="quantidade" class="form-label">Quantidade:</label>
                                <input type="number" min="1" name="Quantidade" id="Quantidade" onkeyup="checar_preenchimento('Quantidade', 'btnCarrinho')"  onclick="checar_preenchimento('Quantidade', 'btnCarrinho')" value="<?= $dados["Quantidade"] ?? ""; ?>" class="form-control" id="quantidade" aria-describedby="quantidade">
                            </div>
                        <?php endif; ?>
                        <div class="col-md-6 justify-content-end my-auto">   
                            <h3 class="product-value" name="Preco">R$ <?= $dados["Preco"]; ?></h3>
                        </div>
                        <input type="hidden" value="<?= $dados["Preco"] ?? ""; ?>" name="Preco">
                        <input type="hidden" value="<?= $dados["id"] ?? ""; ?>" name="Produto">
                    </div>
                    <?php if (!empty($_SESSION["usuarioId"])): ?>
                        <button type="submit" id="btnCarrinho" class="btn btn-outline-danger mt-4" disabled>Adicionar ao Carrinho <i class="fa fa-cart-plus"></i></a>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= baseUrl(); ?>assets/js/travarBotao.js"></script>