<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-6">
        <iframe 
            src="<?= $dados[0]["Video"]; ?>" 
            title="YouTube video player" 
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
            allowfullscreen
            class="tip-video">
        </iframe>
        </div>
        <div class="col-md-6 my-auto p-5 text-justify">
            <h2 class="tip-title text-center mb-4"><?= $dados[0]["Titulo"]; ?></h2>
            <p>
                <?= $dados[0]["Descricao"]; ?>
            </p>
        </div>
    </div>
    <h2 class="tip-title text-center mt-5">PASSO-A-PASSO</h2>
    <div class="row mt-4 mx-auto">
        <?php if (!empty($dados[1])):
            foreach ($dados[1] as $passoApasso): 
                if ($passoApasso['Status'] == 1): ?>
                        <div class="col-md-4 p-3 mx-auto">
                            <div class="card justify-content-center text-justify card-shadow">
                                <div class="tip-card-title">
                                    <h6 class="text-center icons-title"><?= $passoApasso['Titulo'] ?></h6>
                                </div>
                                <div class="card-body">
                                    <p class="card-text p-2">
                                        <?= $passoApasso['Descricao'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                <?php endif; ?>
            <?php endforeach;?>
        <?php else:?>
            <h5 class="card-title titulo-produtos my-auto mx-auto">passo-à-passo ainda não adicionado.</h5>
        <?php endif; ?>
    </div>
</div>