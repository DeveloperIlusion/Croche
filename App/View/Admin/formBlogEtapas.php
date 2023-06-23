<?php

use App\Library\Formulario;

    echo $this->loadView("Comuns/cabecalho");
    echo $this->loadView("Comuns/menu");
    echo  Formulario::titulo('Passo-À-Passo', false, true); 
?>

<div class="container mt-5 mb-5">
    <form method="POST" action="<?= baseUrl() ?>BlogEtapas/<?= $this->getAcao() ?>" enctype="multipart/form-data">
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
                    value="<?= setValor2(0, 'Titulo') ?>" 
                    required
                >
            </div>

            <div class="col-md-4">
                <label for="Status">Status</label>
                <select name="Status" id="Status" class="form-control" required>
                    <option value=""  <?= setValor2(0, 'Status') == ""  ? "SELECTED": "" ?>>...</option>
                    <option value="1" <?= setValor2(0, 'Status') == "1" ? "SELECTED": "" ?>>Ativo</option>
                    <option value="2" <?= setValor2(0, 'Status') == "2" ? "SELECTED": "" ?>>Inativo</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for="Blog" class="form-label">Blog</label>
                <select type="text" class="form-control" id="Blog" name="Blog" aria-describedby="Blog" required>
                    <option value=""  <?= setValor2(0, 'Blog') == ""  ? "SELECTED": "" ?>>...</option>
                    <?php foreach ($dados[1] as $blog): ?>
                        <option value="<?= $blog["id"] ?>"  <?= setValor2(0, 'Blog') == $blog["id"]  ? "SELECTED": "" ?>><?= $blog["Titulo"] ?></option>
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
                    required
                ><?= setValor2(0, 'Descricao') ?></textarea>
            </div>

            <input type="hidden" name="id" id="id" value="<?= setValor2(0, 'id') ?>">
        </div>
        <?php if ($this->getAcao() != 'view'): ?>
            <div class="row my-auto mx-auto justify-content-center p-5">
                <button type="submit" class="btn btn-outline-danger">Gravar</button>
            </div>
        <?php endif; ?>
    </form>
</div>

<?= $this->loadView("Comuns/rodape") ?>