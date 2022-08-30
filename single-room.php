<?php 
require 'backend/core/init.php';


$roomId = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
$room = getSingleRoom($roomId);

$itemsIDs = getRoomItems($room->id);


$roomItems = getItemsForRoom($itemsIDs);

require 'views/single-room.view.php';


?>