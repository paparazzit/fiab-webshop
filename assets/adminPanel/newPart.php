<?php 
require '../backend/core/init.php';

if(!isLogged()){
    Header('Location:/fiab-webshop/index.php') ;   
}

if($_SERVER['REQUEST_METHOD'] ==='POST'){
    $protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';
    if($protocol==='http'){
      $targetDir =  $_SERVER['DOCUMENT_ROOT'] . "/fiab-webshop/uploads/parts/";
  }else{
      $targetDir= $_SERVER['DOCUMENT_ROOT'] . "/uploads/parts/";
  }  

   
$roomIds = $_POST['room_id'];
$partName = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$partVersion = filter_var($_POST['partVersion'], FILTER_SANITIZE_STRING);
$partDesc = filter_var($_POST['partDesc'], FILTER_SANITIZE_STRING);
$partPrice = filter_var($_POST['partPrice'], FILTER_SANITIZE_STRING);
$partDim = filter_var($_POST['partDimensions'], FILTER_SANITIZE_STRING);
$allowedTypes = array('jpg', 'jpeg', 'png');

$name = $_FILES['part_img']['name'];
$targetName = time().$name;
$targetFile = $targetDir.$targetName;


// echo __DIR__ .DIRECTORY_SEPARATOR .'uploads';


$newPart = createNewPart($partName, $partDesc,$partPrice, $targetName, $partVersion,$partDim);



if($newPart>1){
    foreach($roomIds as $roomId){
        createCategories($roomId, $newPart );
        
        }

        move_uploaded_file($_FILES['part_img']['tmp_name'], $targetFile);
        echo 'ok';
        

}else{
    echo "ERROR";
}




}



?>