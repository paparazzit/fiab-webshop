<?php 
include 'inc/header.php';
include 'inc/navbar.php';
?>



<div class="row w-100 " >

<?php include 'inc/room_sidebar.php'?>




<section class="roomView  col-md-8"  id = "updateRooms">

 <div class="update_room_section" id="">
     <h2 id="roomTitle"><?php echo $room->room_name?></h2>
     
 <ul class="list-group list-group-flush bg-dark">
     <li class="list-group-item">
    <form action="adminPanel/updateRoomName.php?id=<?php echo $room->id?>" method="POST" id='changeRoomName'>
    <input type="text" name ="room_name" id='roomName' required  class="update_room_info float-start" value="<?php echo $room->room_name?>" >
     <button class="btn btn-warning btn-sm float-end">Change</button>
    </form>
     </li>
     <li class="list-group-item">
       <form action="adminPanel/updateRoomVersion.php?id=<?php echo $room->id?>" method="POST" id="changeRoomVersion">
       <input required  type="text" name="room_version" id="room_ver" class="update_room_info float-start" value="<?php echo $room->room_version?>">
         <button class="btn btn-sm btn-warning float-end">Change</button>
       </form>
     </li>
     <li class="list-group-item">
       <form action="adminPanel/updateRoomDescription.php?id=<?php echo $room->id?>"  method="POST" id="changeRoomDesc">
       <textarea name="room_desc" id="room_description" cols="30" required rows="10" class="update_room_info float-start"><?php echo $room->room_desc?></textarea>
         <button class="btn btn-sm btn-warning float-end">Change</button>
       </form>
     </li>

     <li class="list-group-item">
        <div class="img-wrapper float-start" id="room_img_preview">
         <img src="uploads/<?php echo $room->room_img?>" alt="" id="currentImg">
        </div>
       <form action="adminPanel/updateRoomImg.php?id=<?php echo $room->id?>" id="changeRoomImg">
       <input required  type="file" name="room_img" id="update_room_img" class="float-end btn btn-warning btn-sm" >
       </form>
     </li>
     <li class="list-group-item">
      
       <form action="adminPanel/deleteRoom.php" 
        id="deleteRoom"  method="POST">
        
       <button class="btn btn-sm btn-danger float-end" type="submit" name="room_id" value = '<?php echo $room->id?>' >DELETE ROOM</button>
       </form>
     </li>
 </ul>
 
 </div>       

</div>

</section>



</div>


<?php 
include 'inc/footer.php';

?>