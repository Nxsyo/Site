<?php
require_once 'vendor/autoload.php'; // Utilisation de des barres obliques normales
$class = new Controllers\IndexController;
call_user_func_array([$class, "index"], array());
?>
