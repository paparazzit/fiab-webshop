<?php 
require '../backend/core/init.php';


if(!isLogged()){
    Header('Location:/fiab-webshop/index.php') ;   
}


$user= getUser($_SESSION['id']);
$partId = filter_var($_GET['part_id'], FILTER_SANITIZE_STRING);
$roomId = filter_var($_GET['room_id'], FILTER_SANITIZE_STRING);
if($user->role === 'admin'){
  
    $protocol = empty($_SERVER['HTTPS']) ? 'http' : 'https';
    if($protocol==='http'){
      $targetDir =  $_SERVER['DOCUMENT_ROOT'] . "/fiab-webshop/uploads/parts/";
  }else{
      $targetDir= $_SERVER['DOCUMENT_ROOT'] . "/uploads/parts/";
  } 
  
  $status = false;
    if(deleteSinglePart($partId, $roomId)>0){

        $status = true;
        $allRelated = getAllCats($partId);
        if($allRelated < 1){
        $currentItem = getSinglePart($partId);
        $RelatedImages = getRelatedImages($partId);
         deleteItem($partId, $roomId); /*Brisem Item kompletno */

           $status= unlink($targetDir . $currentItem->itm_img); /*Brisi glavnu sliku Itema */
            foreach($RelatedImages as $itms){
                $status=unlink($targetDir. $itms->itm_img );
                removePartImgByPartId($itms->part_id);
             }
            

          
          
        }
    
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    //    if($status){
    //     header('Location: ' . $_SERVER['HTTP_REFERER']);
    //    }else{
    //     echo 'STATUS';
    //    }
       
    }
        
        
}


?>