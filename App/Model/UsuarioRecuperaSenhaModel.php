<?php

use App\Library\ModelMain;

class UsuarioRecuperaSenhaModel extends ModelMain
{
    public $table = "usuariorecuperasenha";

    /**
     * getRecuperaSenhaChave - Recuperar os dados do usuário especificado em $email
     *
     * @param string $chave 
     * @return array
     */
    public function getRecuperaSenhaChave($chave) 
    {
        $dados  = $this->db->select(
            $this->table, 
            "first",
            [
                "where" => [
                    "statusRegistro" => 1, 
                    "chave" => $chave
                ]
            ]
        );

        if ($dados == false) {
            return [];
        } else {            
            return $dados;
        }
    }

    /**
     * desativaChave - Desativa chave de acesso
     *
     * @param mixed $id 
     * @return void
     */
    function desativaChave($id) 
    {
        $rs = $this->db->update($this->table,
            ["id" => $id],
            ["statusRegistro" => 2]            
        );
        
        if ($rs > 0) {
            return true;
        } else {
            return false;
        }      
    }

    /**
     * desativaChave - Desativa chave de acesso
     *
     * @param mixed $id 
     * @return void
     */
    function desativaChaveAntigas($id) 
    {
        $rs = $this->db->update($this->table,
            ["id <>" => $id],
            ["statusRegistro" => 2]            
        );
        
        if ($rs > 0) {
            return true;
        } else {
            return false;
        }      
    }
}