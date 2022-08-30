<?php require "inc/header.php";
      

	  if(!isLogged()){
		require "inc/navbar.php";
		
	}else{
		$user = getUser($_SESSION['id']);
		require  './users/views/inc/navbar.php';
	}
	require 'inc/room-nav.php';
      
?>



	<!-- SINGLE PRODUCT -->
    <section class="product" id="product">
				<div class="container">
					<div class="wrapper row">
						<div class="left col-md-5 mb-3">
							<div class="prod-img">
								<img src="uploads/parts/<?php echo $item->itm_img?>" alt="" />
							</div>
						</div>
						<div class="right col-md-7 ">
							<div class="prod-details">
								<h3 class="prod-name"><?php echo $item->name?></h3>
								<div class="text">
									<p class="desc">
									<?php echo $item->itm_desc?>
									</p>
									<p class="dims">
										<span>Price: </span> <?php echo $item->itm_price?> eur
									</p>
									<p class="dims">
										<span>Dimensions: </span><?php echo $item->itm_dim?>
									</p>
									<p class="inStock">In Stock: <span class="onStock"></span></p>
								</div>
								<div class="shop-control ">
									<div class="quant " id="1">
										<p class="mb-1">Quantity</p>
										<div class="quant-control">
											<button class="qant-btn plus">+</button>
											<input
												type="number"
												name="quantity"
												min="0"
												max="10"
												value="0"
												class="val"
											/>
											<button class="qant-btn minus">-</button>
										</div>
									</div>

									<div class=" shop-btn">
										<a href="" class="add-cart my-btn">Add to cart</a>
									</div>
								</div>
								<div class="additionalImgs mt-4" >
									<?php foreach($additionalImages as $img):?>
									<div  class="img-wrapper open_gallery" >
										<img src="uploads/parts/<?php echo $img->itm_img?>" alt="">
									</div>
									<?php endforeach;?>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		

			<div class="gallery_modal " id="gallery_modal">
			<div class="close_btn" id="close_modal"><span></span> <span></span></div>
			<div class="main_img">
				<img src="" alt="">
			</div>
			<div class="img_nav">
				<div class="img_thumbs">
					<img src="uploads/parts/<?php echo $item->itm_img?>" alt="">
				</div>
				<?php if($additionalImages):?>
				<?php foreach($additionalImages as $img):?>
					<div class="img_thumbs">
						<img src="uploads/parts/<?php echo $img->itm_img?>" alt="">
					</div>
				<?php endforeach;?>
				<?php endif;?>
			</div>
		
		</div>


	


        <?php require 'inc/footer.php'?>