<?php

use App\Library\ModelMain;

class BlogsModel extends ModelMain
{
    public $table = "blog";

    public $validationRules = [
        'Titulo' => [
            'label' => 'Titulo',
            'rules' => 'required|min:3|max:255'
        ],
        'Video' => [
            'label' => 'Titulo',
            'rules' => 'required'
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