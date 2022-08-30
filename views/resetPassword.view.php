<?php 
require 'inc/header.php';
require 'inc/navbar.php';
?>

<section class="container  bg-light form-container">
    <div class="row justify-content-center  h-100">
        <div class="col-md-8 p-5 d-flex align-items-center justify-content-center">
            <form  class="form  col-12" id="reset_user_form">
                <h2 class="text-center">Change Your password</h2>
                <div class="form-group">
                <input type="hidden" value="<?php echo $reset_email?>" id='reset-email' name="reset_email">
                <p class="alert-text"></p>
                </div>
                <div class="form-group">
                    <input type="password" name="password" id="reset_user_pass" placeholder="New password" require class="form-control">
                    <p class="alert-text"></p>
                </div>
                <div class="form-group mt-3">
                    <input type="password" name="pass-con" id="reset_user_pass_con" placeholder="confirm password" require class="form-control">
                    <p class="alert-text"></p>
                </div>
                <div class="form-info hide form-group">
            <p class="m-0 text-center ">SUCCESS</p>
            
           </div>
                <button class="btn btn-primary  mt-3" id="reset_pass_btn">Change Password</button>
            </form>

        </div>
    </div>

</section>


<?php 

require 'inc/footer.php';?>