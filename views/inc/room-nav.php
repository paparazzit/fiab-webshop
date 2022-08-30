<?php 
$rooms = getAllRooms();
?>

<div class="roomNav">
				<div class="container">
					<h4 class="room-btn">rooms</h4>
					<ul class="room-items">
						<?php foreach($rooms as $room):?>
						<li class="room-item">
							<a href="single-room.php?id=<?php echo $room->id?>"><?php echo $room->room_name?></a>
						</li>
						<?php endforeach;?>
					</ul>
				</div>
			</div>