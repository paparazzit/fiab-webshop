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
    $itemId = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
    $name = $_FILES['itm_img']['name'];
    $targetName = 'alter'.time().$name;
    $targetFile = $targetDir.$targetName;
    move_uploaded_file($_FILES['itm_img']['tmp_name'], $targetFile);


if(addMoreImgs($targetName, $itemId)>0){
    header('Location:'.$base_link.'adminPanel/editItem.php?part_id='.$itemId .'&success');

}else{
    header('Location:'.$base_link.'adminPanel/editItem.php?part_id='.$itemId .'&error');

}

}
  
        



?>