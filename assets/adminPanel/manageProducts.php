<?php 
require '../backend/core/init.php';
if(!isLogged()){
    Header('Location:/fiab-webshop/index.php') ;   
}
$user = getUser($_SESSION['id']);
if($user->role !== 'admin'){
    Header('Location:/fiab-webshop/index.php') ;   
}

$allRooms = getAllRooms();

include 'views/manageProducts.view.php';
?>




