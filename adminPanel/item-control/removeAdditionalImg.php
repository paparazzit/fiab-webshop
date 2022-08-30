<?php 
require dirname(__FILE__,3)."/backend/core/init.php";


if(!isLogged()){
    Header('Location:/fiab-webshop/index.php') ;   
}

if($_SERVER['REQUEST_METHOD'] !=='POST'){
    Header('Location:/fiab-webshop/index.php') ;   
}
$user= getUser($_SESSION['id']);


if($user->role === 'admin'){
    $protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';
    if($protocol==='http'){
      $targetDir =  $_SERVER['DOCUMENT_ROOT'] . "/fiab-webshop/uploads/parts/";
  }else{
      $targetDir= $_SERVER['DOCUMENT_ROOT'] . "/uploads/parts/";
  } 
    $itemId = filter_var($_POST['id'], FILTER_SANITIZE_STRING);
   
    if(isset($itemId)){
        $deletedImg =  getItemById($itemId);
        $result = removeAdditionalImage($itemId);
        
       
        if($result === 'success'){
            unlink($targetDir . $deletedImg->itm_img);
            echo "success";

        }else{
            echo 'error';
        }

    }

}
  
        



?>