<?php

use App\Library\ControllerMain;
use App\Library\Redirect;
use App\Library\Session;
use App\Library\UploadImages;
use App\Library\Validator;

class BlogEtapas extends ControllerMain
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
            "Admin/listaBlogEtapas",
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

        $BlogEtapasModel = $this->loadModel('BlogEtapas');
        $BlogsModel = $this->loadModel('Blogs');
        $dados[0] = $BlogEtapasModel->getById($this->getId());
        $dados[1] = $BlogsModel->lista();

        $this->loadView(
            "Admin/formBlogEtapas",
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
            return Redirect::page("BlogEtapas/form/insert");
        } else {

            if ($this->model->insert([
                "Titulo" => $post['Titulo'],
                "Descricao" => $post['Descricao'],
                "Blog" => $post['Blog'],
                "Status" => $post['Status']
            ])) {
                Session::set("msgSuccess", "Passo-a-passo adicionado com sucesso.");
            } else {
                Session::set("msgError", "Falha ao tentar inserir um novo passo-a-passo.");
            }
    
            Redirect::page("BlogEtapas");
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
            return Redirect::page("BlogEtapas/form/update/" . $post['id']);
        } else {
            if ($this->model->update(
                [
                    "id" => $post['id']
                ], 
                [
                    "Titulo" => $post['Titulo'],
                    "Descricao" => $post['Descricao'],
                    "Blog" => $post['Blog'],
                    "Status" => $post['Status']
                ]
            )) {
                Session::set("msgSuccess", "Passo-a-passo alterado com sucesso.");
            } else {
                Session::set("msgError", "Falha ao tentar alterar o passo-a-passo.");
            }

            return Redirect::page("BlogEtapas");
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
            Session::set("msgSuccess", "Passo-a-passo excluído com sucesso.");
        } else {
            Session::set("msgError", "Falha ao tentar excluir o passo-a-passo.");
        }

        Redirect::page("BlogEtapas");
    }
}