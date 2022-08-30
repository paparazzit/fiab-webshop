<?php 

require '../backend/core/init.php';

if(!isLogged()){
    Header('Location:/index.php') ;   
    exit();
}
$user = getUser($_SESSION['id']);

$all_rooms = getAllRooms();

$allParts = getAllItems();




include '../users/views/home.view.php';


