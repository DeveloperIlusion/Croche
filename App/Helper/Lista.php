<?php

function getStatusDescricao($status)
{
    $aStatus = [
        ["1" => 'Ativo'] ,
        ["2" => 'Inativo']
    ];

    if ($status == 1) {
        return "Ativo";
    } elseif ($status == 2) {
        return "Inativo";
    } else {
        return "...";
    }
}