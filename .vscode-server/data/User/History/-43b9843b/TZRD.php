<?php
    require_once 'vendor/autoload.php';
    $class = new Controllers\IndexController;
    $class = new Controllers\UserController;
    call_user_func_array([$class, "index"], array());
?>
