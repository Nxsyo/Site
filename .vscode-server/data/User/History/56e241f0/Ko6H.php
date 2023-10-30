<?php
    require_once 'vendor/autoload.php';

    $loader = new \Twig\Loader\ArrayLoader ([
        'index'=> 'Hello {{ name }}!'
    ]);
    $Twig = new \Twig\Environment($loader);

    echo $Twig->render('index' , ['name' => 'Sofyan']);
?>