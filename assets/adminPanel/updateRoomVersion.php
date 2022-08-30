<?php 
require '../backend/core/init.php';


if(!isLogged()){
    Header('Location:/fiab-webshop/index.php') ;   
}

if($_SERVER['REQUEST_METHOD'] !=='POST'){
    Header('Location:/fiab-webshop/index.php') ;   
}
$user= getUser($_SESSION['id']);


if($user->role === 'admin'){
        $roomVersion = filter_var($_POST['room_version'] , FILTER_SANITIZE_STRING);
        $id = filter_var($_GET['id'] , FILTER_SANITIZE_STRING);
        $room = getSingleRoom($id);
        if(updateRoomVersion($roomVersion, $id) === 'success'){
            Header('Location:'.$base_link.'adminPanel/editRoom.php?room_id=' . $room->id) ;   

        }else{
            Header('Location:'.$base_link.'adminPanel/editRoom.php?room_id=' . $room->id . '&room_version=not_changed') ;   
        }
        
        
}


?>