<?php

class Ambiente
{
    /**
     * load
     *
     * @return void
     */
    public function load()
    {
        if (file_exists('.env')) {

            $configAmbiente = parse_ini_file('.env', true);

            foreach ($configAmbiente AS $key => $value) {
                if (gettype($configAmbiente[$key]) != "array") {
                    $_ENV[$key] = $value;
                }
            }
    
            $_ENV['ENVIRONMENT'] = $configAmbiente['ENVIRONMENT'];
    
            foreach ($configAmbiente[$configAmbiente['ENVIRONMENT']] as $key => $value) {
                $_ENV[$key] = $value;
            }

        } else {

            echo "Arquivo de configuração .env não localizado na pasta raiz do projeto.";
            exit;

        }

        return null;
    }
}