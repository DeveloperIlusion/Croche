<?php

use App\Library\Session;

/**
 * setValor
 *
 * @param string $campo 
 * @param mixed $default 
 * @return mixed
 */
function setValor($campo, $default = "")
{
    if (isset($_POST[$campo])) {
        return $_POST[$campo];
    } else {
        return $default;
    }
}

function setValor2($index, $campo, $default = "")
{
    if (isset($_POST[$index][$campo])) {
        return $_POST[$index][$campo];
    } else {
        return $default;
    }
}