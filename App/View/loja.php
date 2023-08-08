<div class="container mt-5 mb-5">
    <div class="row mb-4">
        <div class="col-md-4">
            <p class="text-left titulo-produtos">
                Produtos:
            </p>
        </div>
        <div class="col-md-8 justify-content-end my-auto">
            <form method="POST" action="<?= baseUrl() ?>Home/loja" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-3">
                        <select type="text" class="form-control" id="Categoria" aria-describedby="Categoria" name="Categoria">
                            <option value="">Selecione...</option>
                            <?php foreach ($dados[1] as $categorias): ?>
                                <option value="<?= $categorias["id"] ?>"><?= $categorias["Categoria"] ?></option>
                            <?php endforeach; ?>       
                        </select>
                    </div>
                    <div class="col-md-7">
                        <input type="search" maxlength="100" class="form-control" id="Titulo" aria-describedby="Titulo" name="Titulo">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-outline-danger">Pesquisar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr class="mb-5">
    <?php if (!empty($dados[0])): ?>
        <div class="row row-cols-md-3 g-4">
            <?php foreach ($dados[0] as $produto): 
                if ($produto['Status'] == 1): ?>
                    <div class="col-md-4 p-3">
                        <div class="card h-100">
                            <img src="<?= baseUrl(); ?>uploads/produtos/<?= $produto['imagem']; ?>" class="card-img-top card-img" alt="...">
                            <div class="card-body">
                                <h5 class="card-title card-title-products"><?= $produto['Titulo']; ?></h5>
                                <p class="card-text">
                                    <?= $produto['Descricao']; ?>
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="<?= baseUrl(); ?>Home/Produto/<?= $produto['id']; ?>" class="card-product-footer">
                                    <small class="text-muted card-product-footer">Mais Detalhes <i class="fa fa-shopping-cart"></i></small>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach;?>
        <?php else:?>
            <h5 class="card-title titulo-produtos my-auto mx-auto">Nenhum produto encontrado.</h5>
        <?php endif; ?>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('select').selectize({
            sortField: 'text'
        });
    });
</script>