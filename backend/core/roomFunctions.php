<?php 
function getAllRooms(){
    global $pdo;
    $stmt = $pdo->prepare ('SELECT * FROM rooms');
    $stmt->execute();
    $allRooms= $stmt->fetchAll();
    return $allRooms;
}

function createNewRoom($roomName, $roomVersion, $roomDesc, $imgLink){
    global $pdo;
    $stmt = $pdo -> prepare("INSERT INTO rooms (room_name, room_version, room_desc, room_img) VALUES(?, ?,?,?)");
    $stmt-> execute([$roomName, $roomVersion, $roomDesc, $imgLink]);
    
    $room= $stmt->rowCount();
    return $room;
}

function getSingleRoom($roomId){
    global $pdo;
    $stmt = $pdo->prepare ('SELECT * from rooms WHERE id=?');
    $stmt->execute([$roomId]);
    $room= $stmt->fetch();
    return $room;
}

function getRoomImg($roomId){
    global $pdo;
    $stmt = $pdo->prepare ('SELECT room_img from rooms WHERE id=?');
    $stmt->execute([$roomId]);
    $room= $stmt->fetch();
    return $room->room_img;
}



function updateRoomName($roomName, $id){
    global $pdo;
    $stmt= $pdo->prepare("UPDATE rooms SET room_name = ? WHERE id=?");
    $stmt->execute([$roomName, $id]);
    $rows = $stmt->rowCount();

    if($rows>0){
        return 'success';
    }else{
        return 'error';
    }
}


function updateRoomVersion($roomVersion, $id){
    global $pdo;
    $stmt= $pdo->prepare("UPDATE rooms SET room_version =? WHERE id=?");
    $stmt->execute([$roomVersion, $id]);
    $rows = $stmt->rowCount();

    if($rows>0){
        return 'success';
    }else{
        return 'error';
    } 
}

function updateRoomDescription($roomDesc, $id){
    global $pdo;
    $stmt= $pdo->prepare("UPDATE rooms SET room_desc =? WHERE id=?");
    $stmt->execute([$roomDesc, $id]);
    $rows = $stmt->rowCount();

    if($rows>0){
        return 'success';
    }else{
        return 'error';
    } 
}


function updateRoomImg($targetName, $id){
    global $pdo;
    $stmt= $pdo->prepare("UPDATE rooms SET room_img =? WHERE id=?");
    $stmt->execute([$targetName, $id]);
    $rows = $stmt->rowCount();

    if($rows>0){
        return 'success';
    }else{
        return 'error';
    } 
}
function deleteSingleRoom($roomId){
    global $pdo;
    $stmt = $pdo->prepare('DELETE FROM rooms WHERE id=? ');
    $stmt->execute([$roomId]);
    $cate_deleted =  $stmt->rowCount();
    return $cate_deleted;

}



// PARTS

function createNewPart($partName,  $partDesc,$partPrice, $partImg, $partVersion,$partDim){
    global $pdo;
    $stmt = $pdo -> prepare("INSERT INTO items(name,  itm_desc, itm_price, itm_img, itm_code, itm_dim) VALUES(?, ?,?,?,?,?)");
    $stmt-> execute([$partName, $partDesc,$partPrice, $partImg, $partVersion, $partDim]);
    $stmt = $pdo->query("SELECT LAST_INSERT_ID()");
    $lastId = $stmt->fetchColumn();
    
    return $lastId;
}

function getAllItems(){
    global $pdo;
    $stmt= $pdo->prepare('SELECT * FROM items');
    $stmt -> execute();
    $items = $stmt->fetchAll();
    return $items;
}

function createCategories($roomId, $partId){
global $pdo;

$stmt = $pdo -> prepare("INSERT INTO categories (room_id, item_id) VALUES(?, ?)");
$stmt-> execute([$roomId, $partId]);

$categories= $stmt->rowCount();
return $categories;

}

function getRoomItems($room_id){
   global $pdo;
   $stmt= $pdo->prepare('SELECT item_id FROM categories WHERE room_id=?');
   $stmt-> execute([$room_id]);
    $itemId = $stmt->fetchAll();
    return $itemId;
}
function getItemsByRoomId($room_id){
    global $pdo;
    $stmt= $pdo->prepare('SELECT * FROM categories WHERE room_id=?');
    $stmt-> execute([$room_id]);
     $itemId = $stmt->fetchAll();
     return $itemId;
}

function getItemsForRoom($itemsIDs){
global $pdo;
$items = array();
foreach($itemsIDs as $itemId){
  
     $stmt= $pdo->prepare('SELECT * FROM items WHERE id=?');
    $stmt-> execute([$itemId->item_id]);
    $item = $stmt->fetchAll();
    array_push($items,$item ) ;
  }

  return $items;
}

