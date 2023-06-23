<?php

use App\Library\Formulario;

    echo $this->loadView("Comuns/cabecalho");
    echo $this->loadView("Comuns/menu");
    echo  Formulario::titulo('Produtos', false, true); 
?>

<div class="container mt-5 mb-5">
    <form method="POST" action="<?= baseUrl() ?>Produtos/<?= $this->getAcao() ?>" enctype="multipart/form-data">
        <div class="row mx-auto my-auto text-left mt-5 justify-content-center">
            <div class="col-md-4">
                <label for="Titulo" class="form-label">Nome do Produto</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="Titulo" 
                    name="Titulo" 
                    aria-describedby="Titulo"
                    maxlength="100"
                    value="<?= setValor2(0, 'Titulo') ?>" 
                    required
                >
            </div>
            <div class="col-md-2">
                <label for="Preco" class="form-label">Preço</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="Preco" 
                    name="Preco" 
                    aria-describedby="Preco"
                    value="<?= setValor2(0, 'Preco') ?>" 
                    required
                >
            </div>

            <div class="col-md-3">
                <label for="Status">Status</label>
                <select name="Status" id="Status" class="form-control" required>
                    <option value=""  <?= setValor2(0, 'Status') == ""  ? "SELECTED": "" ?>>...</option>
                    <option value="1" <?= setValor2(0, 'Status') == "1" ? "SELECTED": "" ?>>Ativo</option>
                    <option value="2" <?= setValor2(0, 'Status') == "2" ? "SELECTED": "" ?>>Inativo</option>
                </select>
            </div>
            
            <div class="col-md-3">
                <label for="Categoria" class="form-label">Categoria</label>
                <select type="text" class="form-control" id="Categoria" name="Categoria" aria-describedby="Categoria" required>
                    <option value=""  <?= setValor2(0, 'Categoria') == ""  ? "SELECTED": "" ?>>...</option>
                    <?php foreach ($dados[1] as $categorias): ?>
                        <option value="<?= $categorias["id"] ?>"  <?= setValor2(0, 'Categoria') == $categorias["id"]  ? "SELECTED": "" ?>><?= $categorias["Categoria"] ?></option>
                    <?php endforeach; ?>         
                </select>
            </div>

            <div class="col-md-12">
                <label for="Descricao" class="form-label">Descrição</label>
                <textarea 
                    type="text" 
                    class="form-control" 
                    id="Descricao" 
                    name="Descricao" 
                    aria-describedby="Descricao"
                    maxlength="350"
                    required
                ><?= setValor2(0, 'Descricao') ?></textarea>
            </div>
            
            <?php if (in_array($this->getAcao(), ['insert', 'update'])): ?>

                <div class="col-12 mb-3">
                    <label for="anexos" class="form-label">Imagem</label>
                    <input class="form-control" type="file" id="imagem" name="imagem">
                </div>

            <?php endif; ?>

            <?php if (!empty(setValor2(0, 'imagem'))): ?>

                <div class="col-12">
                    <label for="imagem" class="form-label">Imagem</label>
                    <br />
                    <img src="<?= baseUrl() ?>uploads/produtos/<?= setValor2(0, 'imagem') ?>" class="rounded image-products"/>
                </div>

            <?php endif; ?>

            <input type="hidden" name="id" id="id" value="<?= setValor2(0, 'id') ?>">
            <input type="hidden" name="nomeImagem" value="<?= setValor2(0, 'imagem') ?>">
        </div>
        
        <?php if ($this->getAcao() != 'view'): ?>
            <div class="row my-auto mx-auto justify-content-center p-5">
                <button type="submit" class="btn btn-outline-danger">Gravar</button>
            </div>
        <?php endif; ?>
    </form>
</div>

<?= $this->loadView("Comuns/rodape") ?>