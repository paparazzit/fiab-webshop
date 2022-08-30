<?php 
require dirname(__FILE__,3)."/backend/core/init.php";





if(!isLogged()){
    Header('Location:/fiab-webshop/index.php') ;   
}

if($_SERVER['REQUEST_METHOD'] !=='POST'){
    Header('Location:/fiab-webshop/index.php') ;   
}
$user= getUser($_SESSION['id']);


if($user->role === 'admin'){
    $itemId = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
    $itemDims = filter_var($_POST['item_dims'], FILTER_SANITIZE_STRING);
   
    if(updateItemDims($itemId, $itemDims)=== 'success'){
        header('Location:'.$base_link.'adminPanel/editItem.php?part_id='.$itemId .'&success');
    }else{
        header('Location:'.$base_link.'adminPanel/editItem.php?part_id='.$itemId . "&error");
    }


        
        
}


?>