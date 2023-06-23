<div class="container mt-5 mb-5">
    <div class="row mb-4">
        <div class="col-md-4">
            <p class="text-left titulo-produtos">
                Dicas:
            </p>
        </div>
        <div class="col-md-8 justify-content-end my-auto">
            <form method="POST" action="<?= baseUrl() ?>Home/blogs" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-10">
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
        <?php if (!empty($dados)): ?>
            <div class="row row-cols-md-3 g-4">
            <?php foreach ($dados as $blog): 
                if ($blog['Status'] == 1): ?>
                    <div class="col-md-4 p-3">
                        <div class="card h-100">
                            <img src="<?= baseUrl(); ?>uploads/blogs/<?= $blog['imagem']?>" class="img-fluid card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title card-title-products"><?= $blog['Titulo'] ?></h5>
                                <p class="card-text" maxlenght="10">
                                    <?= $blog['Descricao'] ?>
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="<?= baseUrl(); ?>Home/Blog/<?= $blog['id'] ?>" class="card-product-footer">
                                    <small class="text-muted card-product-footer">Ler <i class="fa fa-book"></i></small>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach;?>
        <?php else:?>
            <h5 class="card-title titulo-produtos my-auto mx-auto">Nenhum blog encontrado.</h5>
        <?php endif; ?>
    </div>
</div>