
<?php 
include 'inc/header.php';
include 'inc/navbar.php';
?>

<div class="row w-100">

<?php include 'inc/room_sidebar.php'?>

<section class="newRoomView col-md-8 " id="newRoom"> 
    <div class="view-wrapper">
        <h2>Create New Room</h2>
        <form  class="form" id="newRoomForm" enctype="multipart/form-data" method="POST" action="users/createNewRoom.php"> 
            <!-- NAME -->
                <div class="form-group mb-3">
                    <label for="room_name">Room Name*</label>
                    <input type="text" name="roomName" id="room_name" class="form-control" placeholder="Room Name">
                <p class="alert-text"></p>
                </div>
            <!-- VERSION -->
                <div class="form-group mb-3">
                    <label for="room_version">Room Version*</label>
                    <input type="text" name="roomVersion" id="room_version" class="form-control" placeholder="Room Version">
                <p class="alert-text"></p>
                </div>
             <!-- DESCRIPTION -->
                <div class="form-group mb-3">
                    <label for="room_desc">Room Description*</label>
                    <textarea name="roomDesc" id="room_desc"  class="form-control" cols="30" rows="10" resize="none"></textarea>                
                    <p class="alert-text"></p>
                </div>
            <!-- UPLOAD IMG -->
                <div class="form-group mb-3">
                    <label for="room_img">Room Image* (jpg only)</label>
                    <input type="file" name="room_img" id="room_img" class="form-control" >
                <p class="alert-text"></p>
                </div>
                
               
           <button class="form-control  btn-custom  mt-3" id="newRoomBtn">Create Room</button>
           <div class="form-info hide form-group">
            <p class="m-0 text-center ">SUCCESS</p>
            
           </div>
            </form>
    </div>       
    
 
</section>  


</div>










<?php include 'inc/footer.php';?>
