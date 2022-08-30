<?php include "inc/header.php"?>
<?php include 'inc/navbar.php'?>


<section class="allUsers">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <h2>All users</h2>
                <table class="table allUserTable">
                    <thead>
                       <tr>
                       <th>User</th>
                        <th>Email</th>
                        <th>Role</th>  
                       </tr>         
                    </thead>
                    <tbody>
                        <?php foreach($allUsers as $user):?>
                            <tr>
                            <td><?php echo $user->name?></td>
                            <td><?php echo $user->email?></td>
                            <td><?php echo $user->role?></td>
                            <td><a href="users/editUser.php?userId=<?php echo $user->id?>" data-id="<?php echo $user->id?>" class="btn btn-warning btn-sm">Detalis</a></td>
                            <td><a href="users/deleteUser.php?userId=<?php echo $user->id?>" data-id="<?php echo $user->id?>" class="btn btn-danger btn-sm deleteUser">Delete</a></td>
                        </tr>
                            
                            <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>



<?php include 'inc/footer.php'?>