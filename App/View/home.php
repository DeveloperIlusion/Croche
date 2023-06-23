<div class="home-banner">
    <img src="<?= baseUrl() ?>uploads/logo_crochê-branca.png" class="img-fluid banner-image" type="image/png">
    <h1 class="banner-title" >Seja Bem-vindo!</h1>
</div>

<div class="container mb-5">
    <div class="row mt-5">
        <div class="col-md-6 home-bloco-4 alignment">
            <img class="d-block img-fluid images-personalize alignment img-resolution card-shadow-static" src="<?= baseUrl()?>uploads/novelos.jpg" alt="Primeiro Slide">
        </div>
        <div class="col-md-6 p-5 home-bloco-3 alignment">
            <h2 class="justify-content-center text-center titulo-home">Temos o que você precisa!</h2>
            <p class="justify-content-center text-justify texto-home">
                Se você está procurando algo especial para trabalhar, temos fios de seda,
                que são macios e suaves ao toque, perfeitos para criar roupas elegantes e acessórios requintados. 
                Para aqueles que amam a textura, temos fios de lã, que são ideais para fazer mantas e cachecóis. 
                E se você é apaixonado por cores, nossos fios de algodão coloridos oferecem uma infinidade de opções 
                para criar peças vibrantes e alegres.
            </p>
            <a href="<?= baseUrl() ?>Home/loja">
                <button class="btn btn-outline-danger col-12">Loja</button>
            </a>
        </div>
    </div>

    <div class="row mt-5 hiddenToPC">
        <div class="col-md-6 home-bloco-5 alignment">
            <img class="d-block img-fluid images-personalize alignment img-resolution card-shadow-static" src="<?= baseUrl()?>uploads/exemplo-tutoriais.jpg" alt="Primeiro Slide">
        </div>
        <div class="col-md-6 p-5 home-bloco-6 alignment">
            <h2 class="justify-content-center text-center titulo-home">Venha Dar uma Olhada nas nossas dicas!</h2>
            <p class="justify-content-center text-justify texto-home">
                Nossa seção de dicas está sempre sendo atualizada com técnicas de crochê para iniciantes e experientes, 
                desde fundamentos até técnicas avançadas. Compartilhamos padrões de crochê de alta qualidade 
                para moda e decoração. Oferecemos dicas para seleção de fios e cuidado com seus projetos acabados. 
                Temos também vários outros tutoriais disponíveis nas nossas redes sociais. Dê uma conferida!
            </p>
            <a href="<?= baseUrl() ?>Home/blogs">
                <button class="btn btn-outline-danger col-12">Dicas</button>
            </a>
        </div>
    </div>

    <div class="row mt-5 hiddenToMobile">
        <div class="col-md-6 p-5 home-bloco-6 alignment">
            <h2 class="justify-content-center text-center titulo-home">Venha Dar uma Olhada nas nossas dicas!</h2>
            <p class="justify-content-center text-justify texto-home">
                Nossa seção de dicas está sempre sendo atualizada com técnicas de crochê para iniciantes e experientes, 
                desde fundamentos até técnicas avançadas. Compartilhamos padrões de crochê de alta qualidade 
                para moda e decoração. Oferecemos dicas para seleção de fios e cuidado com seus projetos acabados. 
                Temos também vários outros tutoriais disponíveis nas nossas redes sociais. Dê uma conferida!
            </p>
            <a href="<?= baseUrl() ?>Home/blogs">
                <button class="btn btn-outline-danger col-12">Dicas</button>
            </a>
        </div>
        <div class="col-md-6 home-bloco-5 alignment">
            <img class="d-block img-fluid images-personalize alignment img-resolution card-shadow-static" src="<?= baseUrl()?>uploads/exemplo-tutoriais.jpg" alt="Primeiro Slide">
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-md-6 home-bloco-1 alignment">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid carousel-images alignment img-resolution" src="<?= baseUrl()?>uploads/avo-faz-bonecos.jpg" alt="Primeiro Slide">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid carousel-images alignment img-resolution" src="<?= baseUrl()?>uploads/idosas-2.png" alt="Segundo Slide">
                        <div class="carousel-caption d-none d-md-block">
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Próximo</span>
                </a>
            </div>
        </div>
        <div class="col-md-6 p-5 home-bloco-2 alignment">
            <h2 class="justify-content-center text-center titulo-home">Seu sorriso é a nossa meta!</h2>
            <p class="justify-content-center text-justify texto-home">
                Nosso objetivo é trazer alegria aos clientes ao permitir que
                pratiquem seu hobby. Oferecemos os melhores materiais,
                desde fios macios até agulhas confortáveis, para iniciantes e experientes. 
                Praticar crochê traz satisfação e equilíbrio à
                vida, e estamos comprometidos em ajudar nisso. Venha nos visitar para encontrar a alegria no crochê!
            </p>
            <a href="<?= baseUrl() ?>Home/sobreNos">
                <button class="btn btn-outline-danger col-12">Sobre Nós</button>
            </a>
        </div>
    </div>
</div>