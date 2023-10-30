<?php
    require_once 'vendor/autoload.php'

    $loader = new \twig\loader\ArrayLoader ([
        'index'=> 'Hello {{ name }}!'
    ]);
    $Twig = new \Twig\Environment($loader);

    echo $Twig->render('index' , ['name' => 'BTS 2024']);
?>