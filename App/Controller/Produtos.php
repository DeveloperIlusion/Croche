<?php

use App\Library\ControllerMain;
use App\Library\Redirect;
use App\Library\Session;
use App\Library\UploadImages;
use App\Library\Validator;

class Produtos extends ControllerMain
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
        if (!$this->getAdministrador()) {
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
        return $this->loadView(
            "Admin/listaProdutos",
            $this->model->lista()
        );  
    }

    /**
     * form
     *
     * @return void
     */
    public function form()
    {
        $this->loadHelper("Formulario");

        $ProdutosModel = $this->loadModel('Produtos');
        $CategoriaModel = $this->loadModel('Categoria');
        $dados[0] = $ProdutosModel->getById($this->getId());
        $dados[1] = $CategoriaModel->lista();

        $this->loadView(
            "Admin/formProdutos",
            $dados
        );

        return;
    }

    /**
     * insert
     *
     * @return void
     */
    public function insert()
    {
        $post = $this->getPost();

        if (Validator::make($post, $this->model->validationRules)) {
            // error
            return Redirect::page("Produtos/form/insert");
        } else {

            if (!empty($_FILES['imagem']['name'])) {

                // Faz uploado da imagem
                $nomeRetornado = UploadImages::upload($_FILES, 'produtos');

                // se for boolean, significa que o upload falhou
                if (is_bool($nomeRetornado)) {
                    Session::set( 'inputs' , $post );
                    return Redirect::page("Produtos/form/update/" . $post['id']);
                }

            } else {
                $nomeRetornado = $post['nomeImagem'];
            }

            if ($this->model->insert([
                "Titulo" => $post['Titulo'],
                "Descricao" => $post['Descricao'],
                "Preco" => $post['Preco'],
                "Categoria" => $post['Categoria'],
                "Status" => $post['Status'],
                'imagem' => $nomeRetornado
            ])) {
                Session::set("msgSuccess", "Produto adicionado com sucesso.");
            } else {
                Session::set("msgError", "Falha tentar inserir um novo produto.");
            }
    
            Redirect::page("Produtos");
        }
    }

    /**
     * update
     *
     * @return void
     */
    public function update()
    {
        $post = $this->getPost();

        if (Validator::make($post, $this->model->validationRules)) {
            // error
            return Redirect::page("Produtos/form/update/" . $post['id']);
        } else {

            if (!empty($_FILES['imagem']['name'])) {

                // Faz uploado da imagem
                $nomeRetornado = UploadImages::upload($_FILES, 'produtos');

                // se for boolean, significa que o upload falhou
                if (is_bool($nomeRetornado)) {
                    Session::set( 'inputs' , $post );
                    return Redirect::page("Produtos/form/update/" . $post['id']);
                }

                UploadImages::delete($post['nomeImagem'], 'Produtos');

            } else {
                $nomeRetornado = $post['nomeImagem'];
            }

            if ($this->model->update(
                [
                    "id" => $post['id']
                ], 
                [
                    "Titulo" => $post['Titulo'],
                    "Descricao" => $post['Descricao'],
                    "Preco" => $post['Preco'],
                    "Categoria" => $post['Categoria'],
                    "Status" => $post['Status'],
                    'imagem' => $nomeRetornado
                ]
            )) {
                Session::set("msgSuccess", "Produto alterado com sucesso.");
            } else {
                Session::set("msgError", "Falha ao tentar alterar o produto.");
            }

            return Redirect::page("Produtos");
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
            Session::set("msgSuccess", "Produto excluído com sucesso.");
        } else {
            Session::set("msgError", "Falha ao tentar excluir o produto.");
        }

        Redirect::page("Produtos");
    }
}