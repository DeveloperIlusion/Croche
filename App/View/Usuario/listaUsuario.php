<?php

use App\Library\Formulario;

echo $this->loadView("Comuns/cabecalho");
echo $this->loadView("Comuns/menu");

?>

<script type="text/javascript" src="<?= baseUrl() ?>assets/DataTables/datatables.min.js"></script>

<div class="container">

    <?= Formulario::titulo("Usuários") ?>

    <section class="login_box_area mb-5">
        <div class="table-responsive">
            <table id="tbListaUsuario" class="table table-dark table-striped table-hover table-borderless crudLogin-table mt-4 table-responsive">
                <thead>
                    <tr class="text-weigth-bold">
                        <th class="col-3">Nome</th>
                        <th class="col-4">E-mail</th>
                        <th class="col-1">Nível</th>
                        <th class="col-1">Status</th>
                        <th class="col-3">Controles</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($dados as $value): ?>
                        <tr>
                            <td class="col-3"><?= $value['nome'] ?></td>
                            <td class="col-4"><?= $value['email'] ?></td>
                            <td class="col-1"><?= ($value['nivel'] == 1 ? "Administrador" : "Visitante") ?></td>
                            <td class="col-1"><?= ($value['statusRegistro'] == 1 ? "Ativo" : "Inativo") ?></td>
                            <td class="col-3">
                                <?= Formulario::botao("view", $value['id']) ?>
                                <?= Formulario::botao("update", $value['id']) ?>
                                <?= Formulario::botao("delete", $value['id']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        
        </div>
    </section>
</div>

<?= Formulario::getDataTables("tbListaUsuario") ?>

<?= $this->loadView("Comuns/rodape") ?>