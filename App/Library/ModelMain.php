<?php

namespace App\Library;

class ModelMain
{
    protected $db;
    public $table;
    public $validationRules;

    public function __construct()
    {
        $this->db = new Database(
            $_ENV['DB_CONNECTION'], 
            $_ENV['DB_HOST'], 
            $_ENV['DB_PORT'], 
            $_ENV['DB_DATABASE'], 
            $_ENV['DB_USERNAME'], 
            $_ENV['DB_PASSWORD']
        );

        $validationRules = [];
    }

    /**
     * lista
     *
     * @param string $orderBy 
     * @return array
     */
    public function lista($orderBy = ['id'])
    {
        return $this->db->select($this->table, "all", ['orderby' => $orderBy]);
    }

    /**
     * getById
     *
     * @param integer $id 
     * @return array
     */
    public function getById($id)
    {
        if ($id == 0) {
            return [];
        } else {
            return $this->db->select($this->table, "first", ['where' => ['id' => $id]]);
        }
    }

    /**
     * getWhere
     *
     * @param string $column
     * @param mixed $param 
     * @return array
     */
    public function getWhere($column, $param)
    {
        if ($column == 0) {
            return [];
        } else {
            return $this->db->select($this->table, "all", ['where' => ["{$column}" => $param]]);
        }
    }

    /**
     * insert
     *
     * @param array $aCampos 
     * @return bool
     */
    public function insert($aCampos)
    {
        if ($this->db->insert($this->table, $aCampos) > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * update
     *
     * @param array $aWhere 
     * @param array $dados 
     * @return void
     */
    public function update($aWhere, $dados)
    {
        if ($this->db->update($this->table, $aWhere, $dados) > 0) {
            return true;
        } else {
            return false;
        }
    }

        /**
     * delete
     *
     * @param integer $dados 
     * @return boolean
     */
    public function delete($aWhere)
    {
        $rsc = $this->db->delete($this->table, $aWhere);

        if ($rsc > 0) {
            return true;
        } else {
            return false;
        }
    }
}