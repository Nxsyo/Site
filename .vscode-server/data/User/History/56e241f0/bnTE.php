<?php
require_once 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('Vues/');
$Twig = new \Twig\Environment($loader);

echo $Twig->render('index.html' , ['the'=>'variables' , 'go' =>'here']);

?>