<?php

namespace Controllers;
use \Twig\src\Loader;
use \Twig_Environment;

class DataController {
    protected $twig;

    function __construct()
    {
        $className = substr(get_class($this), 12, -10);

        if($className) {
            $path=strtolower($className);
        }
        else {
            $path="";
        }

        $loader = new \Twig\Loader\FilesystemLoader('./views');
        $this->twig = new \Twig\Environment($loader, array(
            'cache'=>false,
            'debug'=>true,
        ));
        $this->twig->addExtension(new \Twig\Extension\DebugExtension());
    }
}