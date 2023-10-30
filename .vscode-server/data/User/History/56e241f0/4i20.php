<?php
require_once 'vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader('Vues/');
$twig = new \Twig\Environment($loader);

try {
    $db = new PDO(
        'mysql:host=localhost;dbname=BTS_Sofyan;charset=utf8',
        'sofyan',
        'plop'
    );
}

$departement = [

];

echo $twig->render('index.html' , ['the'=>'variables' , 'go' =>'here', ]);

?>

