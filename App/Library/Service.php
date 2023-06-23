<?php

namespace App\Library;

class Service
{
    private $controller;
    private $metodo;
    private $acao;

    /**
     * construct
     */
    public function __construct()
    {
        $aParamGet  = (isset($_GET['parametros']) ? $_GET['parametros'] : "Home");
        $this->controller = "";
        $this->metodo     = "index";
        $this->acao       = "";

        if (substr_count($aParamGet, "/") > 0) {

            $aParam     = explode("/", $aParamGet);
            $this->controller = $aParam[0];
            $this->metodo     = $aParam[1];

            // Pega a acao a ser executada e o ID
            if (isset($aParam[2])) {
                if (in_array($aParam[2], ['insert', 'update', 'delete', 'view'])) {
                    $this->acao   = (isset($aParam[2]) ? $aParam[2] : "");
                } else {
                    $this->acao   = (isset($aParam[2]) ? $aParam[2] : "");
                }
            }

        } else {
            $this->controller = $aParamGet;
        }    
    }

    /**
     * getController
     *
     * @return string
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * getMetodo
     *
     * @return string
     */
    public function getMetodo()
    {
        return $this->metodo;
    }

    /**
     * getAcao
     *
     * @return string
     */
    public function getAcao()
    {
        return $this->acao;
    }
}