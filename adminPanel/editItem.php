<?php 
require '../backend/core/init.php';

if(!isLogged()){
    Header('Location:/fiab-webshop/index.php') ;   
}


$user = getUser($_SESSION['id']);

$allRooms = getAllRooms();


if($user->role === 'admin'){
   $itemId = filter_var($_GET['part_id']);
   $item = getSinglePart($itemId);
    $additionalImgs = getAdditionalImages($itemId);
   
  
    include 'views/editItem.view.php';
    

}else{
    Header('Location:/fiab-webshop/index.php') ;   
}

?>

