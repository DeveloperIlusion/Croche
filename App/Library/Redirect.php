<?php

namespace App\Library;

class Redirect
{
    /**
     * Redirecina a página para o endereço indicado em $caminho
     *
     * @param string $caminho 
     * @param array $with
     * @return void
     */
    static public function page($caminho, $with = [])
    {
        if (count($with) > 0) {
            foreach ($with as $key => $value) {
                Session::set($key, $value);
            }
        }

        return header("Location: " . baseUrl() . $caminho);
    }
}
