<?php 
require 'backend/core/init.php';



if(cookie_set()){
    login_cookie($_COOKIE['userId']);
};

$all_rooms = getAllRooms();
$allParts = getAllItems();


include 'views/index.view.php';
