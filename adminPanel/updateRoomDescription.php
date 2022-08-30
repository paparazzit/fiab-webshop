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
        $roomDesc = filter_var($_POST['room_desc'] , FILTER_SANITIZE_STRING);
        $id = filter_var($_GET['id'] , FILTER_SANITIZE_STRING);
       $room = getSingleRoom($id);
        if(updateRoomDescription($roomDesc, $id) === 'success'){
            Header('Location:'.$base_link.'/adminPanel/editRoom.php?room_id=' . $room->id) ;   

        }else{
            Header('Location:'.$base_link.'/adminPanel/editRoom.php?room_id=' . $room->id . "&room_desc=not_changed") ;  
        }
        
        
}


?>