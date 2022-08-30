<?php 
include 'inc/header.php';
include 'inc/navbar.php';
?>
<div class="row w-100 " >

<?php include 'inc/room_sidebar.php'?>


<section class="partsList col-md-8" id="partsList">
<h2 id="roomTitle"><?php echo $room->room_name?></h2>
<table class="table table-dark table-striped table-hover">
  <thead>
    <tr>
        <th>Part Name</th>
        <th>Part Code</th>
        <th>Part Price</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($allItems as $item):?>
       <tr>
        <td><?php echo $item[0]->name?></td>
        <td><?php echo $item[0]->itm_code?></td>
        <td><?php echo $item[0]->itm_price?></td>
        <td><a href="adminPanel/editItem.php?part_id=<?php echo $item[0]->id?>" class="btn btn-warning btn-sm">Edit</a></td>
        <td><a href="adminPanel/deletePart.php?part_id=<?php echo $item[0]->id?>&room_id=<?php echo $room->id?>" data-name="<?php echo $item[0]->name?>"  class="btn btn-danger btn-sm delete_itm">Delete</a></td>
       </tr>
    <?php endforeach;?>
  </tbody>
</table>

<h3>Import new parts</h3>

<ul class="list-group items_list">
  <li class='list-group-flush addNewItem mb-3'>
    <form action="adminPanel/item-control/importNewPart.php" method="POST" class="form">
      <div class="d-flex justify-content-between">
      <select name="partId" id="" class='col-md-3' required>
        <option selected disabled value=''>Select new Item</option>
        <?php foreach($get_all_items as $item):?>
        <option value="<?php echo  $item->id?>"><?php echo  $item->name?></option>
        <?php endforeach;?>
      </select>
      <button type='submit' name='roomId' value='<?php echo $room->id?>' class="btn btn-sm btn-warning col-md-2 ">import</button>
     
      </div>
     

    </form>
   
  </li>
</ul>
</section>


<?php 
include 'inc/footer.php';

?>