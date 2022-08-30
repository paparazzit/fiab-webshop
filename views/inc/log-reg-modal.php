<!-- Modal -->

<div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-wrapper">
        <form action="" class="form" id="login-form">
           
           <div class="form-group mb-3">
             <label for="login-email" class="text-black">Email</label>
             <input type="email" name ="email" id='login-email' class="form-control" >
             <p class="alert-text"></p>
           </div>
           
           
           <div class="form-group mb-3">
             <label for="login-pass" class="text-black">Password</label>
             <input type="password" name ="pass" id='login-pass' class="form-control" >
             <p class="alert-text"></p>
           </div>
           <div class="form-group  d-flex">
           <a class="reset_pass " href="#" class="disabled" data-bs-toggle="modal" data-bs-target="#resetPass">Forgot your Password</a>
           <label for="remember-me " class="ms-auto text-black">Remember me
           <input type="checkbox" name="remember" id="remember"/>
           </label>
           </div>
  
          <div class="form-info hide form-group">
            <p class="m-0 text-center ">SUCCESSSSS</p>
            
           </div>
  
           <button type="submit" class="btn btn-primary form-control mt-4">Login</button>
        </form>
        </div>
      </div>
    
    </div>
  </div>
</div>


<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Register User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-wrapper">
        <form action="" id="register-form" class="form">
		<div class="form-group mb-3">
		<label for="register-name" class="text-black">Name</label>
		<input type="text" name ="name" id='register-name' class="form-control" >
		<p class="alert-text"></p>
	  </div>
		<div class="form-group mb-3">
		  <label for="register-email" class="text-black">Email</label>
		  <input type="email" name ="email" id='register-email' class="form-control" >
		  <p class="alert-text"></p>
		</div>
		
		<div class="form-group mb-3">
		  <label for="register-pass" class="text-black">Password</label>
		  <input type="password" name ="pass" id='register-pass' class="form-control" >
		  <p class="alert-text"></p>
		</div>
		<div class="form-group mb-3">
		  <label for="pass-conn" class="text-black">Confirm password</label>
		  <input type="password" name ="pass_con" id='pass-con' class="form-control" >
		  <p class="alert-text"></p>
		</div>
		<div class="form-group mb-3">
		<label for="t-c" class="me-2"><a href="#">Terms & Conditions</a></label>
		<input type="checkbox" name="t_c" id="t_c"/>
		<p class="alert-text"></p>
		</div>
    <div class="form-info hide form-group">
            <p class="m-0 text-center ">SUCCESS</p>
            
           </div>
  
    <button  class="btn btn-primary form-control mt-4" type="submit">Register</button>
	
	  </form>
        </div>
      </div>
    
    </div>
  </div>
</div>




<div class="modal fade" id="resetPass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reset Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-wrapper">
        <form action="" id="resetPass-form" class="form">
		
		<div class="form-group mb-3">
		  <label for="reset-email" class="text-black">Email</label>
		  <input type="email" name ="email" id='reset-email' class="form-control" >
		  <p class="alert-text"></p>
		</div>
		
		
    <div class="form-info hide form-group">
            <p class="m-0 text-center ">SUCCESS</p>
            
           </div>
  
    <button  class="btn btn-primary form-control mt-4" type="submit">Send Request</button>
	
	  </form>
        </div>
      </div>
    
    </div>
  </div>
</div>