<?php 
require '../backend/core/init.php';


if(!isLogged()){
    Header('Location:'. $index_link) ;   
}


if($_SERVER['REQUEST_METHOD'] !=='POST'){
    Header('Location:'. $index_link) ;   
}
$user= getUser($_SESSION['id']);


if($user->role === 'admin'){
        $roomName = filter_var($_POST['room_name'] , FILTER_SANITIZE_STRING);
        $id = filter_var($_GET['id'] , FILTER_SANITIZE_STRING);
       $room = getSingleRoom($id);
        if(updateRoomName($roomName, $id) === 'success'){
            Header('Location:'.$base_link.'adminPanel/editRoom.php?room_id=' . $room->id) ;   

        }else{
            Header('Location:'.$base_link.'adminPanel/editRoom.php?room_id=' . $room->id . "&room_name=not_changed")  ;   
        }
        
        
}


?>