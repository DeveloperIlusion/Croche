<?php

use App\Library\Formulario;

    echo $this->loadView("Comuns/cabecalho");
    echo $this->loadView("Comuns/menu");
?>

<script type="text/javascript" src="<?= baseUrl() ?>assets/DataTables/datatables.min.js"></script>

<div class="container mt-5 mb-5">
    <?= Formulario::titulo('Produtos'); ?>
    <table id="tblListaProdutos" class="table table-dark table-striped table-hover table-borderless crudLogin-table mt-4 table-responsive">
        <thead>
            <tr>
                <th class="col-2">Nome do Produto</th>
                <th class="col-1">Preço</th>
                <th class="col-3">Descrição</th>
                <th class="col-1">Status</th>
                <th class="col-4">Controles</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dados as $produto): ?>
                <tr>
                    <td class="col-2"><?= $produto['Titulo'] ?></td>
                    <td class="col-1"><?= $produto['Preco'] ?></td>
                    <td class="col-3"><?= $produto['Descricao'] ?></td>
                    <td class="col-1"><?= $produto['Status'] == 1 ? "Ativo" : "Inativo" ?></td>
                    <td class="col-4">
                        <?= Formulario::botao("view", $produto['id']) ?>
                        <?= Formulario::botao("update", $produto['id']) ?>
                        <?= Formulario::botao("delete", $produto['id']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= Formulario::getDataTables("tblListaProdutos") ?>

<?= $this->loadView("Comuns/rodape") ?>