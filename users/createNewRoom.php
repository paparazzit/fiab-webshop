<?php 
require '../backend/core/init.php';

if(!isLogged()){
    Header('Location:' . $index_link) ;   
}

if($_SERVER['REQUEST_METHOD'] ==='POST'){


$roomName = filter_var($_POST['room_name'], FILTER_SANITIZE_STRING);
$roomVersion = filter_var($_POST['room_version'], FILTER_SANITIZE_STRING);
$roomDesc = filter_var($_POST['room_desc'], FILTER_SANITIZE_STRING);

$allowedTypes = array('jpg', 'jpeg', 'png');
$protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';
if($protocol==='http'){
    $targetDir =  $_SERVER['DOCUMENT_ROOT'] . "/fiab-webshop/uploads/";
}else{
    $targetDir= $_SERVER['DOCUMENT_ROOT'] . "/uploads/";
}


$name = $_FILES['file']['name'];
$targetName = time().$name;
$targetFile = $targetDir.$targetName;

 move_uploaded_file($_FILES['file']['tmp_name'], $targetFile) ;


if(createNewRoom($roomName, $roomVersion, $roomDesc, $targetName) <1){
    echo 'ERROR';
}else{

    echo 'Ok';
    return;
}
}

?>

