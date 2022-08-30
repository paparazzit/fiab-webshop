
<?php 
include 'inc/header.php';
include 'inc/navbar.php';
?>

<div class="row w-100">

<?php include 'inc/room_sidebar.php'?>

<section class="newRoomView col-md-8 " id="newRoom"> 
    <div class="view-wrapper">
      
  
        <h2>Create New Part</h2>

        <form action="adminPanel/newPart.php" class="form" id="newPartForm"  enctype="multipart/form-data" method="POST" > 
        <!-- FORM ROOM -->
        <div class="form-group mb-4">
            <label for="room_id">Room Part *for multiple rooms hold CRTL</label>
            <select name="room_id[]" id="room_id" size="<?php echo  count($allRooms)?>" multiple="multiple" class="form-control">
             
                <?php foreach($allRooms as $room):?>
                    <option value="<?php echo $room->id?>" ><?php echo $room->room_name?></option>
                <?php endforeach;?>
            </select>
           
            
        </div>
            <!-- NAME -->
                <div class="form-group mb-3">
                    <label for="part_name">Part Name*</label>
                    <input type="text" name="name" id="part_name" class="form-control" placeholder="Part Name">
                <p class="alert-text"></p>
                </div>
            <!-- VERSION -->
                <div class="form-group mb-3">
                    <label for="room_version">Part Code*</label>
                    <input type="text" name="partVersion" id="part_version" class="form-control" placeholder="Part Code">
                <p class="alert-text"></p>
                </div>
                 <!-- Dimensions -->
                 <div class="form-group mb-3">
                    <label for="room_version">Part Dimensions*</label>
                    <input type="text" name="partDimensions" id="part_dimensions" class="form-control" placeholder="Hcm X Wcm X Lcm">
                <p class="alert-text"></p>
                </div>
                  <!-- price -->
                  <div class="form-group mb-3">
                    <label for="room_price">Part Price* eur</label>
                    <input type="text" name="partPrice" id="part_price" class="form-control" placeholder="Part price">
                <p class="alert-text"></p>
                </div>
             <!-- DESCRIPTION -->
                <div class="form-group mb-3">
                    <label for="room_desc">Part Description* </label>
                    <textarea name="partDesc" id="part_desc"  class="form-control" cols="30" rows="10" resize="none"></textarea>                
                    <p class="alert-text"></p>
                </div>
            <!-- UPLOAD IMG -->
                <div class="form-group mb-3">
                    <label for="part_img">Part Image* (jpg only)</label>
                    <input type="file" name="part_img" id="part_img" class="form-control" >
                <p class="alert-text"></p>
                </div>
                
               
           <button class="form-control  btn-custom  mt-3" id="newPartBtn" type ="submit">Create Part</button>
           <div class="form-info hide form-group mt-3" id="form-result">
            <p class="m-0 text-center " >SUCCESS</p>
            
           </div>
            </form>
    </div>       
    
 
</section>  


</div>










<?php include 'inc/footer.php';?>
