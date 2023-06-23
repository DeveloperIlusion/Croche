<?php

use App\Library\ModelMain;

class BlogEtapasModel extends ModelMain
{
    public $table = "blog-etapas";

    public $validationRules = [
        'Titulo' => [
            'label' => 'Titulo',
            'rules' => 'required|min:3|max:255'
        ],
        'Descricao' => [
            'label' => 'Descrição',
            'rules' => 'required|min:3|max:500'
        ],
        'Blog' => [
            'label' => 'Blog',
            'rules' => 'required|integer'
        ],
        'Status' => [
            'label' => 'Status',
            'rules' => 'required|integer'
        ]
    ];
}