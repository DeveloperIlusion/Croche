<?php

use App\Library\ModelMain;

class CarrinhoModel extends ModelMain
{
    public $table = "carrinho";

    public $validationRules = [
        'Quantidade' => [
            'label' => 'Quantidade',
            'rules' => 'required|integer'
        ],
        'Preco' => [
            'label' => 'Preco',
            'rules' => 'required|double'
        ],
        'Produto' => [
            'label' => 'Produto',
            'rules' => 'required|integer'
        ],
        'Usuario' => [
            'label' => 'Usuario',
            'rules' => 'required|integer'
        ]
    ];
}