<?php
    require_once 'vendor/autoload.php';

    $loader = new \Twig\Loader\ArrayLoader ([
        'index'=> 'Hello {{ nom  }}!'
    ]);
    $Twig = new \Twig\Environment($loader);

    echo $Twig->render('index' , ['nom' => 'Sofyan']);
?>