<?php 
$whitelist = array(
    '127.0.0.1',
    '::1'
);



if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
    $base_link="https://shop.srdjansrdjanov.info/";
    $headerLink = "https://shop.srdjansrdjanov.info/";
    $index_link = "https://shop.srdjansrdjanov.info/";
    $resetLink = 'http://localhost/fiab-webshop/resetPasswordForm.php';


}else{
    $base_link = '/fiab-webshop/';
    $headerLink = '/fiab-webshop/';
    $index_link = '/fiab-webshop/';
    $resetLink = 'https://shop.srdjansrdjanov.info/resetPasswordForm.php';

   
}

require 'config.php';
require 'connection.php';
require 'functions.php';
require 'roomFunctions.php';


if(session_status() == PHP_SESSION_NONE){
    session_start();
}



