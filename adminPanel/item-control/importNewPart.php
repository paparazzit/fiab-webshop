<?php 
require dirname(__FILE__,3)."/backend/core/init.php";

if($_SERVER['REQUEST_METHOD'] !=='POST'){
    Header('Location:/fiab-webshop/index.php') ;   
}
$user= getUser($_SESSION['id']);
$partId = filter_var($_POST['partId']);
$roomId = filter_var($_POST['roomId']);

if($user->role === 'admin'){
 
   if( createCategories($roomId, $partId)>0){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
   }else{
    echo 'ERROR';
   }
    
}
?>