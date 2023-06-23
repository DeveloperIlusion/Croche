<?php

use App\Library\ControllerMain;
use App\Library\Redirect;

class Erros extends ControllerMain
{
    /**
     * controllerNotFound
     *
     * @return void
     */
    public function controllerNotFound()
    {
        if ($_ENV["ENVIRONMENT"] == "PRODUCTION") {
            if (!$this->getAdministrador()) {
                Redirect::page("Home");
            }
        } else {
            $this->loadView('Comuns/erros', [
                'msgError' => "Controller não Localizado."
            ]);
        }
    }

    /**
     * methodNotFound
     *
     * @return void
     */
    public function methodNotFound()
    {
        $this->loadView('Comuns/erros', [
            'msgError' => "Método não localizado no controller"
        ]);
    }
}