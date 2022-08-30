<?php 
ob_start();
require "backend/core/init.php";
session_destroy();
unset($_COOKIE['userId']);

setcookie('userId' , "", [
    'expires' => -300,
    'samesite' =>'strict',
]);

session_regenerate_id(true);


header('Location:index.php');


?>