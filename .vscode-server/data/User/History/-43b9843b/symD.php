<?php
    require_once 'vendor/autoload.php';
    session_start();

    $class = "Controllers\\" . (isset($_GET['c'])? ucfirst($_GET['c']) . 'DataController' : 'UserController');
    $target = isset($_GET['t']) ? $_GET['t'] : "index";
    $getParams = isset($_GET) ? $_GET : null;
    $postParams = isset($_POST) ? $_POST : null;
    var_dump($class , $target) ; die;

    $params = array(
        "get"=>$getParams,
        "post"=>$postParams,
        "path"=>"http://195.154.118.169/myFramework/",
    );

    if ($class == "Controllers\UserController" && in_array($target, get_class_methods($class))) {
        $class = new Controllers\UserController;
        call_user_func_array([$class, $target], $params);
    }
    else {
        $class = new $class;
        call_user_func_array([$class, $target], array("params"=>$params));
    }


?>
