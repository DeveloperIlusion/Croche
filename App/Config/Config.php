<?php

    require_once "App" . DIRECTORY_SEPARATOR . "Config" . DIRECTORY_SEPARATOR . "Constants.php";
    require_once "system" . DIRECTORY_SEPARATOR . "Ambiente.php";
    require_once "system" . DIRECTORY_SEPARATOR . "AutoLoad.php";
    require_once "system" . DIRECTORY_SEPARATOR . "Routes.php";
    
    // time zone
    date_default_timezone_set('America/Sao_Paulo');

    // Carregando as variáveis de ambiente
    $ambiente = new Ambiente();

    $ambiente->load();