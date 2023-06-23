<?php

class Routes
{
    /**
     * rota
     *
     * @param array $aPar 
     * @return object
     */
    public static function rota(array $aPar) : object
    {
        $aParamGet  = (isset($aPar['parametros']) ? $aPar['parametros'] : "Home");
        $controller = "";
        $metodo     = "index";
        $acao       = "";
        $id         = null;
        $outrosPar  = [];
        $pathContr  = "App" . DS . 'Controller' . DS;

        if (substr_count($aParamGet, "/") > 0) {

            $aParam     = explode("/", $aParamGet);
            $controller = $aParam[0];
            $metodo     = $aParam[1];

            // Pega a acao a ser executada e o ID
            if (isset($aParam[2])) {
                if (in_array($aParam[2], ['insert', 'update', 'delete', 'view'])) {
                    $acao   = (isset($aParam[2]) ? $aParam[2] : "");
                    $id     = (isset($aParam[3]) ? $aParam[3] : 0);
                } else {
                    $acao   = (isset($aParam[2]) ? $aParam[2] : "");
                }
            }

            // Outros parâmetros
            if (isset($aParam[4])) {
                for ($jjj = 4; $jjj < count($aParam); $jjj++) {
                    $outrosPar[] = $aParam[$jjj];
                }
            }

            //

        } else {
            $controller = $aParamGet;
        }

        // Verifica se o controller existe
        if (!file_exists($pathContr . $controller . ".php")) {
            $controller = 'Erros';
            $metodo = 'controllerNotFound';
        }

        // Carregamento do Controller
        require_once $pathContr . $controller . ".php";

        // Verificar se o método existe no controller
        if (!method_exists($controller, $metodo)) {
            $controller = 'Erros';
            $metodo = 'methodNotFound';

            // carregamento do Controller Error
            require_once $pathContr . $controller . ".php";
        }

        return new $controller([
            "controller"        => $controller,
            "metodo"            => $metodo,
            "acao"              => $acao,
            "id"                => $id,
            "outrosParametros"  => $outrosPar,
            "model"             => $controller,
            "get"               => $_GET,
            "post"              => $_POST
        ]);
    }
}