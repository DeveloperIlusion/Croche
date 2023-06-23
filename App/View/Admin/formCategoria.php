<?php

use App\Library\Formulario;

    echo $this->loadView("Comuns/cabecalho");
    echo $this->loadView("Comuns/menu");
    echo  Formulario::titulo('Categoria', false, true); 
?>

<div class="container mt-5 mb-5">
    <form method="POST" action="<?= baseUrl() ?>Categoria/<?= $this->getAcao() ?>" enctype="multipart/form-data">
        <div class="row mx-auto my-auto text-left mt-5 justify-content-center">
            <div class="col-md-6">
                <label for="Categoria" class="form-label">Categoria</label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="Categoria" 
                    name="Categoria" 
                    aria-describedby="Categoria"
                    maxlength="100"
                    value="<?= setValor('Categoria') ?>" 
                    required
                >
            </div>

            <div class="col-md-6">
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
                    maxlength="300"
                    required
                ><?= setValor('Descricao') ?></textarea>
            </div>

            <input type="hidden" name="id" id="id" value="<?= setValor('id') ?>">
        </div>
        <?php if ($this->getAcao() != 'view'): ?>
            <div class="row my-auto mx-auto justify-content-center p-5">
                <button type="submit" class="btn btn-outline-danger">Gravar</button>
            </div>
        <?php endif; ?>
    </form>
</div>

<?= $this->loadView("Comuns/rodape") ?>