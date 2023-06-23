<?php

use App\Library\Formulario;

    echo $this->loadView("Comuns/cabecalho");
    echo $this->loadView("Comuns/menu");
?>

<script type="text/javascript" src="<?= baseUrl() ?>assets/DataTables/datatables.min.js"></script>

<div class="container mt-5 mb-5">
    <?= Formulario::titulo('Passo-À-Passo'); ?>
    <table id="tblListaBlogEtapas" class="table table-dark table-striped table-hover table-borderless crudLogin-table mt-4 table-responsive">
        <thead>
            <tr>
                <th class="col-2">Título</th>
                <th class="col-5">Descrição</th>
                <th class="col-1">Status</th>
                <th class="col-4">Controles</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dados as $blog): ?>
                <tr>
                    <td class="col-2"><?= $blog['Titulo'] ?></td>
                    <td class="col-5"><?= $blog['Descricao'] ?></td>
                    <td class="col-1"><?= $blog['Status'] == 1 ? "Ativo" : "Inativo" ?></td>
                    <td class="col-4">
                        <?= Formulario::botao("view", $blog['id']) ?>
                        <?= Formulario::botao("update", $blog['id']) ?>
                        <?= Formulario::botao("delete", $blog['id']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?= Formulario::getDataTables("tblListaBlogEtapas") ?>

<?= $this->loadView("Comuns/rodape") ?>