

<?php include "inc/header.php"?>
<?php include 'inc/navbar.php'?>
			<!-- SECTION ONE -->

			<section class="hero">
				<div class="container">
					<hgroup>
						<h2>Currently in stock</h2>
					</hgroup>
					<div class="owl-carousel owl-theme" id="inStock">
						<?php foreach($allParts as $item):?>
						<div class="item">
							<div class="item-card">
								<div class="item-card-body">
									<img src="uploads/parts/<?php echo $item->itm_img?>" alt="" />
								</div>
								<div class="item-card-footer">
									<h3 class="part-name text-center"><?php echo $item->name?></h3>
									<p class="desc text-center">
									<?php echo $item->itm_desc?>
									</p>
									<div class="bottom">
										<p class="stock-status">In stock</p>
										<a href="single-product.php?id=<?php echo $item->id?>" class="my-btn btn_order"
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


			<section class="rooms">
				<div class="my-container">


				<?php foreach($all_rooms as $room):?>
					<div class="room">
						<div class="room-img">
						
							<img src="uploads/<?php echo $room->room_img?>" alt="" />
						</div>
						<div class="card-content">
							<h3><?php echo $room->room_name?></h3>
							<div class="card-text">
								<p class="desc">
								<?php echo $room->room_desc?>
								</p>
								<a href="single-room.php?id=<?php echo $room->id?>" class="my-btn btn_order">All items</a>
							</div>
						</div>
					</div>
					<?php endforeach;?>


					

					

				
					

				
				</div>
			</section>
          <!-- Button trigger modal -->


     

            <?php include "inc/footer.php"?>
