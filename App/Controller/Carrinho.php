<?php

use App\Library\ControllerMain;
use App\Library\ModelMain;
use App\Library\Redirect;
use App\Library\Session;
use App\Library\UploadImages;
use App\Library\Validator;

class Carrinho extends ControllerMain
{
    /**
     * construct
     *
     * @param mixed $dados 
     */
    public function __construct($dados)
    {
        $this->auxiliarConstruct($dados);

        // Somente pode ser acessado por usuários adminsitradores
        if (empty(Session::get("usuarioId"))) {
            Redirect::page("Home");
        }
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        $count = 0;
        $dados[0] = $this->model->getWhere("Usuario", $_SESSION["usuarioId"]);
        foreach ($dados[0] as $produtosNoCarrinho) {
            $ProdutosModel = $this->loadModel('Produtos');
            $dadosProduto = $ProdutosModel->getById($produtosNoCarrinho["Produto"]);
            $produtosNoCarrinho["imagem"] = $dadosProduto["imagem"];
            $produtosNoCarrinho["Status"] = $dadosProduto["Status"];
            $produtosNoCarrinho["Titulo"] = $dadosProduto["Titulo"];
            $produtosNoCarrinho["Preco"] = $dadosProduto["Preco"];
            $dados[$count] = $produtosNoCarrinho;
            $count++;
        }

        return $this->loadView("carrinho", $dados);
    }

    /**
     * form
     *
     * @return void
     */
    public function form()
    {
        $this->loadHelper("Formulario");

        return $this->loadView(
            "produto",
            $this->model->getById($this->getId())
        );
    }

    /**
     * insert
     *
     * @return void
     */
    public function insert()
    {
        $post = $this->getPost();
        $post["Usuario"] = $_SESSION["usuarioId"];

        if (Validator::make($post, $this->model->validationRules)) {
            // error
            return Redirect::page("Carrinho/insert");
        } else {
            $verificador = false;
            $carrinho = $this->model->lista();
            foreach ($carrinho as $produto) {
                if ($produto["Usuario"] == $post["Usuario"] && $produto["Produto"] == $post["Produto"]) {
                    if ($this->model->update(
                        [
                            "id" => $produto['id']
                        ], 
                        [
                            "Quantidade" => $post['Quantidade'] + $produto["Quantidade"],
                            "Usuario" => $post['Usuario'],
                            "Produto" => $post['Produto']
                        ]
                    ))  {
                        Session::set("msgSuccess", "Produto adicionado ao carrinho.");
                    } else {
                        Session::set("msgError", "Falha ao tentar adicionar produto ao carrinho.");
                    }
                    $verificador = true;
                }
            }
            if ($verificador == false) {
                if ($this->model->insert([
                    "Quantidade" => $post['Quantidade'],
                    "Usuario" => $post["Usuario"],
                    "Produto" => $post['Produto']
                ])) {
                    Session::set("msgSuccess", "Produto adicionado ao carrinho.");
                } else {
                    Session::set("msgError", "Falha ao tentar adicionar produto ao carrinho.");
                }
            }
            Redirect::page("Carrinho");
        }
    }

    /**
     * delete
     *
     * @return void
     */
    public function delete()
    {
        if ($this->model->delete(["id" => $this->getPost('id')])) {
            Session::set("msgSuccess", "Produto removido do carrinho.");
        } else {
            Session::set("msgError", "Erro ao remover produto do carrinho.");
        }

        Redirect::page("Carrinho");
    }
}