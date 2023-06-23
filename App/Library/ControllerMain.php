<?php

namespace App\Library;

class ControllerMain
{
    public $dados;
    public $model;

    /**
     * construct
     *
     * @param mixed $dados 
     */
    public function __construct($dados)
    {
        $this->auxiliarConstruct($dados);
    }

    /**
     * auxiliarConstruct
     *
     * @param mixed $dados 
     * @return void
     */
    public function auxiliarConstruct($dados)
    {
        $this->dados = $dados;
        $this->loadHelper("Ambiente");
        $this->loadHelper("Lista");

        // criando o objeto do Model e conectando a base de dados

        $cModel = $dados['model'] . "Model";

        if (file_exists("App/Model/" . $cModel . ".php")) {
            require_once "App/Model/" . $cModel . ".php";
            $this->model = new $cModel();
        }
    }

    /**
     * loadView
     *
     * @param string $nameView 
     * @param array $dados 
     * @return void
     */
    public function loadView(string $nameView, array $dados = [])
    {
        $aData = $dados;
        $pathView = "App" . DS . 'View' . DS;
        $nameView = str_replace('/', DS, $nameView) . '.php';

        if (Session::get("inputs") != false) {
            $dados = Session::getDestroy('inputs');
        }

        if (count($dados) > 0) {
            $_POST = $dados;
        }

        if (file_exists($pathView . $nameView)) {
            require_once $pathView . $nameView;
        } else {
            require_once $pathView . 'Comuns' . DS . 'erros.php';
        }
    }

    /**
     * loadHelper
     *
     * @param string $nome 
     * @return void
     */
    public function loadHelper($nome)
    {
        if (file_exists("App/Helper/{$nome}.php")) {
            require_once "App/Helper/{$nome}.php";
        }
    }

    /**
     * loadModel
     *
     * @param string $nomeModel 
     * @return object
     */
    public function loadModel($nomeModel)
    {
        $nomeModel .= 'Model';

        if (file_exists("App/Model/" . $nomeModel . ".php")) {
            require_once "App/Model/" . $nomeModel . ".php";
            return new $nomeModel();
        } else {
            return null;
        }
    }

    /**
     * getController - Retorna o nome do controller atual
     *
     * @return string
     */
    public function getController()
    {
        return $this->dados['controller'];
    }

    /**
     * getAcao - retorna a ação atual que foi chamada
     *
     * @return string
     */
    public function getAcao()
    {
        return $this->dados['acao'];
    }

    /**
     * getId
     *
     * @return integer
     */
    public function getId()
    {
        return $this->dados['id'];
    }

    /**
     * getOutrosParametros
     *
     * @return array
     */
    public function getOutrosParametros()
    {
        return $this->dados['outrosParametros'];
    }

    /**
     * getPost
     *
     * @param string $key 
     * @return mixed    
     */
    public function getPost($key = null)
    {
        if ($key == null) {
            return $this->dados['post'];
        } else {
            return $this->dados['post'][$key];
        }
    }

    /**
     * getGet
     *
     * @return string
     */
    public function getGet()
    {
        return $this->dados['get'];
    }

    /**
     * getAdministrador
     *
     * @return boolean
     */
    public function getAdministrador()
    {
        if (Session::get("usuarioId") != "") {
            if (Session::get("usuarioNivel") == 1) {
                return true;
            }            
        }

        return false;
    }
}