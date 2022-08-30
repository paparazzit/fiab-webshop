<?php 
require '../backend/core/init.php';

if(!isLogged()){
    Header('Location:/fiab-webshop/index.php') ;   
}


$user = getUser($_SESSION['id']);

$allRooms = getAllRooms();
if($user->role === 'admin'){
    $roomId = filter_var($_GET['room_id'], FILTER_SANITIZE_STRING);
    $room =  getSingleRoom($roomId);
    $itemIds = getRoomItems($roomId);
    $allItems =  getItemsForRoom($itemIds);
    $get_all_items = getAllItems();

    include 'views/partsList.view.php';
    

}else{
    Header('Location:/fiab-webshop/index.php') ;   
}

?>

