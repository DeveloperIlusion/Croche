<?= $this->loadView('Comuns/cabecalho') ?>
<?= $this->loadView('Comuns/menu') ?>

<div class="texto-erro erro404" role="alert">
    <?php
        if (isset($dados['msgError'])) {
            echo $dados['msgError'];
        } else {
            echo 'Página não localizada...';
        }
    ?>    
</div>

<?= $this->loadView('Comuns/rodape') ?>