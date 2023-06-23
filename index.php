<?php

    session_start();

    // Carregando arquivo de configurações
    require_once "App" . DIRECTORY_SEPARATOR . 'Config' . DIRECTORY_SEPARATOR . 'config.php';


    // Instanciando a classe AutoLoad
    $AutoLoad = new AutoLoad();

    // Registrando o autoload com o spl
    spl_autoload_register([$AutoLoad, 'library']);

    // Criando e carregando
    $myController = Routes::rota($_GET);

    //Carrega o nome do método a ser executado
    $metodo = $myController->dados['metodo'];

    // Executa o método do controller  
    $myController->$metodo();