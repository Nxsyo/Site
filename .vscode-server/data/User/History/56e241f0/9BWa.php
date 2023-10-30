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
catch(Exception $e) {
    die("Erreur : " . $e->getMessage());
}

$departement = $db->prepare('SELECT * FROM departement');
$departement->execute();
$depart = $departement->FetchAll();
echo $twig->render('index.html' , ['the'=>'variables' , 'go' =>'here', 'depart'=>$depart]);
// var_dump($depart);
?>

