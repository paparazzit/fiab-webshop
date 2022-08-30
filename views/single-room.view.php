<?php 
require 'inc/header.php';

if(!isLogged()){
	require "inc/navbar.php";
	
}else{
	$user = getUser($_SESSION['id']);
	require  './users/views/inc/navbar.php';
}
?>

<header class="single-header">
				<img src="assets/headers/bunker.jpg" alt="" />
				<h2><?php echo $room->room_name?></h2>
</header>

<?php require 'inc/room-nav.php'?>

<section class="parts">
				<div class="container">
					<div class="row">
						
					<?php foreach($roomItems as $item):?>
				
						<div class="item col-md-4">
							<div class="item-card">
								<div class="item-card-body" data-toggle="modal" >
									<img src="uploads/parts/<?php echo $item[0]->itm_img?>" alt="" />
								</div>
								<div class="item-card-footer">
									<h3 class="part-name text-center"><?php echo $item[0]->name?></h3>
									<p class="desc text-center">
									<?php echo $item[0]->itm_desc?>
									</p>
									<div class="bottom">
										<p class="stock-status">In stock</p>
										<a href="single-product.php?id=<?php echo $item[0]->id?>" class="my-btn btn_order"
											>Details</a
										>
									</div>
								</div>
							</div>
						</div>

					<?php endforeach;?>
					</div>
				</div>
			</section>



<?php require 'inc/footer.php'?>