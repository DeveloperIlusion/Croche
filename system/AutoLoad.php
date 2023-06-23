<?php

class AutoLoad
{
    /**
     * library
     *
     * @param string $className 
     * @return void
     */
    public function library($className)
    {
        $className  = ltrim($className, '\\');
        $fileName   = '';
        $nameSpace  = '';

        if ($lastNsPos = strpos($className, '\\')) {
            $nameSpace = substr($className, 0 , $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName  = str_replace('\\', DS, $className) . DS;
        }

        $fileName = 'App' . DS . str_replace('\\', DS, $className) . '.php';

        require_once $fileName;
    }
}