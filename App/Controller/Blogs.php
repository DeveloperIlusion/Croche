<?php

use App\Library\ControllerMain;
use App\Library\Redirect;
use App\Library\Session;
use App\Library\UploadImages;
use App\Library\Validator;

class Blogs extends ControllerMain
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
            "Admin/listaBlogs",
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
            "Admin/formBlogs",
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
            return Redirect::page("Blogs/form/insert");
        } else {

            if (!empty($_FILES['imagem']['name'])) {

                // Faz uploado da imagem
                $nomeRetornado = UploadImages::upload($_FILES, 'blogs');

                // se for boolean, significa que o upload falhou
                if (is_bool($nomeRetornado)) {
                    Session::set( 'inputs' , $post );
                    return Redirect::page("Blogs/form/update/" . $post['id']);
                }

            } else {
                $nomeRetornado = $post['nomeImagem'];
            }

            if ($this->model->insert([
                "Titulo" => $post['Titulo'],
                "Descricao" => $post['Descricao'],
                "Video" => $post['Video'],
                "Status" => $post['Status'],
                'imagem' => $nomeRetornado
            ])) {
                Session::set("msgSuccess", "Blog adicionado com sucesso.");
            } else {
                Session::set("msgError", "Falha ao tentar inserir um novo blog.");
            }
    
            Redirect::page("Blogs");
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
            return Redirect::page("Blogs/form/update/" . $post['id']);
        } else {

            if (!empty($_FILES['imagem']['name'])) {

                // Faz uploado da imagem
                $nomeRetornado = UploadImages::upload($_FILES, 'blogs');

                // se for boolean, significa que o upload falhou
                if (is_bool($nomeRetornado)) {
                    Session::set( 'inputs' , $post );
                    return Redirect::page("Blogs/form/update/" . $post['id']);
                }

                UploadImages::delete($post['nomeImagem'], 'Blogs');

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
                    "Video" => $post['Video'],
                    "Status" => $post['Status'],
                    'imagem' => $nomeRetornado
                ]
            )) {
                Session::set("msgSuccess", "Blog alterado com sucesso.");
            } else {
                Session::set("msgError", "Falha ao tentar alterar o blog.");
            }

            return Redirect::page("Blogs");
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
            Session::set("msgSuccess", "Blog excluído com sucesso.");
        } else {
            Session::set("msgError", "Falha ao tentar excluir o blog.");
        }

        Redirect::page("Blogs");
    }
}