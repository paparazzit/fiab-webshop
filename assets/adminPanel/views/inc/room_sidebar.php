

<div class="sideBar col-md-4 room_sidebar" >
<article class="sidebar room_sidebar" >
 <div class="list-group">
    <p  class="list-group-item m-0">Rooms</p> 
    <?php foreach($allRooms as $cure_room):?>
 
    <a href="adminPanel/editRoom.php?room_id=<?php echo $cure_room->id?>"  class="list-group-item list-group-item-action room_btn" ><?php echo $cure_room->room_name?></a> 
   
    <?php endforeach;?>
    <a href="adminPanel/manageProducts.php" class="list-group-item list-group-item-action room_btn" data-id="newRoom" >New Room</a> 
 </div>

</article>
<article class="sidebar room_sidebar mt-2" >
 <div class="list-group">
    <p  class="list-group-item m-0">Parts</p> 
    <?php foreach($allRooms as $cure_room):?>
 
    <a href="adminPanel/partsList.php?room_id=<?php echo $cure_room->id?>"  class="list-group-item list-group-item-action room_btn" ><?php echo $cure_room->room_name?></a> 
   
    <?php endforeach;?>
    <a href="adminPanel/createNewPart.php" class="list-group-item list-group-item-action room_btn"  >Create Part</a> 
 </div>

</article>
    </div>