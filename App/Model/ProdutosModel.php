<?php

use App\Library\ModelMain;

class ProdutosModel extends ModelMain
{
    public $table = "produtos";

    public $validationRules = [
        'Titulo' => [
            'label' => 'Titulo',
            'rules' => 'required|min:3|max:255'
        ],
        'Preco' => [
            'label' => 'Preco',
            'rules' => 'required|double'
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