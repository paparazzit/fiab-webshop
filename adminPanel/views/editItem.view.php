<?php 
include 'inc/header.php';
include 'inc/navbar.php';
?>



<div class="row w-100 " >

<?php include 'inc/room_sidebar.php'?>




<section class="roomView  col-md-8"  id = "updateRooms">

 <div class="update_room_section" id="">
     <h2 id="roomTitle"><?php echo $item->name?></h2>
     
 <ul class="list-group list-group-flush bg-dark">
<!-- ITEM NAME -->
     <li class="list-group-item">
    <form action="adminPanel/item-control/updateItemName.php?id=<?php echo $item->id?>" method="POST" id='changeRoomName'>
  
    <label for="itemName"  class='d-block text-black'>Item Name</label>
    <input type="text" name ="item_name" id='itemName' required  class="update_room_info float-start" value="<?php echo $item->name?>" >
 
     <button class="btn btn-warning btn-sm float-end">Change</button>
    </form>
     </li>
     <!-- ITEM PRICE -->
     <li class="list-group-item">
    <form action="adminPanel/item-control/updateItemPrice.php?id=<?php echo $item->id?>" method="POST" id='changeRoomName'>
    <label for="itemPrice"  class='d-block text-black'>Item Price</label>
    <input type="text" name ="item_price" id='itemPrice' required  class="update_room_info float-start" value="<?php echo $item->itm_price?>" >
     <button class="btn btn-warning btn-sm float-end">Change</button>
    </form>
     </li>
<!-- ITEM DIMS -->
<li class="list-group-item">
    <form action="adminPanel/item-control/updateItemDims.php?id=<?php echo $item->id?>" method="POST" id='changeRoomName'>
    <label for="item_dims"  class='d-block text-black'>Item Dimensions</label>
    <input type="text" name ="item_dims" id='item_dims' required  class="update_room_info float-start" value="<?php echo $item->itm_dim?>" >
     <button class="btn btn-warning btn-sm float-end">Change</button>
    </form>
     </li>
<!-- ITEM DESC -->

     <li class="list-group-item">
       <form action="adminPanel/item-control/changeItemDesk.php"  method="POST" id="changeRoomDesc">
        <input type="hidden" name="id" value="<?php echo $item->id?>">
       <label for="item_desc" class="d-block text-black">Item Description</label>
       <textarea name="item_desc" id="item_desc" cols="30" required rows="10" class="update_room_info float-start"><?php echo $item->itm_desc?></textarea>
         <button class="btn btn-sm btn-warning float-end">Change</button>
       </form>
     </li>

 <!-- ITEM IMG -->

     <li class="list-group-item">
      <p>Main Image</p>
        <div class="img-wrapper float-start" id="room_img_preview">
         <img src="uploads/parts/<?php echo $item->itm_img?>" alt="" id="currentImg">
        </div>
       <form action="adminPanel/item-control/updateItemImg.php?id=<?php echo $item->id?>" id="changeItmImg">
       <input required  type="file" data-id='<?php echo $item->id?>' name="itm_img" id="update_itm_img" class="float-end btn btn-warning btn-sm" >
       </form>
     </li>

     <!-- ADDITIONAL IMAGES -->
<?php if($additionalImgs):?>
      <?php foreach($additionalImgs as $img):?>
     <li class="list-group-item">
      <p >Additional img</p>
        <div class="img-wrapper float-start additional_img_wrapper" >
       
         <img src="uploads/parts/<?php echo $img->itm_img?>" alt=""class='additional_img' data-id='<?php echo $img->id?>'>
         <div class="overlay">Remove</div>
        </div>
       <form action="adminPanel/item-control/updateItemImg.php?id=<?php echo $item->id?>" id="changeItmImg">
      
       </form>
     </li>
    <?php endforeach?>
  <?php endif;?>

 </ul>

 <!-- UPLOAD ADDITIONAL IMAGES -->
 <h3 class="subtitle my-3">Add more images</h3>
 <ul class="list-group list-group-flush bg-dark">
 <li class="list-group-item">
  <div class="allImgs my-3">

  </div>
  <form action="adminPanel/item-control/addItemImages.php?id=<?php echo $item->id?>" method="POST"  class="form" id='add_imgs_form' enctype="multipart/form-data">
 <div class="form-group clearfix ">
 <input required  type="file" data-id='<?php echo $item->id?>' name="itm_img" id="add_imgs" class="float-end  btn btn-warning btn-sm" >
 </div>
 <div class="form-group mt-3 d-none" >
	<button class="form-control btn btn-warning" id="submit_imgs">Submit Images</button>
	</div>
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