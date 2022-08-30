<?php 
require '../backend/core/init.php';


if(!isLogged()){
    Header('Location:/index.php') ;   
}

if($_SERVER['REQUEST_METHOD'] !=='POST'){
    Header('Location:/index.php') ;   
}
$user= getUser($_SESSION['id']);


if($user->role === 'admin'){
  $protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';
  if($protocol==='http'){
    $targetDir =  $_SERVER['DOCUMENT_ROOT'] . "/fiab-webshop/uploads/";
}else{
    $targetDir= $_SERVER['DOCUMENT_ROOT'] . "/uploads/";
}    
  $roomId = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
  $allowedTypes = array('jpg', 'jpeg', 'png');
   
  $currentRoomImg = getRoomImg($roomId);
  
  $name = $_FILES['room_img']['name'];
  $targetName = time().$name;
  $targetFile = $targetDir.$targetName;
move_uploaded_file($_FILES['room_img']['tmp_name'], $targetFile);


 

if(updateRoomImg($targetName, $roomId) === 'success'){
    echo $roomId;
  }else{
    echo "false";
  }

 unlink($targetDir.$currentRoomImg);


 


}
  
        



?>