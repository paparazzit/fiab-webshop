<?php 
require '../backend/core/init.php';


if(!isLogged()){
    Header('Location:/fiab-webshop/index.php') ;   
}


$user= getUser($_SESSION['id']);

$roomId = filter_var($_POST['room_id'], FILTER_SANITIZE_STRING);
if($user->role === 'admin'){

  
$currentRoom = getSingleRoom($roomId);
$itemsIds = getRoomItems($currentRoom->id);

$protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';
if($protocol==='http'){
  $targetDir =  $_SERVER['DOCUMENT_ROOT'] . "/fiab-webshop/uploads/";
}else{
  $targetDir= $_SERVER['DOCUMENT_ROOT'] . "/uploads/";
}   

if($currentRoom){
 
    
$roomImg = getRoomImg($currentRoom->id);
// GETTING ROOM PARTS IDS
$roomItms = getItemsByRoomId($currentRoom->id);

// GET ALL GATEGORIES
foreach($roomItms as $cat){
    
    $itemCategories = getAllCats($cat->item_id);
    if($itemCategories ===1){
        $itmImg = getItemImg($cat->item_id);
        $itmImgs = getAdditionalImages($cat->item_id);
        unlink($targetDir .'parts/' .$itmImg );
        // 

        // DELETING ITEM
        removeAdditionalImage($cat->item_id);
        deleteItem($cat->item_id, $cat->room_id);
     
       foreach($itmImgs as $img){
      
        removePartImgByPartId($img->part_id);
        unlink($targetDir .'parts/' . $img->itm_img );
       }
    }

    deleteSinglePart($cat->item_id, $cat->room_id);


}


// DELETING THE ROOM AND ROOM IMAGE
unlink($targetDir . $roomImg);
if(deleteSingleRoom($currentRoom->id)>0){
  
    header('Location:'.$base_link. 'adminPanel/' . 'manageProducts.php' . '?room_deleted');
}else{
    header('Location:'.$base_link. 'adminPanel/' . 'manageProducts.php' . '?room_deleted_error'); 
}

}

        
}else{
    header('Location:' . $index_link);
}


?>