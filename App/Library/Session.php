<?php
namespace App\Library;

class Session
{
    /**
     * set - Seta o valor para uma sessão
     *
     * @param string $key 
     * @param mixed $value 
     * @return void
     */
    static public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * get - retorna o valor de uma sessão
     *
     * @param string $key 
     * @return mixed
     */
    static public function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    /**
     * destroy - exclui uma sessão indica na chave $key
     *
     * @param string $key 
     * @return void
     */
    static public function destroy($key)
    {
        if (isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    /**
     * getDestroy - recupera e exclui uma sessão informada em $key
     *
     * @param string $key 
     * @return mixed
     */
    static public function getDestroy($key)
    {
        $valor = Session::get($key);
        Session::destroy($key);

        return $valor;
    }
}