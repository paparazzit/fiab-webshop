<?php 
require '../backend/core/init.php';

if(!isLogged()){
    Header('Location:'.$index_link) ;   
}


$user = getUser($_SESSION['id']);


$allRooms = getAllRooms();
if($user->role === 'admin'){
    $roomId = filter_var($_GET['room_id'], FILTER_SANITIZE_STRING);
    $room =  getSingleRoom($roomId);
  
    include 'views/editRoom.view.php';
    

}else{
    Header('Location:'.$index_link) ;   
}

?>

