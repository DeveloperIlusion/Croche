<?php

use App\Library\ModelMain;

class CategoriaModel extends ModelMain
{
    public $table = "categoria";

    public $validationRules = [
        'Categoria' => [
            'label' => 'Categoria',
            'rules' => 'required|min:3|max:255'
        ],
        'Descricao' => [
            'label' => 'Descrição',
            'rules' => 'required|min:3|max:500'
        ],
        'Status' => [
            'label' => 'Status',
            'rules' => 'required|integer'
        ]
    ];
}