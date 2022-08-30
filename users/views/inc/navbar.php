<nav class="navbar navbar-expand-lg navbar-dark bg-transparent py-3">
				<div class="container">
					<a class="navbar-brand" href="users/home.php">
						<img src="assets/logo.png" alt="" />
					</a>
					<button
						class="navbar-toggler"
						type="button"
						data-bs-toggle="collapse"
						data-bs-target="#navbarNav"
						aria-controls="navbarNav"
						aria-expanded="false"
						aria-label="Toggle navigation"
					>
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav ms-auto">
							<li class="nav-item">
								<a class="nav-link active" aria-current="page" href="users/home.php">Home</a>
							</li>

							<li class="nav-item">
								<a class="nav-link" href="users/home.php">Shop</a>
							</li>
                           
							
							<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								<?php echo $user->name?>
							</a>
								<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">								
								<li><a class="dropdown-item" href="users/userProfile.php">My Profile</a></li>
								<?php if($user->role==="admin"):?>
									<li><a class="dropdown-item" href="adminPanel/manageProducts.php">Manage Products</a></li>
								<?php endif?>
								<li >
								<a id="logout-btn" class="dropdown-item" href="logout.php"  >Logout</a>
								</li>
								</ul>
							</li>


							<?php 
							if($user->role === 'admin'):
							?>
							 <li class="nav-item">
                                <a href="users/allUsers.php" class="nav-link">Users</a>
                            </li>
							<?php endif;?>
							
						
						</ul>
					</div>
				</div>
			</nav>