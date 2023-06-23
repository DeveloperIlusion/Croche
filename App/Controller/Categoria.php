<?php

use App\Library\ControllerMain;
use App\Library\Redirect;
use App\Library\Session;
use App\Library\UploadImages;
use App\Library\Validator;

class Categoria extends ControllerMain
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
            "Admin/listaCategoria",
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

        return $this->loadView(
            "Admin/formCategoria",
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

        if (Validator::make($post, $this->model->validationRules)) {
            // error
            return Redirect::page("Categoria/form/insert");
        } else {

            if (!empty($_FILES['imagem']['name'])) {

                // Faz uploado da imagem
                $nomeRetornado = UploadImages::upload($_FILES, 'categoria');

                // se for boolean, significa que o upload falhou
                if (is_bool($nomeRetornado)) {
                    Session::set( 'inputs' , $post );
                    return Redirect::page("Categoria/form/update/" . $post['id']);
                }

            } else {
                $nomeRetornado = $post['nomeImagem'];
            }

            if ($this->model->insert([
                "Categoria" => $post['Categoria'],
                "Descricao" => $post['Descricao'],
                "Status" => $post['Status']
            ])) {
                Session::set("msgSuccess", "Categoria adicionada com sucesso.");
            } else {
                Session::set("msgError", "Falha ao tentar inserir uma nova categoria.");
            }
    
            Redirect::page("Categoria");
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
            return Redirect::page("Categoria/form/update/" . $post['id']);
        } else {

            if (!empty($_FILES['imagem']['name'])) {

                // Faz uploado da imagem
                $nomeRetornado = UploadImages::upload($_FILES, 'categoria');

                // se for boolean, significa que o upload falhou
                if (is_bool($nomeRetornado)) {
                    Session::set( 'inputs' , $post );
                    return Redirect::page("Categoria/form/update/" . $post['id']);
                }

                UploadImages::delete($post['nomeImagem'], 'Categoria');

            } else {
                $nomeRetornado = $post['nomeImagem'];
            }

            if ($this->model->update(
                [
                    "id" => $post['id']
                ], 
                [
                    "Categoria" => $post['Categoria'],
                    "Descricao" => $post['Descricao'],
                    "Status" => $post['Status']
                ]
            )) {
                Session::set("msgSuccess", "Categoria alterada com sucesso.");
            } else {
                Session::set("msgError", "Falha ao tentar alterar a categoria.");
            }

            return Redirect::page("Categoria");
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
            Session::set("msgSuccess", "Categoria excluída com sucesso.");
        } else {
            Session::set("msgError", "Falha ao tentar excluir a categoria.");
        }

        Redirect::page("Categoria");
    }
}