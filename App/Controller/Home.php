<?php

use App\Library\ControllerMain;
use App\Library\Email;
use App\Library\Redirect;
use App\Library\Session;
use App\Library\UploadImages;
use App\Library\Validator;
use App\Library\Database;

class Home extends ControllerMain
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $this->loadView('Comuns/cabecalho');
        $this->loadView('Comuns/menu');
        $this->loadView('home');
        $this->loadView('Comuns/rodape');
    }

    public function sobreNos()
    {
        $this->loadView('Comuns/cabecalho');
        $this->loadView('Comuns/menu');
        $this->loadView('sobreNos');
        $this->loadView('Comuns/rodape');
    }

    public function faleConosco()
    {
        $this->loadView('Comuns/cabecalho');
        $this->loadView('Comuns/menu');
        $this->loadView('faleConosco');
        $this->loadView('Comuns/rodape');
    }

    /**
     * contatoEnviaEmail
     *
     * @return void
     */
    public function contatoEnviaEmail()
    {
        $post = $this->getPost();
        $anexos = $_FILES['attachments'];

        $lRetMail = Email::enviaEmail(
            $post['email'],                             /* Email do Remetente*/
            $post['name'],                              /* Nome do Remetente */
            $post['topic'],                           /* Assunto do e-mail */
            $post['message'],                          /* Corpo do E-mail */
            "neoguildaoficial@gmail.com",                 /* Destinatário do E-mail */
            $anexos
        );

        if ($lRetMail) {
            return Redirect::page("Home/faleConosco", ["msgSuccess" => "E-mail de contato enviado com sucesso, lhe daremos um retorno em breve."]);
        } else {
            return Redirect::page("Home/faleConosco");
        }
    }

    public function criarConta()
    {
        $this->loadView('Comuns/cabecalho');
        $this->loadView('Comuns/menu');

        $this->loadHelper('Formulario');
        $this->loadView("Usuario/formCadastro", []);

        $this->loadView('Comuns/rodape');
        return;
    }

    public function login()
    {
        $this->loadView('Comuns/cabecalho');
        $this->loadView('Comuns/menu');

        $this->loadView('Usuario/login');

        $this->loadView('Comuns/rodape');
        return;
    }

    public function loja()
    {
        $this->loadView('Comuns/cabecalho');
        $this->loadView('Comuns/menu');

        $ProdutosModel = $this->loadModel('Produtos');
        $CategoriaModel = $this->loadModel('Categoria');
        
        $filtro = array_filter($_POST);
        if (!empty($filtro)) {
            if (!empty($filtro["Titulo"])) {
                $dados[0] = $ProdutosModel->getWhere("Titulo", $filtro["Titulo"]);
            } elseif (!empty($filtro["Categoria"])) {
                $dados[0] = $ProdutosModel->getWhere("Categoria", $filtro["Categoria"]);
            }
        } else {
            $dados[0] = $ProdutosModel->lista();
        }
        $dados[1] = $CategoriaModel->lista();
        $this->loadView("loja", $dados);

        $this->loadView('Comuns/rodape');
        return;
    }

    public function produto()
    {
        $this->loadView('Comuns/cabecalho');
        $this->loadView('Comuns/menu');

        $ProdutosModel = $this->loadModel('Produtos');
        $get = explode( "/", $_GET["parametros"]);
        $this->loadView("produto", $ProdutosModel->getById($get[2]));

        $this->loadView('Comuns/rodape');
        return;
    }

    public function blogs()
    {
        $this->loadView('Comuns/cabecalho');
        $this->loadView('Comuns/menu');

        $BlogsModel = $this->loadModel('Blogs');
        $filtro = array_filter($_POST);
        if (!empty($filtro)) {
            if (!empty($filtro["Titulo"])) {
                $dados = $BlogsModel->getWhere("Titulo", $filtro["Titulo"]);
            }
        } else {
            $dados = $BlogsModel->lista();
        }
        
        $this->loadView("blogs", $dados);

        $this->loadView('Comuns/rodape');
        return;
    }

    public function blog()
    {
        $this->loadView('Comuns/cabecalho');
        $this->loadView('Comuns/menu');
        
        $BlogsModel = $this->loadModel('Blogs');
        $get = explode( "/", $_GET["parametros"]);
        $dados[0] = $BlogsModel->getById($get[2]);

        $BlogEtapasModel = $this->loadModel('BlogEtapas');
        $dados[1] = $BlogEtapasModel->getWhere("Blog", $get[2]);

        $this->loadView("blog", $dados);

        $this->loadView('Comuns/rodape');
        return;
    }
}