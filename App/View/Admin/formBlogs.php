<?php

use App\Library\Formulario;

    echo $this->loadView("Comuns/cabecalho");
    echo $this->loadView("Comuns/menu");
    echo  Formulario::titulo('Blogs', false, true); 
?>

<div class="container mt-5 mb-5">
    <form method="POST" action="<?= baseUrl() ?>Blogs/<?= $this->getAcao() ?>" enctype="multipart/form-data">
        <div class="row mx-auto my-auto text-left mt-5 justify-content-center">
            <div class="col-md-4">
                <label for="Titulo" class="form-label">Titulo</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="Titulo" 
                    name="Titulo" 
                    aria-describedby="Titulo"
                    maxlength="100"
                    value="<?= setValor('Titulo') ?>" 
                    required
                >
            </div>

            <div class="col-md-4">
                <label for="Video" class="form-label">URL do Vídeo</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="Video" 
                    name="Video" 
                    aria-describedby="Video"
                    value="<?= setValor('Video') ?>" 
                    required
                >
            </div>

            <div class="col-md-4">
                <label for="Status">Status</label>
                <select name="Status" id="Status" class="form-control" required>
                    <option value=""  <?= setValor('Status') == ""  ? "SELECTED": "" ?>>...</option>
                    <option value="1" <?= setValor('Status') == "1" ? "SELECTED": "" ?>>Ativo</option>
                    <option value="2" <?= setValor('Status') == "2" ? "SELECTED": "" ?>>Inativo</option>
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
                    required
                ><?= setValor('Descricao') ?></textarea>
            </div>
            
            <?php if (in_array($this->getAcao(), ['insert', 'update'])): ?>

                <div class="col-12 mb-3">
                    <label for="anexos" class="form-label">Imagem de Capa</label>
                    <input class="form-control" type="file" id="imagem" name="imagem">
                </div>

            <?php endif; ?>

            <?php if (!empty(setValor('imagem'))): ?>

                <div class="mb-3 col-12">
                    <label for="imagem" class="form-label">Imagem de Capa</label>
                    <br />
                    <img src="<?= baseUrl() ?>uploads/blogs/<?= setValor('imagem') ?>" class="rounded image-products"/>
                </div>

            <?php endif; ?>

            <input type="hidden" name="id" id="id" value="<?= setValor('id') ?>">
            <input type="hidden" name="nomeImagem" value="<?= setValor('imagem') ?>">
        </div>

        <?php if ($this->getAcao() != 'view'): ?>
            <div class="row my-auto mx-auto justify-content-center p-5">
                <button type="submit" class="btn btn-outline-danger">Gravar</button>
            </div>
        <?php endif; ?>
    </form>
</div>

<?= $this->loadView("Comuns/rodape") ?>