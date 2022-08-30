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
   
    $itemId = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
    $currentItemImg = getItemImg($itemId);
    $protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';
    if($protocol==='http'){
      $targetDir =  $_SERVER['DOCUMENT_ROOT'] . "/fiab-webshop/uploads/parts/";
  }else{
      $targetDir= $_SERVER['DOCUMENT_ROOT'] . "/uploads/parts/";
  } 
//    echo $currentItemImg;
 
    $name = $_FILES['itm_img']['name'];
    $targetName = time().$name;
    $targetFile = $targetDir.$targetName;
    move_uploaded_file($_FILES['itm_img']['tmp_name'], $targetFile);
    if(updateItemImg($targetName, $itemId) === 'success'){
        echo $itemId;
      }else{
        echo "false";
      }
    
      unlink($targetDir . $currentItemImg);
    
}


?>