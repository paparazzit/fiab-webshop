<?php 
require '../backend/core/init.php';

if(!isLogged()){
    Header('Location:' . $index_link) ;   
}

if($_SERVER['REQUEST_METHOD'] ==='POST'){


$roomId = filter_var($_POST['room_id'], FILTER_SANITIZE_STRING);

echo json_encode(getSingleRoom($roomId));

}

?>