function getSinglePart($part_id){
    global $pdo;

    $stmt = $pdo->prepare('SELECT * FROM items WHERE id=?');
    $stmt->execute([$part_id]);
    $item = $stmt->fetch();
    return $item;
}
function getAllCats($partId){
    global $pdo;

    $stmt = $pdo->prepare('SELECT * FROM categories WHERE item_id=?');
    $stmt->execute([$partId]);
    $items = $stmt->fetchAll();
    return count($items);
}



function deleteSinglePart($part_id, $roomId){
global $pdo;

$stmt = $pdo->prepare('DELETE FROM categories WHERE item_id=? AND room_id=?');
$stmt->execute([$part_id, $roomId]);
$cate_deleted =  $stmt->rowCount();
return $cate_deleted;
}

function deleteItem($partId, $roomId){
global $pdo;

$stmt = $pdo->prepare('DELETE FROM items WHERE id=? ');
$stmt->execute([$partId]);
$itm_deleted =  $stmt->rowCount();

}

function updateItemName($itemId, $itemName){
 
    global $pdo;
    $stmt= $pdo->prepare("UPDATE items SET name =? WHERE id=?");
    $stmt->execute([$itemName, $itemId]);
    $rows = $stmt->rowCount();

    if($rows>0){
        return 'success';
    }else{
        return 'error';
    } 
}
function updateItemPrice($itemId, $itemPrice){
 
    global $pdo;
    $stmt= $pdo->prepare("UPDATE items SET itm_price =? WHERE id=?");
    $stmt->execute([$itemPrice, $itemId]);
    $rows = $stmt->rowCount();

    if($rows>0){
        return 'success';
    }else{
        return 'error';
    } 
}


function updateItemDims($itemId, $itemDims){
    global $pdo;
    $stmt= $pdo->prepare("UPDATE items SET itm_dim =? WHERE id=?");
    $stmt->execute([$itemDims, $itemId]);
    $rows = $stmt->rowCount();

    if($rows>0){
        return 'success';
    }else{
        return 'error';
    } 
}

function updateItemDesc($itemId, $itemDesc){
    global $pdo;
    $stmt= $pdo->prepare("UPDATE items SET itm_desc =? WHERE id=?");
    $stmt->execute([$itemDesc, $itemId]);
    $rows = $stmt->rowCount();

    if($rows>0){
        return 'success';
    }else{
        return 'error';
    } 
}

function getItemImg($itemId){
    global $pdo;
    $stmt= $pdo->prepare('SELECT itm_img FROM items WHERE id =?');
    $stmt-> execute([$itemId]);
    $currentImg= $stmt->fetch();
    return $currentImg->itm_img;
}
function updateItemImg($imgLink, $itemId){
    global $pdo;
    $stmt= $pdo->prepare('UPDATE items SET itm_img=? WHERE id=?');
    $stmt->execute([$imgLink, $itemId]);
    $result = $stmt->rowCount();
    if($result>0){
        return 'success';
    }else{
        return 'false';
    }
}


// ADD MORE IMAGES TO ITEM

function addmoreImgs($targetName, $itemId){
    global $pdo;

    $stmt = $pdo -> prepare("INSERT INTO itm_imgs (part_id, itm_img) VALUES(?, ?)");
    $stmt-> execute([$itemId, $targetName]);

    $categories = $stmt->rowCount();
    return $categories;
}
function getAdditionalImages($partId){
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM itm_imgs WHERE part_id = ?');
    $stmt->execute([$partId]);
    $result = $stmt->fetchAll();
    return $result;
}
function getItemById($id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM itm_imgs WHERE id = ?');
    $stmt->execute([$id]);
    $result = $stmt->fetch();
    return $result;
}


// REMOVE ADDITIONAL IMAGES

function removeAdditionalImage($itemId){
    global $pdo;
    $stmt= $pdo->prepare('DELETE  FROM itm_imgs WHERE id = ?');
    $stmt->execute([$itemId]);

    $result= $stmt->rowCount();
    
    if($result > 0){
        return 'success';
        
    }
    else{
        return "ERROR";
    }

}

function getRelatedImages($partId){
    global $pdo;
    $stmt= $pdo->prepare('SELECT * FROM itm_imgs WHERE part_id = ?');
    $stmt->execute([$partId]);
    $result = $stmt->fetchAll();
    return $result;
}

function removePartImgByPartId ($partId){
    global $pdo;
    $stmt= $pdo->prepare('DELETE  FROM itm_imgs WHERE  part_id= ?');
    $stmt->execute([$partId]);

    $result= $stmt->rowCount();
    
    if($result > 0){
        return 'success';
        
    }
    else{
        return "ERROR";
    }

}


