<?php 
include "inc/header.php";
include "inc/navbar.php";
?>


<section class="userTable">
    <div class="container">
        <div class="row">
            <div class="col-md-9 " >
                <h2 class="mb-3">User profile</h2>
              <ul class="list-group list-group-flush bg-dark" >
               <li class="list-group-item"> <?php echo $user->name?> <a  href="#" class="btn btn-warning btn-sm float-end" data-bs-toggle="modal" data-bs-target="#changeName">
                Change
                </a></li>
               <li class="list-group-item"> <?php echo $user->email?> <a href="#" class="btn btn-sm btn-warning float-end" data-bs-toggle="modal" data-bs-target="#changeEmail" >Change</a></li>

               <li class="list-group-item"> Role 
               
               <?php if($user->role === 'admin'):?>
               <form action="users/changeUserRole.php" method="POST" class="float-end">
                <select name="role" onchange='this.form.submit()'>
                    <?php if($user->role==='admin'):?>
                        <option value="admin" selected>Admin</option>
                        <option value="guest">Guest</option>
                    <?php else:?>
                        <option value="guest" selected>Guest</option>
                        <option value="admin">Admin</option>
                    <?php endif;?>
                </select>
                <input type="hidden" name='id' value="<?php echo $user->id?>">
               </form>
               <?php else:?>
                <p class="btn btn-sm btn-warning float-end m-0"><?php echo $user->role?></p>
              
               <?php endif;?>

               </li>

               <li class="list-group-item">Password <a href="" data-bs-toggle="modal" data-bs-target="#changePassword"  class="btn btn-warning btn-sm float-end">Change</a></li>

               <li class="list-group-item"> Created <a href="#" class="btn  btn-primary float-end"><?php echo $user->created_at?></a></li>
               <?php if($user->updated_at !== NULL):?>
                <li class="list-group-item"> Edited <a href="#" class="btn  btn-primary float-end"><?php echo $user->updated_at?></a></li>
                <?php endif;?>
              </ul>
              
        

                
            </div>
        </div>
    </div>
</section>

<!-- MODALS -->

<!-- Button trigger modal -->


<!-- Modal -->
<!-- CHANGE NAME -->
<div class="modal fade" id="changeName" tabindex="-1"                 aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Name</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="users/changeUserName.php" method="POST" class='form' id="changeEmailForm">
            <input type="hidden" name="id" value="<?php echo $user->id?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name='name' id="name" class="form-control" value="<?php echo $user->name?>" required >
            </div>
            <button type="submit" class="btn btn-primary mt-3 float-end">Change Name</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
<!-- Change Email -->

<div class="modal fade" id="changeEmail" tabindex="-1"                 aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Email</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="users/changeUserEmail.php" method="POST" class='form' id="changeNameForm">
            <input type="hidden" name="id" value="<?php echo $user->id?>">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name='email' id="email" class="form-control" value="<?php echo $user->email?>" required >
            </div>
            <button type="submit" class="btn btn-primary mt-3 float-end">Change name</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>

<!-- Change Password -->
<div class="modal fade" id="changePassword" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="users/updatePassword.php" method="POST" class='form' id="changePasswordForm">
           <div class="form-group">
           <input type="hidden" name="userId" id="userId" value="<?php echo $user->id?>">
           <p class="alert-text"></p>
           </div>
            <div class="form-group mb-3">
                <label for="oldPass" class="text-black">Current Password</label>
                <input type="password" name="oldPass" id="oldPass" class="form-control"  >
                <p class="alert-text"></p>
               
            </div>
            <div class="form-group mb-3">
                <label for="pass"class="text-black">New Password</label>
                <input type="password" name="pass" id="pass" class="form-control"  >
                <p class="alert-text"></p>
            </div>
            <div class="form-group mb-3">
                <label for="pass_con" class="text-black">Confirm New Password</label>
                <input type="password" name="pass_con" id="pass_con" class="form-control"  >
                <p class="alert-text"></p>
            </div>
            <div class="form-info" id="form-info">

            </div>
            <button type="submit" class="btn btn-primary  float-end">Change Password</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
<?php include 'inc/footer.php'?>